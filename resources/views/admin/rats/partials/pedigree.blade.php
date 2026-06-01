<div class="bg-white shadow border p-6">

    <h2 class="text-lg font-semibold mb-4">Pedigree</h2>

    <table class="w-full border border-gray-300 text-sm">
        <tbody>

            {{-- PARENTS --}}
            <tr>
                <td rowspan="4" class="border p-2 bg-blue-50">
                    @php
                    $ancestor = $rat->ancestor('sire');
                    @endphp

                    @if($ancestor)
                    <a href="{{ route('admin.rats.show', $ancestor) }}"
                        class="hover:underline">
                        {{ $ancestor->name }}
                    </a>
                    <span class="text-xs ml-1 px-2 py-0.5 rounded
    {{ $ancestor?->is_pedigree_only ? 'bg-gray-200 text-gray-600' : 'bg-green-100 text-green-700' }}">
                        {{ $ancestor?->is_pedigree_only ? 'Pedigree' : 'Owned' }}
                    </span>
                    @else
                    <span class="text-red-400 italic">Missing</span>
                    @endif
                </td>

                <td rowspan="2" class="border p-2">
                    Paternal Grandfather<br>
                    {{ $rat->ancestor('sire.sire')?->name ?? 'Unknown' }}
                </td>

                <td class="border p-2">
                    Paternal Great Grandfather 1<br>
                    {{ $rat->ancestor('sire.sire.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class="border p-2">
                    Paternal Great Grandmother 1<br>
                    {{ $rat->ancestor('sire.sire.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td rowspan="2" class="border p-2">
                    Paternal Grandmother<br>
                    {{ $rat->ancestor('sire.dam')?->name ?? 'Unknown' }}
                </td>

                <td class="border p-2">
                    Paternal Great Grandfather 2<br>
                    {{ $rat->ancestor('sire.dam.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class="border p-2">
                    Paternal Great Grandmother 2<br>
                    {{ $rat->ancestor('sire.dam.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

            {{-- MOTHER --}}
            <tr>
                <td rowspan="4" class="border p-2 font-semibold bg-gray-50">
                    Mother<br>
                    {{ $rat->ancestor('dam')?->name ?? 'Unknown' }}
                </td>

                <td rowspan="2" class="border p-2">
                    Maternal Grandfather<br>
                    {{ $rat->ancestor('dam.sire')?->name ?? 'Unknown' }}
                </td>

                <td class="border p-2">
                    Maternal Great Grandfather 1<br>
                    {{ $rat->ancestor('dam.sire.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class="border p-2">
                    Maternal Great Grandmother 1<br>
                    {{ $rat->ancestor('dam.sire.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td rowspan="2" class="border p-2">
                    Maternal Grandmother<br>
                    {{ $rat->ancestor('dam.dam')?->name ?? 'Unknown' }}
                </td>

                <td class="border p-2">
                    Maternal Great Grandfather 2<br>
                    {{ $rat->ancestor('dam.dam.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class="border p-2">
                    Maternal Great Grandmother 2<br>
                    {{ $rat->ancestor('dam.dam.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

        </tbody>
    </table>

</div>