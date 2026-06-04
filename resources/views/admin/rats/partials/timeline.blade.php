<div class="bg-white shadow border p-6">

    <h2 class="text-xl font-semibold mb-6">Timeline</h2>

    @if($rat->weights->count())
        <div class="mb-6">
            <h3 class="font-semibold mb-2">Weight History</h3>

            <ul class="space-y-1">
                @foreach($rat->weights->sortByDesc('recorded_at')->take(10) as $weight)
                    <li>{{ $weight->recorded_at }} — {{ $weight->weight }} g</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($rat->healthRecords->count())
        <div class="mb-6">
            <h3 class="font-semibold mb-2">Health Records</h3>

            <ul class="space-y-1">
                @foreach($rat->healthRecords->sortByDesc('onset_date')->take(10) as $record)
                    <li>{{ $record->onset_date }} — {{ $record->diagnosis }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($rat->temperamentAssessments->count())
        <div>
            <h3 class="font-semibold mb-2">Temperament Assessments</h3>

            <ul class="space-y-1">
                @foreach($rat->temperamentAssessments->sortByDesc('date')->take(10) as $assessment)
                    <li>{{ $assessment->date }} — Assessment Recorded</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>