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

        @if ($rats->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
            <p>No rats have been added yet. Click “New Rat” to add your first record.</p>
        </div>
        @else

        <div class="shadow overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Sex
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DOB
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Variety
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Color
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Breeder
                        </th>

                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($rats as $rat)
                    <tr>

                        {{-- Name --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href="{{ route('admin.rats.show', $rat) }}"
                                class="text-blue-600 hover:underline">
                                {{ $rat->name }}
                            </a>
                        </td>

                        {{-- Sex --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rat->sex }}
                        </td>

                        {{-- DOB --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rat->dob ?? '—' }}
                        </td>

                        {{-- Variety --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rat->variety }}
                        </td>

                        {{-- Color --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rat->colors->isNotEmpty()
    ? $rat->colors->pluck('name')->join(', ')
    : 'Unknown'
}}
                        </td>

                        {{-- Breeder --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rat->breeder?->rattery ?? '—' }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                            <a href="{{ route('admin.rats.edit', $rat) }}"
                                class="bg-emerald-500 hover:bg-emerald-800 text-white font-bold py-2 px-4 transition duration-150">
                                Edit
                            </a>

                            <form action="{{ route('admin.rats.destroy', $rat) }}"
                                method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this rat?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="text-red-500 hover:text-red-950 ml-2">
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