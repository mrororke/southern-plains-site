<div class="bg-white shadow  p-6">

    <h2 class="text-lg font-semibold mb-4">Pedigree</h2>

    <table class="w-full text-sm">
        <tbody>

            {{-- PARENTS --}}
            <tr>
                <td rowspan="4" class="  bg-blue-50">
                    @php
                    $ancestor = $rat->ancestor('sire');
                    @endphp

                    @if($ancestor)
                    <a href="{{ route('admin.rats.show', $ancestor) }}"
                        class="hover:underline">
                        {{ $ancestor->name }}
                    </a>
                    
                    @else
                    <span class="text-red-400 italic">Missing</span>
                    @endif
                </td>

                <td rowspan="2" class=" ">
                    Paternal Grandfather<br>
                    {{ $rat->ancestor('sire.sire')?->name ?? 'Unknown' }}
                </td>

                <td class=" ">
                    Paternal Great Grandfather 1<br>
                    {{ $rat->ancestor('sire.sire.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class=" ">
                    Paternal Great Grandmother 1<br>
                    {{ $rat->ancestor('sire.sire.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td rowspan="2" class=" ">
                    Paternal Grandmother<br>
                    {{ $rat->ancestor('sire.dam')?->name ?? 'Unknown' }}
                </td>

                <td class=" ">
                    Paternal Great Grandfather 2<br>
                    {{ $rat->ancestor('sire.dam.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class=" ">
                    Paternal Great Grandmother 2<br>
                    {{ $rat->ancestor('sire.dam.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

            {{-- MOTHER --}}
            <tr>
                <td rowspan="4" class="  font-semibold bg-gray-50">
                    Mother<br>
                    {{ $rat->ancestor('dam')?->name ?? 'Unknown' }}
                </td>

                <td rowspan="2" class=" ">
                    Maternal Grandfather<br>
                    {{ $rat->ancestor('dam.sire')?->name ?? 'Unknown' }}
                </td>

                <td class=" ">
                    Maternal Great Grandfather 1<br>
                    {{ $rat->ancestor('dam.sire.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class=" ">
                    Maternal Great Grandmother 1<br>
                    {{ $rat->ancestor('dam.sire.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td rowspan="2" class=" ">
                    Maternal Grandmother<br>
                    {{ $rat->ancestor('dam.dam')?->name ?? 'Unknown' }}
                </td>

                <td class=" ">
                    Maternal Great Grandfather 2<br>
                    {{ $rat->ancestor('dam.dam.sire')?->name ?? 'Unknown' }}
                </td>
            </tr>

            <tr>
                <td class=" ">
                    Maternal Great Grandmother 2<br>
                    {{ $rat->ancestor('dam.dam.dam')?->name ?? 'Unknown' }}
                </td>
            </tr>

        </tbody>
    </table>

</div>