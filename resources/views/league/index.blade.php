@extends('layouts.base-league')

@section('page_content')
<div class="mx-auto pt-10 pb-10">
    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <h4 class="uppercase text-xs font-bold">The 2026 season</h4>
            <h1 class="font-heading text-7xl">Southern Plains League<br />Training Days.</h1>

            <p class="text-base mb-2">Welcome to the Southern Plains League! This structured six-event season is designed for fun, low-pressure skill-building, allowing teams to practice specialized scent work and retrieval events, including simulating historic urban hunting (Urban Locating), following trails for quarry (Trailing & Locating), and searching for deer antlers (Shed Hunting). All scores contribute to the annual Top Dog Award.</p>
        </div>
        <aside>
            <h4 class="uppercase text-small font-bold pb-4">League Navigation</h4>

            <ul class="space-y-4">
                <li class="flex justify-between items-center pb-2 border-b last:border-b-0">
                    <a href="#schedule">Schedule</a>
                </li>
                
            </ul>
        </aside>

    </div>

    <div> 
       <h2 id="schedule" class="font-heading text-5xl mt-6 mb-2">
    Season Schedule
</h2>
<p class="text-base text-black mb-6">
    The season is split into two sessions to accommodate climate concerns. Points from both sessions accumulate for the annual Top Dog Award.
</p>

<table class="w-full text-black border border-black">
    <thead>
        <tr class="bg-black border-b border-black">
            <th class="p-3 text-left uppercase text-sm font-bold text-white" colspan="2">
                Spring Season
            </th><th class="p-3 text-left uppercase text-sm font-bold text-white" colspan="2">
                Fall Season
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-black">
            <td class="p-3 font-semibold">April</td>
            <td class="p-3 text-sm border-r border-black"><span class="font-semibold">Field Events</span><br/><span class="text-xs">Trailing & Locating, Brace</td>
            <td class="p-3 font-semibold">August</td>
            <td class="p-3 text-sm"><span class="font-semibold">Urban Events</span><br/><span class="text-xs">Lost Item: Handler Odor</td>
        </tr>
        <tr class="border-b border-black">
            <td class="p-3 font-semibold">May</td>
            <td class="p-3 text-sm border-r border-black"><span class="font-semibold">Urban Events</span><br/><span class="text-xs">Urban Locating</td>
            <td class="p-3 font-semibold">September</td>
            <td class="p-3 text-sm"><span class="font-semibold">Field Events</span><br/><span class="text-xs">Trailing & Locating, Brace</td>
        </tr>
        <tr class="border-b border-black">
            <td class="p-3 font-semibold">June</td>
            <td class="p-3 text-sm border-r border-black"><span class="font-semibold">Shed</span></td>
            <td class="p-3 font-semibold">October</td>
            <td class="p-3 text-sm"><span class="font-semibold">Shed</span></td>
        </tr>
        
</tbody>
</table>
</div>

<div>
    Row
</div>

</div>
@endsection