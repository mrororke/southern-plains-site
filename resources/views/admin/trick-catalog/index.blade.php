@extends('layouts.portal')

@section('title', 'Trick Catalog')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Trick Catalog</h1>

    <a href="{{ route('admin.trick-catalog.create') }}"
        class="bg-black text-white px-4 py-2">
        + New Trick
    </a>
</div>

<div class="bg-white shadow overflow-hidden">

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
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4">

    <div class="relative w-full max-w-xl">

        <div class="relative bg-white shadow-lg">

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

            let videoList = `
                <div class="space-y-3">

                    <div class="flex mb-3">
                    <div class="mt-2 text-sm">
                <div class="font-semibold">Notes</div>

                <div class="text-gray-700 whitespace-pre-line">
                    ${data.notes ? data.notes : 'No notes added.'}
                </div>
            </div>
                        
                    </div>

                    <h4 class="font-semibold">Videos</h4>

                    <ul class="space-y-2">
            `;

            data.videos.forEach(v => {

                videoList += `
                    <li class="flex justify-between items-center text-sm border-b py-2">

                        <div class="min-w-0">
                            <div class="font-medium">
                                ${v.platform ?? 'unknown'}
                            </div>

                            <div class="text-xs text-gray-500 truncate">
                                ${v.creator ?? 'Unknown'}
                            </div>
                        </div>

                        <div class="flex gap-3 items-center">

                            <a href="${v.url}"
                               target="_blank"
                               class="text-blue-600 hover:underline text-xs">

                                Open

                            </a>

                            <button
                                type="button"
                                onclick="copyToClipboard('${v.url}')"
                                class="text-black underline text-xs">

                                Copy

                            </button>

                        </div>

                    </li>
                `;
            });

            videoList += `
                    </ul>
                </div>
            `;

            body.innerHTML = videoList;
        })
        .catch(err => {
            console.error(err);
            body.innerHTML = '<p class="text-red-600 text-sm">Failed to load trick data.</p>';
        });
}

function closeTrickModal()
{
    document.getElementById('trickModal')
        .classList.add('hidden');
}

function copyToClipboard(text)
{
    navigator.clipboard.writeText(text)
        .then(() => {
            alert('Copied to clipboard');
        })
        .catch(err => {
            console.error('Copy failed:', err);
        });
}

document.getElementById('trickModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeTrickModal();
    }
});

</script>