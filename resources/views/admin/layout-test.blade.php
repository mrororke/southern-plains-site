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
            {{ $item['action'] }} — {{ $item['model'] }} #{{ $item['model_id'] }}
        </h4>

        <p class="text-xs text-gray-500 mb-3">
            {{ $item['created_at'] }}
        </p>

        @if(!empty($item['diff']))
            <div class="space-y-2 text-sm">

                @foreach($item['diff'] as $change)
                    <div class="bg-gray-50 p-2 rounded">

                        <span class="font-semibold">
                            {{ $change['field'] }}
                        </span>

                        <div class="text-xs mt-1">
                            <span class="text-red-600">
                                {{ is_null($change['old']) ? 'null' : json_encode($change['old']) }}
                            </span>

                            <span class="mx-2">→</span>

                            <span class="text-green-600">
                                {{ is_null($change['new']) ? 'null' : json_encode($change['new']) }}
                            </span>
                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <p class="text-xs text-gray-400">No field changes detected</p>
        @endif

    </div>
@endforeach
       

         
    </div>
    

</div>



@endsection