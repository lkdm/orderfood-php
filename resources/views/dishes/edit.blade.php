@extends('layouts.app')

@section('title')
    Edit your dish
@endsection

@section('content')
    @if ($dish)

    <form method="POST" action="{{url("dish/$dish->id")}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}

        <p><label>Name: </label>
            @if ($errors->has('name'))
                <input type=text name=name value="{{ old('name') }}"/>
                <div class="alert alert-success" role="alert">{{$errors->first('name')}}</div>
            @else
                <input type=text name=name value="{{ $dish->name }}"/>
            @endif</p>

        <p><label>Price: </label>
            @if ($errors->has('price'))
                <input type=text name=price value="{{ old('price') }}"/>
                <div class="alert alert-success" role="alert">{{$errors->first('price')}}</div>
            @else
                <input type=text name=price value="{{ $dish->price }}"/>
            @endif</p>

        <p><label>Photo: </label>
        <p>
            @if ($dish->photo)
                <img src="{{asset('img/$dish->photo')}}" />
            @endif
        </p>
        <input type=file name=photo />
            @if ($errors->has('photo'))
                <div class="alert alert-success" role="alert">{{$errors->first('photo')}}</div>
            @endif</p>


        <input type=submit value=Create />
    </form>
    @else
        Could not find that dish.
    @endif
@endsection