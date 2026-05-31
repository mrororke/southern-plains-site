@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

@if(($mode ?? 'full') === 'pedigree')

    @include('admin.rats.partials.pedigree-only', ['rat' => $rat])

@else

    @include('admin.rats.partials.hero', ['rat' => $rat])

    @include('admin.rats.partials.pedigree', ['rat' => $rat])

    @include('admin.rats.partials.timeline', ['rat' => $rat])

@endif

@endsection