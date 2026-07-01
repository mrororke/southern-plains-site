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



@endsection

<script>

function openTrickModal(id)
{
    const modal = document.getElementById('trickModal');
    const body = document.getElementById('modalBody');

    modal.classList.remove('hidden');

    // force reflow so transition triggers
    requestAnimationFrame(() => {<div id="trickModal"
     class="hidden fixed inset-0 z-[9999] bg-black/60">

    <div class="flex items-center justify-center w-full h-full p-4">

        <div class="w-full max-w-2xl bg-white shadow-lg">

            <div class="flex items-center justify-between p-4 border-b">
                <h3 id="modalTitle" class="text-lg font-semibold"></h3>

                <button onclick="closeTrickModal()">✕</button>
            </div>

            <div class="p-4">
                <div id="modalBody">Loading...</div>
            </div>

        </div>

    </div>
</div>
        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');
    });

    body.innerHTML = 'Loading...';

    fetch(`/admin/trick-catalog/${id}/show-data`)
        .then(res => res.json())
        .then(data => {

            document.getElementById('modalTitle').innerText = data.name;

            let videoList = `
                <div class="space-y-3">

                    <div class="flex justify-end mb-3">
                        <button
                            type="button"
                            onclick="copyToClipboard('${window.location.origin}/admin/trick-catalog/${id}')"
                            class="bg-black text-white px-3 py-1 text-sm">

                            Copy Admin Link

                        </button>
                    </div>

                    <div class="mb-3">
                        <div class="text-sm font-semibold">Level</div>
                        <div class="text-sm text-gray-700">
                            ${data.level ? data.level.replaceAll('_', ' ') : 'unknown'}
                        </div>

                        <div class="mt-2 text-sm font-semibold">Notes</div>
                        <div class="text-sm text-gray-700 whitespace-pre-line">
                            ${data.notes ?? 'No notes added.'}
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

            videoList += `</ul></div>`;

            body.innerHTML = videoList;
        });
}

function closeTrickModal()
{
    const modal = document.getElementById('trickModal');

    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeTrickModal();
    }
});

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