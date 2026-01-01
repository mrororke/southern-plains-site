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
                <li class="flex justify-between items-center pb-2 border-b last:border-b-0">
                    <a href="#membership">Membership, Participation, &amp; Fees</a>
                </li>
                <li class="flex justify-between items-center pb-2 border-b last:border-b-0">
                    <a href="#scoring">Scoring &amp; Year End Awards</a>
                </li>
                <li class="flex justify-between items-center pb-2 border-b last:border-b-0">
                    <a href="#rules">Rules of Conduct &amp; Equipment</a>
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

<table class="w-full text-black border border-black mb-6">
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
    <h2 id="membership" class="font-heading text-5xl mt-6 mb-2">
    Membership, Participation & Fees
</h2>

<h3 class="font-bold text-xl text-black mt-6 mb-2">
    Eligibility and Participation
</h3>
<ul class="list-disc list-inside text-base text-black ml-4 mb-4">
    <li>The league is open to all breeds, mixed breeds, and handlers of any skill level.</li>
    <li>Participants must adhere to all Southern Plains Sport Dog League rules and guidelines.</li>
    <li>To qualify for year-end awards, handlers and dogs must participate in at least 50% (3 of 6) of the season's Training Days.</li>
</ul>

<h3 class="font-bold text-xl text-black mt-6 mb-2">
    Fees and Entry
</h3>
<ul class="list-disc list-inside text-base text-black ml-4 mb-6">
    <li><strong>Membership Fee:</strong> There are no annual membership fees at this time.</li>
    <li><strong>Entry Fees:</strong> A flat-rate entry fee of <strong>$50</strong> will be charged for each Training Day, per dog participating. Fee details will be provided on the event registration page.</li>
</ul>
</div>

<div>
    <h2 id="scoring" class="font-heading text-5xl mt-6 mb-2">
    Scoring &amp; Year-End Awards
</h2>
<p class="text-base text-black mb-6">
    League points are awarded only to the participating dog(s) and accumulate across the Spring and Fall seasons. The Top Dog Award is based on consistent performance throughout the year.
</p>

<h3 class="font-bold text-xl text-black mt-6 mb-2">
    Standardized Point Allocation
</h3>
<p class="text-base text-black mb-6">
    Points are awarded based on placement during Training Days, determined by the fastest Qualifying Run (QR) time.
</p>
<table class="w-full text-black border border-black mb-6">
    <thead>
        <tr class="bg-black border-b border-black">
            <th class="p-3 text-left uppercase text-sm font-bold text-white">Placement (Based on Fastest QR Time)</th>
            <th class="p-3 text-left uppercase text-sm font-bold text-white">Points Awarded to Dog</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-black">
            <td class="p-3 border-r border-black">1st Place</td>
            <td class="p-3">5 Points</td>
        </tr>
        <tr class="border-b border-black">
            <td class="p-3 border-r border-black">2nd Place</td>
            <td class="p-3">3 Points</td>
        </tr>
        <tr class="border-b border-black">
            <td class="p-3 border-r border-black">3rd Place</td>
            <td class="p-3">1 Point</td>
        </tr>
        <tr>
            <td class="p-3 border-r border-black">Any Other Qualifying Run (QR)</td>
            <td class="p-3">0.5 Point (Base Score)</td>
        </tr>
    </tbody>
</table>

<h3 class="font-bold text-xl text-black mt-6 mb-3">
    Brace Event Scoring Rule
</h3>
<p class="text-base text-black mb-6">
    The Brace Event is scored as a single team performance. When a Brace team achieves a QR and/or places, the full points are awarded to <strong>each of the two dogs</strong> who participated in that successful run.
</p>

<h3 class="font-bold text-xl text-black mt-6 mb-3">
    Top Dog Award and Jackpot Payout
</h3>
<p class="text-base text-black mb-6">
    The dogs with the highest cumulative points at the end of the year are recognized as high achievers and receive a share of the League's Jackpot Prize Money.
</p>

<table class="w-full text-black border border-black mb-6">
    <thead>
        <tr class="bg-black border-b border-black">
            <th class="p-3 text-left uppercase text-sm font-bold text-white">Final Placement</th>
            <th class="p-3 text-left uppercase text-sm font-bold text-white">Title</th>
            <th class="p-3 text-left uppercase text-sm font-bold text-white">Jackpot Prize Money</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-black">
            <td class="p-3 border-r border-black">1st Place</td>
            <td class="p-3 border-r border-black">Champion (Top Dog)</td>
            <td class="p-3">50%</td>
        </tr>
        <tr class="border-b border-black">
            <td class="p-3 border-r border-black">2nd Place</td>
            <td class="p-3 border-r border-black">Reserve Champion</td>
            <td class="p-3">35%</td>
        </tr>
        <tr>
            <td class="p-3 border-r border-black">3rd Place</td>
            <td class="p-3 border-r border-black">Third Place Prize</td>
            <td class="p-3">15%</td>
        </tr>
    </tbody>
</table>

<h4 class="font-bold text-lg text-black mt-6 mb-2">
    Tiebreaker Rules
</h4>
<p class="text-base text-black mb-6">
    In the event of a tie in cumulative points, the following rules apply:
</p>
<ul class="list-disc list-inside text-base text-black ml-4 mb-6">
    <li><strong>Tiebreaker 1:</strong> The dog with the most first-place finishes.</li>
    <li><strong>Tiebreaker 2:</strong> The dog with the most second-place finishes.</li>
    <li><strong>Tiebreaker 3:</strong> The dog with the fastest average time across all qualifying runs.</li>
</ul>

 <h2 id="rules" class="font-heading text-5xl mt-6 mb-2">
   Rules of Conduct &amp; Equipment
</h2>

<h3 class="font-bold text-xl text-black mt-6 mb-2">
    Sportsmanship
</h3>
<ul class="list-disc list-inside text-base text-black ml-4 mb-4">
    <li>Participants are expected to behave respectfully towards handlers, dogs, judges, and volunteers at all times.</li>
</ul>
<h3 class="font-bold text-xl text-black mt-6 mb-2">
    Dog Safety &amp; Welfare
</h3>
<ul class="list-disc list-inside text-base text-black ml-4 mb-4">
    <li>Dogs must be in good health and handled responsibly.</li>
    <li>Bitches in season (BIS) are allowed to train. They must wear appropriate pants and will run at the end of the rotation.</li>
</ul>

<h3 class="font-bold text-xl text-black mt-6 mb-2">
    Equipment
</h3>
<ul class="list-disc list-inside text-base text-black ml-4 mb-4">
    <li><strong>Allowed:</strong> Flat buckle or snap collars, fixed harnesses, and leashes long enough for the dog to work without interference. GPS/location collars are permitted.</li>
    <li><strong>Prohibited:</strong> Prong collars, shock collars, choke chains or other correctional equipment is not permitted.</li>
</ul>

</div>

</div>
@endsection