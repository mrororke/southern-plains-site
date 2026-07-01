@extends('layouts.portal')

@section('title', 'Trick Catalog')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Trick Catalog</h1>

    <a href="{{ route('admin.trick-catalog.create') }}"
       class="bg-black text-white px-4 py-2 rounded">
        + New Trick
    </a>
</div>

<div class="bg-white shadow rounded overflow-hidden">

    <table class="w-full text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-3">Name</th>
                <th class="p-3">Level</th>
                <th class="p-3">Videos</th>
                <th class="p-3">Preferred</th>
                <th class="p-3"></th>
            </tr>
        </thead>

        <tbody>
        @foreach($tricks as $trick)
            <tr class="border-t">
                <td class="p-3 font-medium">
                    {{ $trick->name }}
                </td>

                <td class="p-3">
                    {{ ucfirst(str_replace('_', ' ', $trick->level)) }}
                </td>

                <td class="p-3">
                    {{ $trick->videos->count() }}
                </td>

                <td class="p-3">
                    @if($trick->videos->where('is_preferred', true)->count())
                        <span class="text-green-600 font-bold">Yes</span>
                    @else
                        <span class="text-gray-400">No</span>
                    @endif
                </td>

                <td class="p-3 text-right">
                    <a href="{{ route('admin.trick-catalog.edit', $trick) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

<div class="mt-4">
    {{ $tricks->links() }}
</div>

@endsection