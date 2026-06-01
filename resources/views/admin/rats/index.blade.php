@extends('layouts.admin')

@section('title', 'Rat Management')
@section('page_title', 'Rat Management Dashboard')

@section('content')
<div class="bg-white p-6 shadow-md">

    <div class="container mx-auto p-4">

        {{-- Success Message --}}
        @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <div class="flex justify-between items-center mb-6">

            <a href="{{ route('admin.rats.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 transition duration-150">
                + New Rat
            </a>

        </div>

        <form method="GET" class="mb-6 flex flex-wrap gap-3 items-center">

    {{-- Search --}}
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search name or registered name..."
        class="border p-2 rounded"
    >

    {{-- Type --}}
    <select name="type" class="border p-2 rounded">
        <option value="">All Types</option>
        <option value="full" @selected(request('type') === 'full')>
            Full
        </option>
        <option value="pedigree" @selected(request('type') === 'pedigree')>
            Pedigree
        </option>
    </select>

    {{-- Sex --}}
    <select name="sex" class="border p-2 rounded">
        <option value="">All Sexes</option>
        <option value="Male" @selected(request('sex') === 'Male')>
            Male
        </option>
        <option value="Female" @selected(request('sex') === 'Female')>
            Female
        </option>
    </select>

    {{-- Status --}}
    <select name="status" class="border p-2 rounded">
        <option value="">All Statuses</option>
        <option value="living" @selected(request('status') === 'living')>
            Living
        </option>
        <option value="deceased" @selected(request('status') === 'deceased')>
            Deceased
        </option>
    </select>

    {{-- Breeder --}}
    <select name="breeder_id" class="border p-2 rounded">
        <option value="">All Breeders</option>

        @foreach($breeders as $breeder)
            <option
                value="{{ $breeder->id }}"
                @selected(request('breeder_id') == $breeder->id)
            >
                {{ $breeder->rattery }}
            </option>
        @endforeach
    </select>

    <button
        type="submit"
        class="bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 rounded">
        Filter
    </button>

    <a
        href="{{ route('admin.rats.index') }}"
        class="border px-4 py-2 rounded hover:bg-gray-50">
        Clear
    </a>

</form>

        @if ($rats->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
            <p>No rats have been added yet. Click “New Rat” to add your first record.</p>
        </div>
        @else

        

        <div class="shadow overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
<tr>
    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
        Name
    </th>

    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
        Sex
    </th>

    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
        Age
    </th>

    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
        Type
    </th>

    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
        Breeder
    </th>

    <th class="px-6 py-3"></th>
</tr>
</thead>

                <tbody class="bg-white divide-y divide-gray-200">

@foreach ($rats as $rat)

@php
    $age = $rat->dob
        ? \Carbon\Carbon::parse($rat->dob)->diff(now())
        : null;

    $ageText = $age
        ? ($age->y ? $age->y.'y ' : '').($age->m ? $age->m.'m' : '')
        : '—';
@endphp

<tr>

    {{-- Name --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        <a href="{{ route('admin.rats.show', $rat) }}"
       class="text-blue-600 hover:underline">
        {{ $rat->name }}
    </a>

    @if($rat->registered_name)
        <div class="text-xs text-gray-500">
            {{ $rat->registered_name }}
        </div>
    @endif
    </td>

    {{-- Sex --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $rat->sex }}
    </td>

    {{-- Age --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $ageText }}
    </td>

    {{-- Type --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        @if($rat->is_pedigree_only)
        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded">
            Pedigree
        </span>
    @else
        <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
            Full
        </span>
    @endif
    </td>

    {{-- Breeder --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $rat->breeder?->rattery ?? '—' }}
    </td>

    {{-- Actions --}}
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

        <a href="{{ route('admin.rats.edit', $rat) }}"
           class="bg-emerald-500 hover:bg-emerald-800 text-white font-bold py-2 px-4">
            Edit
        </a>

        <form action="{{ route('admin.rats.destroy', $rat) }}"
              method="POST"
              class="inline-block ml-2"
              onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="text-red-500 hover:text-red-700">
                Delete
            </button>
        </form>

    </td>

</tr>

@endforeach

</tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $rats->links() }}
        </div>

        @endif
    </div>
</div>
@endsection