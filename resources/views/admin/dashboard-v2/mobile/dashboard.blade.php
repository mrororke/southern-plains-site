@extends('admin.dashboard-v2.mobile.shell')

@section('title', 'Dashboard')

@section('content')

    <x-admin.mobile.page-header title="Dashboard" />

    <x-admin.search.index />

    <x-admin.behaviors.recent-list
        :behaviors="$recentBehaviors"
    />

@endsection