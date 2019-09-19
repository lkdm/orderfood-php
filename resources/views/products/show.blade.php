@extends('layouts.app')

@section('title')
    Product Properties
@endsection

@section('content')
    @if ($product)
        <h2>{{$product->name}}</h2>
        <p>{{$product->price}}</p>
        <p>{{$product->manufacturer->name}}</p>

        @guest
            Please log in to edit this product.
        @else
            <p><a href='{{url("product/$product->id/edit")}}'>Edit</a></p>
        <p>
            <form method="POST" action="{{url("product/$product->id")}}">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type=submit value=Delete />
            </form>

        </p>
        @endguest
    @else
        No item found
    @endif
@endsection