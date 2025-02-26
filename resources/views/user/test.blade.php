@extends('layouts.app')
@section('content')
    <h1>Active Tests</h1>
    <ul>
        @foreach($data as $test)
            <li>ID: {{ $test->id }}, Name: {{ $test->name }}, Status: {{ $test->status }}</li>
        @endforeach
    </ul>
@endsection
