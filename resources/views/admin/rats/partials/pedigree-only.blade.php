@php
$breeder = $rat->breeder;
$primaryImage = $rat->attachments
->sortByDesc('created_at')
->first();
@endphp



<div class="bg-white shadow border p-6">

    {{-- ===================== --}}
    {{-- HEADER --}}
    {{-- ===================== --}}
    <div class="bg-white shadow p-6 mb-6">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            {{-- INFO --}}
            <div class="col-span-3">

                <h1 class="text-2xl font-bold">
                    {{ $rat->registered_name ?? $rat->name }}
                </h1>

                @if($rat->registered_name)
                <div class="text-gray-600 mt-1">
                    {{ $rat->name }}
                </div>
                @endif

                <div class="mt-4 text-sm text-gray-700 space-y-1">

                    <div>
                        <strong>Sex:</strong> {{ $rat->sex }}
                    </div>

                    <div>
                        <strong>Variety:</strong> {{ $rat->variety }}
                    </div>

                    @if($rat->colors->isNotEmpty())
                    <div>
                        <strong>Color:</strong>
                        {{ $rat->colors->pluck('name')->join(', ') }}
                    </div>
                    @endif

                    @if($rat->markings->isNotEmpty())
                    <div>
                        <strong>Markings:</strong>
                        {{ $rat->markings->pluck('name')->join(', ') }}
                    </div>
                    @endif

                    @if($breeder)
                    <div>
                        <strong>Breeder:</strong>
                        {{ $breeder->rattery }}
                    </div>
                    @endif

                </div>

            </div>

            {{-- PHOTO --}}
            <div>

                @if($primaryImage)

                <img
                    src="{{ asset($primaryImage->file_path) }}"
                    alt="{{ $primaryImage->caption ?? $rat->name }}"
                    class="w-full h-64 object-cover border shadow-sm">
                @if($primaryImage->caption)
                <div class="mt-2 text-sm text-gray-600">
                    {{ $primaryImage->caption }}
                </div>
                @endif

                @else

                <div class="w-full h-64 bg-gray-100 border flex items-center justify-center text-gray-400 text-sm">
                    No Photo Available
                </div>

                @endif

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

        <table class="w-full text-sm">
            <tbody>

                {{-- PARENTS --}}
                <tr>
                    <td rowspan="4" class=" p-4 bg-blue-50">
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

                    <td rowspan="2" class=" p-4 bg-blue-50">
                        @php
                        $ancestor = $rat->ancestor('sire.sire');
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

                    <td class=" p-4 bg-blue-50">

                        @php
                        $ancestor = $rat->ancestor('sire.sire.sire');
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
                </tr>

                <tr>
                    <td class=" p-4 bg-pink-50">
                        @php
                        $ancestor = $rat->ancestor('sire.sire.dam');
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
                </tr>

                <tr>
                    <td rowspan="2" class="bg-pink-50 p-4">
                        @php
                        $ancestor = $rat->ancestor('sire.dam');
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

                    <td class=" p-4 bg-blue-50">
                        @php
                        $ancestor = $rat->ancestor('sire.dam.sire');
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
                </tr>

                <tr>
                    <td class="bg-pink-50 p-4">
                        @php
                        $ancestor = $rat->ancestor('sire.dam.dam');
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
                </tr>

                {{-- MOTHER --}}
                <tr>
                    <td rowspan="4" class="bg-pink-50 p-4">
                        @php
                        $ancestor = $rat->ancestor('dam');
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

                    <td rowspan="2" class=" p-4 bg-blue-50">
                        @php
                        $ancestor = $rat->ancestor('dam.sire');
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

                    <td class=" p-4 bg-blue-50">
                        @php
                        $ancestor = $rat->ancestor('dam.sire.sire');
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
                </tr>

                <tr>
                    <td class="bg-pink-50 p-4">
                        @php
                        $ancestor = $rat->ancestor('dam.sire.dam');
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
                </tr>

                <tr>
                    <td rowspan="2" class="bg-pink-50 p-4">
                        @php
                        $ancestor = $rat->ancestor('dam.dam');
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

                    <td class=" p-4 bg-blue-50">
                        @php
                        $ancestor = $rat->ancestor('dam.dam.sire');
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
                </tr>

                <tr>
                    <td class="bg-pink-50 p-4">
                        @php
                        $ancestor = $rat->ancestor('dam.dam.dam');
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
                </tr>

            </tbody>
        </table>

    </div>

</div>