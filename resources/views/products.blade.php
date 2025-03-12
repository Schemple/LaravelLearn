@extends('layouts.master')

@section('title', 'Sản phẩm')

@section('content')
    <ul>
        @foreach ($products as $product)
            <li>{{ $product }}</li>
        @endforeach
    </ul><x-layout>
        <x-slot:heading>
            Job Information
        </x-slot:heading>
        <h2 class="font-bold text-lg"> {{ $job['title'] }}</h2>
        <p> {{ $job['description'] }}</p>
    </x-layout>

@endsection
