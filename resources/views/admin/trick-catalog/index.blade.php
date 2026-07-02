@vite('resources/js/admin/trick-catalog/index.js')

@extends('layouts.portal')

@section('title', 'Trick Catalog')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="font-heading text-4xl pb-2">Trick Catalog</h1>

    <a href="{{ route('admin.trick-catalog.create') }}"
        class="inline-flex items-center px-4 py-2 text-xs uppercase bg-club text-white">
        + New Trick
    </a>
</div>

<div class="overflow-hidden">

    <table class="w-full text-black border border-black mb-6">

        <thead>
            <tr class="bg-black border-b border-black">
                <th class="p-3 text-left text-white text-xs uppercase">Name</th>
                <th class="p-3 text-left text-white text-xs uppercase">Level</th>
                <th class="p-3 text-left text-white text-xs uppercase">Videos</th>
                <th class="p-3 text-left text-white text-xs uppercase">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tricks as $trick)
            <tr class="border-b border-black hover:bg-gray-50">
                <td class="p-3 font-semibold text-sm">
                    {{ $trick->name }}
                </td>

                <td class="p-3 text-sm">
                    {{ $trick->levels->pluck('name')->map(fn($l) => ucfirst($l))->join(', ') }}
                </td>

                <td class="p-3 text-sm">
                    {{ $trick->videos->count() }}
                </td>

                <td class="p-3 flex gap-2">
                    <a href="{{ route('admin.trick-catalog.edit', $trick) }}"
                        class="inline-flex items-center px-3 py-1 text-xs bg-training text-white">
                        Edit
                    </a>

                    <button type="button"
                        class="js-open-trick-modal inline-flex items-center px-3 py-1 text-xs bg-club text-white"
                        data-id="{{ $trick->id }}">
                        View
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

<div class="mt-4">
    {{ $tricks->links() }}
</div>

{{-- MODAL --}}
<div id="trickModal"
    class="hidden fixed inset-0 z-[9999] bg-black/60">

    <div class="flex items-center justify-center w-full h-full p-4">

        <div class="w-full max-w-2xl bg-white shadow">

            <div class="flex justify-between items-start p-4 border-b gap-4">

                <h3 id="modalTitle" class="text-2xl font-heading"></h3>

                <div class="flex gap-2">
                    <button
                        type="button"
                        class="js-copy-email inline-flex items-center px-3 py-1 text-xs bg-gray-200"
                        data-type="simple">
                        <span class="copy-label">Copy Simple</span>
                    </button>

                    <button
                        type="button"
                        class="js-copy-email inline-flex items-center px-3 py-1 text-xs bg-blue-600 text-white"
                        data-type="grouped">
                        <span class="copy-label">Copy Grouped</span>
                    </button>

                    <button
                        type="button"
                        class="js-copy-email-preferred inline-flex items-center px-3 py-1 text-xs bg-black text-white hidden">
                        <span class="copy-label">Copy Preferred</span>
                    </button>


                    <!-- CLOSE -->
                    <button type="button" data-close-modal class="px-2 text-black hover:opacity-70">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>
            </div>

            <div class="p-4">
                <div id="modalBody">Loading...</div>
            </div>

        </div>

    </div>
</div>

@endsection