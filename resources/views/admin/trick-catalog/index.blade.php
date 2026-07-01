@extends('layouts.portal')

@section('title', 'Trick Catalog')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="font-heading text-4xl pb-2">Trick Catalog</h1>

    <a href="{{ route('admin.trick-catalog.create') }}"
       class="inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-transparent bg-club text-white hover:bg-club-hover ms-4">
        + New Trick
    </a>
</div>

<div class="bg-white shadow overflow-hidden">

    <table class="w-full text-black border border-black mb-6">
        <thead class="bg-gray-100 text-left">
            <tr class="bg-black border-b border-black">
                <th class="p-3 text-left uppercase text-sm font-bold text-white">Name</th>
                <th class="p-3 text-left uppercase text-sm font-bold text-white">Level</th>
                <th class="p-3 text-left uppercase text-sm font-bold text-white">Videos</th>
                <th class="p-3 text-left uppercase text-sm font-bold text-white">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tricks as $trick)
            <tr class="border-b border-black">
                <td class="p-3 font-semibold">
                    {{ $trick->name }}
                </td>

                <td class="p-3">
                    {{ ucfirst(str_replace('_', ' ', $trick->level)) }}
                </td>

                <td class="p-3">
                    {{ $trick->videos->count() }}
                </td>

                

                <td class="p-3 ">
                    <button type="button"
                            href=""
                            class="inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-transparent bg-training text-white hover:bg-training-hover ms-4">

                    </button>
                    <a href="{{ route('admin.trick-catalog.edit', $trick) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <button type="button"
                            onclick="openTrickModal({{ $trick->id }})"
                            class="inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-transparent bg-club text-white hover:bg-club-hover ms-4">
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

{{-- MODAL (IMPORTANT: OUTSIDE SCRIPT) --}}
<div id="trickModal"
     class="hidden fixed inset-0 z-[9999] bg-black/60">

    <div class="flex items-center justify-center w-full h-full p-4">

        <div class="w-full max-w-2xl bg-white shadow">

            <div class="flex items-center justify-between p-4 border-b">
                <h3 id="modalTitle" class="text-lg font-semibold"></h3>

                <button type="button"
                        onclick="closeTrickModal()">
                    ✕
                </button>
            </div>

            <div class="p-4">
                <div id="modalBody">Loading...</div>
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
                <div class="space-y-4">

                    <div>
                        <div class="text-sm font-semibold">Level</div>
                        <div class="text-sm">
                            ${data.level ? data.level.replaceAll('_', ' ') : 'unknown'}
                        </div>

                        <div class="mt-2 text-sm font-semibold">Notes</div>
                        <div class="text-sm whitespace-pre-line">
                            ${data.notes ?? 'No notes'}
                        </div>
                    </div>

                    

                    <h4 class="font-semibold">Videos</h4>

                    <ul class="space-y-2">
            `;

            data.videos.forEach(v => {

                html += `
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

                            <a href="${v.url}" target="_blank" class="text-blue-600 text-xs hover:underline">
                                Open
                            </a>

                            <button type="button"
                                    onclick="copyToClipboard('${v.url}')"
                                    class="text-xs underline">
                                Copy
                            </button>

                        </div>

                    </li>
                `;
            });

            html += `</ul></div>`;

            body.innerHTML = html;
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
        .then(() => alert('Copied'))
        .catch(console.error);
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeTrickModal();
    }
});

document.getElementById('trickModal')
    .addEventListener('click', function(e) {
        if (e.target === this) {
            closeTrickModal();
        }
    });

</script>