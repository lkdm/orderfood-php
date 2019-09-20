@extends('layouts.app')

@section('title')
    Dish
@endsection

@section('content')
    @if ($dish)
        <h2>{{$dish->name}}</h2>
        <p>{{$dish->price}}</p>
        <p>{{$dish->restaurant->name}}</p>
        <p>{{$dish->restaurant->address}}</p>

        @guest
            Please log in to order this product.
        @else
            @if ( Auth::user()->role == 'restaurant')
                <p><a href='{{url("dish/$dish->id/edit")}}'>Edit</a></p>
                <p>
                <form method="POST" action="{{url("dish/$dish->id")}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type=submit value=Delete />
                </form>
                </p>
            @elseif ( Auth::user()->role == 'administrator')
                Approve | Disaprove
            @else
                <form method="POST" action="{{url("order/add/$dish->id")}}">
                    {{csrf_field()}}
                    {{-- {{ method_field('aaaa') }} --}}
                    <input type=submit value=Order />
                </form>
            @endif
        @endguest
    @else
        No item found
    @endif
@endsection