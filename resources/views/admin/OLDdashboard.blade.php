@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('page_title', 'Admin Dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-2xl font-bold mb-4">Overview</h3>
    <p class="text-gray-700">
        Welcome to your administrative control panel. Use the sidebar to manage posts and other site content.
    </p>
    
    {{-- You can add summary cards here later (e.g., Total Posts, Drafts, etc.) --}}
</div>
@endsection