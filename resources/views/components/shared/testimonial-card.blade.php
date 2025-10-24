@props(['quote', 'attribution', 'active' => false])

@php
// Conditionally set the data-carousel-item attribute based on 'active' prop
$activeAttribute = $active ? 'active' : null;
@endphp

<div class="hidden duration-700 ease-in-out bg-gray-100 lg:px-[100px] lg:p-6" data-carousel-item="{{ $activeAttribute }}">
    <div class="grid lg:grid-cols-4">
        <div class="hidden lg:block lg:p-8 ">
            <img src="{{ asset('images/quote.png') }}" class="mx-auto pt-2" alt="Green opening quotation mark">
        </div>
        <div class="p-8 col-span-3">
            <p class="text-lg">
                "{!! $quote !!}"
            </p>
            <p class="italic text-right pt-4">— {{ $attribution }}</p>
        </div>
    </div>
</div>