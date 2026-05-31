@extends('layouts.admin')

@section('title', $rat->name)
@section('page_title', 'Rat Profile: ' . $rat->name)

@section('content')

@include('admin.rats.partials.hero', ['rat' => $rat])

@include('admin.rats.partials.pedigree', ['rat' => $rat])

@include('admin.rats.partials.timeline', ['rat' => $rat])

@endsection