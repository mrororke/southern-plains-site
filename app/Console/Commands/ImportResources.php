<?php

namespace App\Console\Commands;

use App\Models\ResourceLibrary\Resource;
use App\Models\ResourceLibrary\ResourceCategory;
use App\Models\ResourceLibrary\ResourceType;
use App\Models\User;
use App\Services\ResourceLibrary\ResourceService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use RuntimeException;
use Throwable;

class ImportResources extends Command
{
    protected $signature = 'resource-library:import
                            {file : Path to the CSV file}
                            {--user= : User ID to attribute imported Resources to}';

    protected $description =
        'Import Resource Library content from a CSV file';

    public function handle(
        ResourceService $resourceService
    ): int {
        $file = $this->argument('file');
        $userId = $this->option('user');

        /*
        |--------------------------------------------------------------------------
        | Validate File
        |--------------------------------------------------------------------------
        */

        if (! is_file($file)) {
            $this->error(
                "CSV file not found: {$file}"
            );

            return self::FAILURE;
        }

        if (! is_readable($file)) {
            $this->error(
                "CSV file is not readable: {$file}"
            );

            return self::FAILURE;
        }

        /*
        |--------------------------------------------------------------------------
        | Validate User
        |--------------------------------------------------------------------------
        */

        if (! $userId) {
            $this->error(
                'Please provide a user with --user=<id>.'
            );

            return self::FAILURE;
        }

        $user = User::find($userId);

        if (! $user) {
            $this->error(
                "User ID {$userId} does not exist."
            );

            return self::FAILURE;
        }

        /*
        |--------------------------------------------------------------------------
        | Open CSV
        |--------------------------------------------------------------------------
        */

        $handle = fopen($file, 'r');

        if ($handle === false) {
            $this->error(
                'Unable to open the CSV file.'
            );

            return self::FAILURE;
        }

        $headers = fgetcsv($handle);

        if ($headers === false) {
            fclose($handle);

            $this->error(
                'The CSV does not contain a header row.'
            );

            return self::FAILURE;
        }

        $headers = array_map(
            function ($header) {
                $header = preg_replace(
                    '/^\xEF\xBB\xBF/',
                    '',
                    (string) $header
                );

                return strtolower(
                    trim($header)
                );
            },
            $headers
        );

        $requiredHeaders = [
            'title',
            'category',
            'type',
            'series',
            'first_sent',
            'status',
            'body',
            'notes',
        ];

        $missingHeaders = array_diff(
            $requiredHeaders,
            $headers
        );

        if (! empty($missingHeaders)) {
            fclose($handle);

            $this->error(
                'Missing CSV columns: '
                . implode(', ', $missingHeaders)
            );

            return self::FAILURE;
        }

        /*
        |--------------------------------------------------------------------------
        | Import
        |--------------------------------------------------------------------------
        */

        $this->newLine();

        $this->info(
            "Importing Resources as {$user->email}"
        );

        $this->newLine();

        $rowNumber = 1;
        $imported = 0;
        $skipped = 0;
        $notes = 0;

        while (
            ($values = fgetcsv($handle)) !== false
        ) {
            $rowNumber++;

            if ($this->rowIsEmpty($values)) {
                continue;
            }

            if (count($values) !== count($headers)) {
                $skipped++;

                $this->error(
                    "Row {$rowNumber}: column count does not match the header."
                );

                continue;
            }

            $row = array_combine(
                $headers,
                $values
            );

            try {
                $data = $this->prepareRow(
                    $row,
                    $rowNumber
                );

                $validator = Validator::make(
                    $data,
                    [
                        'title' => [
                            'required',
                            'string',
                            'max:255',
                        ],

                        'body' => [
                            'required',
                            'string',
                        ],

                        'resource_category_id' => [
                            'required',
                            'integer',
                            'exists:resource_categories,id',
                        ],

                        'resource_type_id' => [
                            'required',
                            'integer',
                            'exists:resource_types,id',
                        ],

                        'new_series_name' => [
                            'nullable',
                            'string',
                            'max:255',
                        ],

                        'status' => [
                            'required',
                            'in:active,archived',
                        ],

                        'first_sent' => [
                            'nullable',
                            'date_format:Y-m-d',
                        ],
                    ]
                );

                if ($validator->fails()) {
                    throw new RuntimeException(
                        $validator
                            ->errors()
                            ->first()
                    );
                }

                $validated = $validator->validated();

                /*
                |--------------------------------------------------------------------------
                | Duplicate Protection
                |--------------------------------------------------------------------------
                |
                | A Resource is considered already imported when another Resource
                | has the same title and the same first_sent value.
                |
                | Resources without a first_sent date are compared using a NULL
                | first_sent value.
                |
                */

                if ($this->duplicateExists($validated)) {
                    $skipped++;

                    $this->warn(
                        "⚠ {$validated['title']} already exists. Skipping."
                    );

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Store Resource
                |--------------------------------------------------------------------------
                */

                $resourceService->store(
                    $validated,
                    (int) $userId
                );

                $imported++;

                $this->line(
                    "✔ {$validated['title']}"
                );

                /*
                |--------------------------------------------------------------------------
                | Import Notes
                |--------------------------------------------------------------------------
                */

                $note = trim(
                    (string) ($row['notes'] ?? '')
                );

                if ($note !== '') {
                    $notes++;

                    $this->warn(
                        "  Note: {$note}"
                    );
                }
            } catch (Throwable $exception) {
                $skipped++;

                $title = trim(
                    (string) ($row['title'] ?? '')
                );

                $title = $title !== ''
                    ? $title
                    : "Row {$rowNumber}";

                $this->error(
                    "✘ {$title}"
                );

                $this->line(
                    '  '
                    . $exception->getMessage()
                );
            }
        }

        fclose($handle);

        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        $this->newLine();

        $this->info('Import complete.');

        $this->table(
            [
                'Result',
                'Count',
            ],
            [
                [
                    'Imported',
                    $imported,
                ],
                [
                    'Skipped',
                    $skipped,
                ],
                [
                    'Notes',
                    $notes,
                ],
            ]
        );

        return self::SUCCESS;
    }

    /*
    |--------------------------------------------------------------------------
    | Prepare Row
    |--------------------------------------------------------------------------
    */

    protected function prepareRow(
        array $row,
        int $rowNumber
    ): array {
        $categoryName = trim(
            (string) $row['category']
        );

        $typeName = trim(
            (string) $row['type']
        );

        $category = ResourceCategory::query()
            ->whereRaw(
                'LOWER(name) = ?',
                [
                    strtolower($categoryName),
                ]
            )
            ->first();

        if (! $category) {
            throw new RuntimeException(
                "Row {$rowNumber}: unknown Category '{$categoryName}'."
            );
        }

        $type = ResourceType::query()
            ->whereRaw(
                'LOWER(name) = ?',
                [
                    strtolower($typeName),
                ]
            )
            ->first();

        if (! $type) {
            throw new RuntimeException(
                "Row {$rowNumber}: unknown Type '{$typeName}'."
            );
        }

        $status = strtolower(
            trim(
                (string) $row['status']
            )
        );

        $series = trim(
            (string) $row['series']
        );

        $firstSent = trim(
            (string) $row['first_sent']
        );

        return [
            'title' => trim(
                (string) $row['title']
            ),

            'body' => (string) $row['body'],

            'resource_category_id' =>
                $category->id,

            'resource_type_id' =>
                $type->id,

            'new_series_name' =>
                $series !== ''
                    ? $series
                    : null,

            'status' => $status,

            'first_sent' =>
                $firstSent !== ''
                    ? $firstSent
                    : null,

            'tricks' => [],

            'related_resources' => [],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Duplicate Protection
    |--------------------------------------------------------------------------
    */

    protected function duplicateExists(
        array $data
    ): bool {
        $query = Resource::query()
            ->where('title', $data['title']);

        if ($data['first_sent'] === null) {
            $query->whereNull('first_sent');
        } else {
            $query->whereDate(
                'first_sent',
                $data['first_sent']
            );
        }

        return $query->exists();
    }

    /*
    |--------------------------------------------------------------------------
    | Empty Row
    |--------------------------------------------------------------------------
    */

    protected function rowIsEmpty(
        array $values
    ): bool {
        foreach ($values as $value) {
            if (trim((string) $value) !== '') {
                return false;
            }
        }

        return true;
    }
}