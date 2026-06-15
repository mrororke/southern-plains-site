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
    <div class="col-start-5 row-span-2 bg-[#03CCFF]/25 p-4">
       <h2 class="font-heading text-2xl pb-2">At a Glance</h2>
    </div>

    <div class="col-span-4 pt-4">
        <h2 class="font-heading text-4xl pb-2">Recent Updates</h2>
       @foreach($recentActivity as $item)
    <div class="py-4 border-b">

        <h4 class="font-bold">
            {{ $item['label'] }}
        </h4>

        <p class="text-xs text-gray-500 mb-2">
            {{ $item['created_at'] }}
        </p>

        <div class="text-sm space-y-2">

            {{-- NEW VALUES --}}
            <div>
                <span class="font-semibold text-green-600">New Values</span>
                <pre class="bg-green-50 p-2 text-xs overflow-x-auto rounded">
{{ json_encode($item['new'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}
                </pre>
            </div>

            {{-- OLD VALUES --}}
            @if(!empty($item['old']))
            <div>
                <span class="font-semibold text-red-600">Old Values</span>
                <pre class="bg-red-50 p-2 text-xs overflow-x-auto rounded">
{{ json_encode($item['old'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}
                </pre>
            </div>
            @endif

        </div>

    </div>
@endforeach
       

         
    </div>
    

</div>



@endsection