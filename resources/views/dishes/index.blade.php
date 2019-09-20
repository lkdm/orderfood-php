@extends('layouts.app')

@section('title')
    Dishes list
@endsection

@section('content')
    <h2>Featured dishes</h2>
    <p>These dishes are the five most popular in the last week.</p>
    @guest
    <p>Please log in to edit this product.</p>
    @else
    <p><a href={{url('dish/create')}}>Create new</a></p>
    @endif
    @if ($dishes)
        <ul>
        @foreach($dishes as $dish)
            <a href='dish/{{$dish->id}}'>
            <li>
            {{$dish->name}}
            </li>
            </a>
        @endforeach
        </ul>
    @else
        No item found
    @endif
@endsection