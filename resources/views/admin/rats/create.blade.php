@extends('layouts.admin')

@section('title', 'Create Rat')
@section('page_title', 'Create New Rat')

@section('content')
<div class="bg-white p-6 shadow-md">

    <div class="container mx-auto p-4">

        {{-- Success Message --}}
        @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('admin.rats.index') }}"
               class="text-blue-600 hover:underline">
                ← Back to Rats
            </a>
        </div>

        <form method="POST" action="{{ route('admin.rats.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium">Name *</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full border p-2"
                           required>
                </div>

                {{-- Registered Name --}}
                <div>
                    <label class="block text-sm font-medium">Registered Name</label>
                    <input type="text"
                           name="registered_name"
                           value="{{ old('registered_name') }}"
                           class="w-full border p-2">
                </div>

                {{-- Breeder Reference --}}
                <div>
                    <label class="block text-sm font-medium">Breeder Reference</label>
                    <input type="text"
                           name="breeder_reference"
                           value="{{ old('breeder_reference') }}"
                           class="w-full border p-2">
                </div>

                {{-- Sex --}}
                <div>
                    <label class="block text-sm font-medium">Sex *</label>
                    <select name="sex" class="w-full border p-2">
    @foreach($sexes as $sex)
        <option value="{{ $sex }}" @selected(old('sex', $rat->sex ?? '') == $sex)>
            {{ $sex }}
        </option>
    @endforeach
</select>
                </div>

                {{-- DOB --}}
                <div>
                    <label class="block text-sm font-medium">DOB</label>
                    <input type="date"
                           name="dob"
                           value="{{ old('dob') }}"
                           class="w-full border p-2">
                </div>

                {{-- DOD --}}
                <div>
                    <label class="block text-sm font-medium">DOD</label>
                    <input type="date"
                           name="dod"
                           value="{{ old('dod') }}"
                           class="w-full border p-2">
                </div>

                {{-- Variety --}}
                <div>
                    <label class="block text-sm font-medium">Variety *</label>
                    <select name="variety" class="w-full border p-2">
    @foreach($varieties as $variety)
        <option value="{{ $variety }}" @selected(old('variety', $rat->variety ?? '') == $variety)>
            {{ $variety }}
        </option>
    @endforeach
</select>
                </div>

                {{-- Color --}}
                <div>
                    <label class="block text-sm font-medium">Color *</label>
                    <select name="color" class="w-full border p-2">
    @foreach($colors as $color)
        <option value="{{ $color }}" @selected(old('color', $rat->color ?? '') == $color)>
            {{ $color }}
        </option>
    @endforeach
</select>
                </div>

                {{-- Silvered --}}
                <div>
                    <label class="block text-sm font-medium">Silvered</label>
                    <select name="silvered" class="w-full border p-2">
    <option value="">None</option>
    @foreach($silveredOptions as $opt)
        <option value="{{ $opt }}" @selected(old('silvered', $rat->silvered ?? '') == $opt)>
            {{ $opt }}
        </option>
    @endforeach
</select>
                </div>

                {{-- Markings --}}
                <div>
                    <label class="block text-sm font-medium">Markings *</label>
                    <input type="text"
                           name="markings"
                           value="{{ old('markings', 'Black') }}"
                           class="w-full border p-2">
                   
                </div>

                {{-- Eye Color --}}
                <div>
                    <label class="block text-sm font-medium">Eye Color *</label>
                    
                    <input type="text"
                           name="eye_color"
                           value="{{ old('eye_color', 'Black') }}"
                           class="w-full border p-2">
                </div>

                {{-- Ear Set --}}
                <div>
                    <label class="block text-sm font-medium">Ear Set *</label>
                    <input type="text"
                           name="ear_set"
                           value="{{ old('ear_set', 'Dumbo') }}"
                           class="w-full border p-2">
                </div>

                {{-- Breeder --}}
                <div>
                    <label class="block text-sm font-medium">Breeder</label>
                    <select name="breeder_id" class="w-full border p-2">
                        <option value="">None</option>
                        @foreach($breeders as $breeder)
                            <option value="{{ $breeder->id }}">
                                {{ $breeder->rattery }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Flags --}}
                <div class="col-span-2 flex gap-6 mt-4">

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_owned" checked>
                        Owned
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_pedigree_only">
                        Pedigree Only
                    </label>

                </div>

            </div>

            <div class="mt-6">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4">
                    Create Rat
                </button>
            </div>

        </form>

    </div>
</div>
@endsection