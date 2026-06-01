<div class="bg-white shadow  p-4">

    <h2 class="text-lg mb-4">Pedigree</h2>

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
                    $ancestor = $rat->ancestor('sire.dam.dire');
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