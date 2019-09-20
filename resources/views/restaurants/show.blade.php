@extends('layouts.app')

@section('title')
    Restaurant
@endsection

@section('content')
    @if ($restaurant)
        <h2>{{ $restaurant->name }}</h2>
        <p>Here are some of our dishes, available to order.</p>
        @if ($dishes)
            <ul>
            @foreach($dishes as $dish)
                <a href='{{ url('dish/'.$dish->id) }}'>
                <li>
                {{$dish->name}}
                </li>
                </a>
            @endforeach
            </ul>
        @else
            This restaurant no longer has any dishes available.
        @endif
    @else
        This restaurant is no longer available.
    @endif
@endsection