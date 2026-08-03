@extends('admin.dashboard-v2.mobile-shell')

@section('title', 'Dashboard')

@section('content')

    <p class="mb-4 text-center text-md text-sp-charcoal">
        Good morning, {{ Auth::user()->name }}!
    </p>

    <x-admin.mobile.page-header title="Dashboard" />

    <x-admin.global-search location="page" />

    <x-admin.behaviors.recent-list :behaviors="$recentBehaviors" />

@endsection