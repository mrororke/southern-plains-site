@extends('layouts.instructor')

@section('content')

<script>
    window.location.href = "{{ route('admin.trick-catalog.index') }}";
</script>

@endsection