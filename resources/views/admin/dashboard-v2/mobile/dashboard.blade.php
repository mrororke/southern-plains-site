@extends('admin.dashboard-v2.mobile.shell')

@section('title', 'Dashboard')

@section('content')

    <x-admin.mobile.page-header title="Dashboard" />

    <input
        type="text"
        name="globalSearch"
        value=""
        placeholder="Search anything..."
        class="mt-1 mb-1 block w-full rounded-md border border-sp-charcoal
               bg-transparent placeholder:text-md placeholder:italic
               placeholder:text-sp-charcoal focus:border-sp-charcoal"
    >

    <x-admin.behaviors.recent-list
        :behaviors="$recentBehaviors"
    />

@endsection