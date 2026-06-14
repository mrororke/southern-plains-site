@extends('layouts.portal')

@section('title', 'Layout Test')

@section('content')
<div class="grid grid-cols-5 gap-4">
    <div class="col-span-4">
        First Column
    </div>
    <div class="col-start-5">
        Calnedar here
    </div>

</div>

<h1>Portal Layout Test</h1>
<p>This content should appear inside the portal layout.</p>
@endsection