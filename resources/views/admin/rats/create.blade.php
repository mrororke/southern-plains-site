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
                    <select name="colors[]" multiple class="w-full border p-2">
                        @foreach($colors as $color)
                        <option value="{{ $color->id }}">
                            {{ $color->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Silvered --}}
                <div>
                    <label class="block text-sm font-medium">Silvered</label>
                    <select name="silvered" class="w-full border p-2">
                        <option value="">None</option>
                        @foreach($silvered as $silver)
                        <option value="{{ $silver }}" @selected(old('silvered')==$silver)>
                            {{ $silver }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Markings --}}
                <div>
                    <label class="block text-sm font-medium">Markings *</label>
                    <select name="markings[]" multiple class="w-full border p-2">
                        @foreach($markings as $marking)
                        <option value="{{ $marking->id }}">
                            {{ $marking->name }}
                        </option>
                        @endforeach
                    </select>

                </div>

                {{-- Eye Color --}}
                <div>
                    <label class="block text-sm font-medium">Eye Color *</label>
                    <select name="eye_color" class="w-full border p-2">
                        @foreach($eyeColors as $eye_color)
                        <option value="{{ $eye_color }}" @selected(old('eye_color', $rat->eye_color ?? '') == $eye_color)>
                            {{ $eye_color }}
                        </option>
                        @endforeach
                    </select>

                </div>

                {{-- Ear Set --}}
                <div>
                    <label class="block text-sm font-medium">Ear Set *</label>
                    <select name="ear_set" class="w-full border p-2">
                        @foreach($earSets as $ear_set)
                        <option value="{{ $ear_set }}" @selected(old('ear_set', $rat->ear_set ?? '') == $ear_set)>
                            {{ $ear_set }}
                        </option>
                        @endforeach
                    </select>
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
                {{-- Sire --}}
                <label class="block text-sm font-medium">Sire</label>
                <select name="sire_id" class="w-full border p-2">
    <option value="" disabled>Please Select</option>

    @foreach($sires as $sire)
        <option value="{{ $sire->id }}"
            @selected(old('sire_id', $rat->sire_id ?? '') == $sire->id)
        >
            {{ $sire->name }}
        </option>
    @endforeach
</select>

                {{-- Dam --}}
                <label class="block text-sm font-medium">Dam</label>
                <select name="dam_id" class="w-full border p-2">
    <option value="" disabled>Please Select</option>

    @foreach($dams as $dam)
        <option value="{{ $dam->id }}"
            @selected(old('dam_id', $rat->dam_id ?? '') == $dam->id)
        >
            {{ $dam->name }}
        </option>
    @endforeach
</select>

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