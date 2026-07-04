<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Trick Catalog - Print</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            color: #000;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .trick {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .trick h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .levels span {
            display: inline-block;
            padding: 2px 6px;
            border: 1px solid #000;
            font-size: 11px;
            margin-right: 4px;
        }

        .section {
            margin-top: 8px;
        }

        .video {
            font-size: 12px;
            margin-left: 10px;
        }

        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <button onclick="window.print()">Print All Tricks</button>
    </div>

    <h1>Trick Catalog</h1>

    @foreach($tricks as $trick)
        <div class="trick">

            <h2>{{ $trick->name }}</h2>

            {{-- LEVELS --}}
            <div class="section levels">
                @foreach($trick->levels as $level)
                    <span>
                        {{ ucwords(str_replace('_', ' ', $level->name)) }}
                    </span>
                @endforeach
            </div>

            {{-- NOTES --}}
            <div class="section">
                <strong>Notes:</strong>
                <div>{{ $trick->notes ?? 'No notes' }}</div>
            </div>

            {{-- VIDEOS --}}
            <div class="section">
                <strong>Videos:</strong>

                @foreach($trick->videos as $video)
                    <div class="video">
                        • {{ $video->platform ?? 'unknown' }}
                        — {{ $video->creator ?? 'Unknown' }}
                        — {{ $video->url }}
                        @if($video->is_preferred)
                            (Preferred)
                        @endif
                    </div>
                @endforeach

            </div>

        </div>
    @endforeach

</body>
</html>