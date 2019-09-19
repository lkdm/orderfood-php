@extends('layouts.app')

@section('title')
    Edit product
@endsection

@section('content')
    @if ($product)
        <form method="POST" action="{{url("product/$product->id")}}">
            {{csrf_field()}}
            {{ method_field('PUT') }}

            <p><label>Name: </label>
            <input type=text name=name value="{{$product->name}}" />
            @if ($errors->has('name'))
                <div class="alert alert-success" role="alert">{{$errors->first('name')}}</div>
            @endif</p>

            <p><label>Price: </label>
            <input type=text name=price value="{{$product->price}}" />
            @if ($errors->has('price'))
                <div class="alert alert-success" role="alert">{{$errors->first('price')}}</div>
            @endif</p>

            <p><select name=manufacturer>
            @foreach ($manufacturers as $man)
                @if($man->id == old('manufacturer'))
                    <option value="{{ $man->id }}" selected=selected>{{ $man->name }}</option>
                @elseif ($man->id == $product->manufacturer_id)
                    <option value="{{$man->id}}" selected=selected>{{ $man->name }}</option>
                @else
                    <option value="{{$man->id}}">{{$man->name}}</option>
                @endif
            @endforeach
            <option value="-1">Testing: Invalid manufacturer</option>
            </select>
            @if ($errors->has('manufacturer'))
                <div class="alert alert-success" role="alert">{{$errors->first('manufacturer')}}</div>
            @endif</p>
            <input type=submit value=Update />
        </form>
    @endif
@endsection