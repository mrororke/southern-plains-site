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
    <div class="py-3 border-b">

        {{-- HEADER --}}
        <div class="flex justify-between items-start gap-4">

            <div>
                <h4 class="font-semibold text-sm">
                    {{ $item['action'] }} — {{ $item['model'] }} #{{ $item['model_id'] }}
                </h4>

                <p class="text-xs text-gray-500">
                    {{ $item['created_at'] }}
                </p>
            </div>

        </div>

        {{-- TLDR --}}
        <p class="text-sm mt-1 text-gray-700">
            {{ $item['summary'] }}
        </p>

        {{-- EXPANDABLE DETAILS --}}
        <details class="mt-2">
            <summary class="text-xs text-blue-600 cursor-pointer">
                View full changes
            </summary>

            <div class="mt-2 space-y-2">

                @foreach($item['diff'] as $change)
                    <div class="text-xs bg-gray-50 p-2 rounded">

                        <span class="font-semibold">
                            {{ $change['field'] }}
                        </span>

                        <div class="text-gray-600">
                            <span class="text-red-600">
                                {{ json_encode($change['old']) }}
                            </span>
                            →
                            <span class="text-green-600">
                                {{ json_encode($change['new']) }}
                            </span>
                        </div>

                    </div>
                @endforeach

            </div>
        </details>

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