@extends('layouts.portal')

@section('title', 'Layout Test')

@section('content')
<div class="grid grid-cols-5 gap-4">
    <div class="bg-club p-4 text-center text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Clients</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-training p-4 text-center  text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Total Dogs</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-league p-4 text-center  text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Programs</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-brand-gray p-4 text-center  text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Published Posts</h4>
            <p>+5 this month</p>
        </div>
    <div class="col-start-5">
        Calnedar here
    </div>

</div>

<div class="grid grid-cols-5 gap-4">
    <div class="col-span-4">
       <h1 class="font-heading text-7xl text-brand-gray">Recent Updates</h1>
    </div>
    <div class="col-start-5">
        Calnedar here
    </div>
</div>

<h1>Portal Layout Test</h1>
<p>This content should appear inside the portal layout.</p>
@endsection