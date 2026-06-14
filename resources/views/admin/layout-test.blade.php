@extends('layouts.portal')

@section('title', 'Layout Test')

@section('content')
<div class="grid grid-cols-5 gap-4">
    <div class="bg-club p-4 text-center">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Clients</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-training p-4 text-center">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Clients</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-league p-4 text-center">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Clients</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-brand-gray p-4 text-center">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Clients</h4>
            <p>+5 this month</p>
        </div>
    <div class="col-start-5">
        Calnedar here
    </div>

</div>

<h1>Portal Layout Test</h1>
<p>This content should appear inside the portal layout.</p>
@endsection