@extends('layouts.app')

@section('title')
    Products List
@endsection

@section('content')
    <h2>Products</h2>
    @guest
    <p>Please log in to edit this product.</p>
    @else
    <p><a href={{url('product/create')}}>Create new</a></p>
    @endif
    @if ($products)
        <ul>
        @foreach($products as $product)
            <a href='product/{{$product->id}}'>
            <li>
            {{$product->name}}
            </li>
            </a>
        @endforeach
        </ul>
    @else
        No item found
    @endif
@endsection