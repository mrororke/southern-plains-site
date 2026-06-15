@extends('layouts.portal')

@section('title', 'Layout Test')

@section('content')
<div class="grid grid-cols-5 gap-4 pb-4">
    <div class="bg-club p-4 text-center text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Clients</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-training p-4 text-center  text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Total Dogs</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-league p-4 text-center  text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Active Programs</h4>
            <p>+5 this month</p>
        </div>
        <div class="bg-brand-gray p-4 text-center  text-white">
            <h1 class="font-heading text-7xl">42</h1>
            <h4 class="uppercase text-xs font-bold">Published Posts</h4>
            <p>+5 this month</p>
        </div>
    <div class="col-start-5">
        Calnedar here
    </div>

</div>

<div class="grid grid-cols-5 gap-4 pt-4">
  <div class="col-span-4 col-start-1">
    <h2 class="font-heading text-4xl">Recent Updates</h2>
    <h4 class="text-bold">Updated Rat: Rat Name</h4>
    <p class="text-base">"name": "Test Rat", "registered_name": null, "breeder_reference": null, "sex": "Male", "dob": null, "dod": null, "variety": "Standard", "silvered": null, "eye_color": "Black", "ear_set": "Dumbo", "breeder_id": null, "sire_id": null, "dam_id": null, "temperament": null, "deformities": null, "abnormalities": null, "is_owned": 1, "is_pedigree_only": 0<br/> <span class="text-xs">Updated at</span></p>
    <hr/>
  </div>
  <div class="col-start-5">
    calendar
  </div>
</div>

@endsection