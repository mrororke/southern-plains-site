@extends('layouts.portal')

@section('title', 'Layout Test')

@section('content')
<div class="grid grid-cols-5 gap-4">
    <div class="border">
            Column One
        </div>
        <div class="border">
            Column two
        </div>
        <div class="border">
            Column three
        </div>
        <div class="border">
            Column four
        </div>
    <div class="col-start-5">
        Calnedar here
    </div>

</div>

<h1>Portal Layout Test</h1>
<p>This content should appear inside the portal layout.</p>
@endsection