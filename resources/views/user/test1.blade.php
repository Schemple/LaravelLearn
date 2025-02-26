@extends('layouts.app')
@section('content')
<h1>This is a test page on passing data, loop</h1>
{{ $x = 10 }}
@if ($x < 20)
<h2>woa </h2>
@endif
{{--unless: neu dieu kien thoa man, khong hien ra--}}
@unless ($x < 20)
<h3> this is unless </h3>
@endunless

@if (!empty($x))
<h4>this is if not </h4>
@endif

@empty(!$x)
<h4>this is empty </h4>
@endempty

@isset($x)
<h5>this is isset</h5>
@endisset

@switch($x)
@case(10)
    <h5>this is case 10</h5>
    @break
@case(20)
    <h5>this is case 20</h5>
    @break
@case(30)
    <h5>this is case 30</h5>
    @break
@default
    <h5>no shit</h5>
@endswitch

@for ($i = 0; $i < 3; $i++)
<h6>{{ $i }} this is for</h6>
@endfor

@foreach ($arrays as $item)
{{ $item }}
@endforeach
@forelse ($aa as $item)
{{ $item }}
@empty
<h5>this is empty</h5>
@endforelse

{{--    @while() @endwhile--}}
@endsection
