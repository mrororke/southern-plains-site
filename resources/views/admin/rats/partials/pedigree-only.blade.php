@php
    $breeder = $rat->breeder;
@endphp

<div class="bg-white shadow border p-6">

    {{-- ===================== --}}
    {{-- HEADER --}}
    {{-- ===================== --}}
    <div class="mb-6">

        <h1 class="text-xl font-bold">
            {{ $rat->registered_name ?? $rat->name }}
        </h1>

        <div class="text-sm text-gray-600 mt-1">
            @if($rat->registered_name)
                <div>{{ $rat->name }}</div>
            @endif

            <div>
                {{ $rat->sex }} · {{ $rat->variety }} · {{ $breeder->rattery }}
            </div>
        </div>

    </div>

    

    {{-- ===================== --}}
    {{-- PEDIGREE TABLE --}}
    {{-- ===================== --}}
    <div>

        <h2 class="text-lg font-semibold mb-4">
            Pedigree
        </h2>

        <table class="w-full border border-gray-300 text-sm">
            <tbody>

                {{-- Reuse your existing pedigree table EXACTLY --}}
                {{-- No changes needed here yet --}}

                {{-- PARENTS --}}
                <tr>
                    <td rowspan="4" class="border p-2 font-semibold bg-gray-50">
                        Father<br>
                        {{ $rat->ancestor('sire')?->name ?? 'Unknown' }}
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

</div>