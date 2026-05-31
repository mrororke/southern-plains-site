@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

@if($mode === 'pedigree')
    @include('admin.rats.partials.pedigree-only')
@else
    @include('admin.rats.partials.hero')
    @include('admin.rats.partials.pedigree')
    @include('admin.rats.partials.timeline')
@endif

@endsection