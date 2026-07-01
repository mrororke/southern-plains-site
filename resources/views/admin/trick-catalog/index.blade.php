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
                    <button
                        type="button"
                        onclick="openTrickModal({{ $trick->id }})"
                        class="text-training hover:underline text-sm">

                        View

                    </button>
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

<div id="trickModal"
     tabindex="-1"
     class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-modal h-full">

    <div class="relative w-full max-w-3xl mx-auto">

        <div class="relative bg-white rounded-lg shadow">

            <div class="flex items-center justify-between p-4 border-b">
                <h3 id="modalTitle" class="text-lg font-semibold">
                    Trick Details
                </h3>

                <button type="button"
                        class="text-gray-400 hover:text-black"
                        onclick="closeTrickModal()">
                    ✕
                </button>
            </div>

            <div class="p-4 space-y-4">

                <div id="modalBody">
                    Loading...
                </div>

            </div>

        </div>

    </div>
</div>

@endsection

<script>

function openTrickModal(id)
{
    const modal = document.getElementById('trickModal');
    const body = document.getElementById('modalBody');

    modal.classList.remove('hidden');
    body.innerHTML = 'Loading...';

    fetch(`/admin/trick-catalog/${id}/show-data`)
        .then(res => res.json())
        .then(data => {

            document.getElementById('modalTitle').innerText = data.name;

            let html = `
                <div class="space-y-2">
                    <p><strong>Level:</strong> ${data.level}</p>
                    <p><strong>Notes:</strong> ${data.notes ?? ''}</p>

                    <div class="mt-4">
                        <h4 class="font-semibold">Videos</h4>
                        <ul class="space-y-2">
            `;

            data.videos.forEach(v => {
                html += `
                    <li class="text-sm">
                        <a href="${v.url}" target="_blank" class="text-training hover:underline">
                            ${v.platform} - ${v.creator ?? 'Unknown'}
                        </a>
                    </li>
                `;
            });

            html += `
                        </ul>
                    </div>
                </div>
            `;

            body.innerHTML = html;
        });
}

function closeTrickModal()
{
    document.getElementById('trickModal')
        .classList.add('hidden');
}

</script>