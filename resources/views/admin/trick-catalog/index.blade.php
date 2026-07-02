@extends('layouts.portal')

@section('title', 'Trick Catalog')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="font-heading text-4xl pb-2">Trick Catalog</h1>

    <a href="{{ route('admin.trick-catalog.create') }}"
       class="inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest border-2 border-transparent bg-club text-white hover:bg-club-hover ms-4">

        + New Trick
    </a>
</div>

<div class="overflow-hidden">

    <table class="w-full text-black border border-black mb-6">

        <thead>
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
                <td class="p-3 font-semibold text-sm">{{ $trick->name }}</td>
                <td class="p-3 text-sm">
                    {{ ucfirst(str_replace('_', ' ', $trick->level)) }}
                </td>
                <td class="p-3 text-sm">{{ $trick->videos->count() }}</td>

                <td class="p-3">
                    <a href="{{ route('admin.trick-catalog.edit', $trick) }}"
                       class="inline-flex items-center px-4 py-2 text-xs uppercase bg-training text-white">

                        Edit
                    </a>

                    <button type="button"
                            onclick="openTrickModal({{ $trick->id }})"
                            class="inline-flex items-center px-4 py-2 text-xs uppercase bg-club text-white">

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

            <div class="flex items-center justify-between p-4 border-b">
                <h3 id="modalTitle" class="text-4xl font-heading pb-2"></h3>

                <button type="button" onclick="closeTrickModal()">
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

function renderLevelBadge(level)
{
    if (!level) level = 'unknown';

    const formatted = level
        .replaceAll('_', ' ')
        .replace(/\b\w/g, c => c.toUpperCase());

    const styles = {
        novice: 'bg-gray-500 text-white',
        intermediate: 'bg-blue-500 text-white',
        advanced: 'bg-purple-500 text-white',
        performer: 'bg-pink-500 text-white',
        performer_elite: 'bg-black text-white',
        unknown: 'bg-gray-300 text-black'
    };

    const colorClass = styles[level] ?? styles.unknown;

    return `
        <div>
            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold ${colorClass}">
                ${formatted}
            </span>
        </div>
    `;
}

function renderPlatformBadge(platform)
{
    const p = (platform || 'unknown').toLowerCase();

    const icons = {
        youtube: '▶️',
        tiktok: '🎵',
        instagram: '📸',
        facebook: '📘',
        unknown: '🔗'
    };

    const colors = {
        youtube: 'text-red-600',
        tiktok: 'text-black',
        instagram: 'text-pink-500',
        facebook: 'text-blue-600',
        unknown: 'text-gray-500'
    };

    return `
        <div class="text-lg ${colors[p] ?? colors.unknown}">
            ${icons[p] ?? icons.unknown}
        </div>
    `;
}

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

            // SORT ONCE (IMPORTANT)
            data.videos.sort((a, b) =>
                (b.is_preferred === true) - (a.is_preferred === true)
            );

            let html = `
                <div class="space-y-4">

                    <div class="flex justify-between items-start gap-4">

                        <div class="flex-1">
                            <div class="font-bold text-md mb-2">Notes</div>
                            <div class="text-base mb-6">
                                ${data.notes ?? 'No notes'}
                            </div>
                        </div>

                        ${renderLevelBadge(data.level)}

                    </div>

                    <h4 class="font-bold text-md mb-2">Videos</h4>

                    <ul class="space-y-2">
            `;

            data.videos.forEach(v => {

                html += `
                    <li class="flex items-center justify-between text-sm border-b py-2
                        ${v.is_preferred
                            ? 'bg-gray-100 border-l-4 border-l-black pl-2'
                            : ''}
                        hover:bg-gray-50 transition-colors">

                        <div class="w-1/5">
                            ${renderPlatformBadge(v.platform)}
                        </div>

                        <div class="w-2/5 truncate">
                            ${v.creator ?? 'Unknown creator'}
                        </div>

                        <div class="w-2/5 flex justify-end gap-2">

                            <a href="${v.url}"
                               target="_blank"
                               class="inline-flex items-center px-2 py-1 text-xs bg-black text-white">

                                ↗ Open

                            </a>

                            <button type="button"
                                    onclick="copyToClipboard('${v.url}')"
                                    class="inline-flex items-center px-2 py-1 text-xs bg-gray-200">

                                📋 Copy

                            </button>

                        </div>

                    </li>
                `;
            });

            html += `
                    </ul>
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