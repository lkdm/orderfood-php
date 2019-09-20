@extends('layouts.app')

@section('title')
    Restaurants list
@endsection

@section('content')
    <h2>Featured restaurants</h2>
    <p>Check out some of our favourite restaurants in your area.</p>
    @if ($restaurants)
        <ul>
        @foreach($restaurants as $restaurant)
            <a href='restaurant/{{$restaurant->id}}'>
            <li>
            {{$restaurant->name}}
            </li>
            </a>
        @endforeach
        </ul>
    @else
        No item found
    @endif
@endsection