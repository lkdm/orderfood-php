@extends('layouts.app')

@section('title')
    Add a dish to your menu
@endsection

@section('content')
    
    <form method="POST" action="{{url("dish")}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <p><label>Name: </label>
        <input type=text name=name value="{{ old('name') }}"/>
            @if ($errors->has('name'))
                <div class="alert alert-success" role="alert">{{$errors->first('name')}}</div>
            @endif</p>

        <p><label>Price: </label>
        <input type=text name=price value="{{ old('price') }}" />
            @if ($errors->has('price'))
                <div class="alert alert-success" role="alert">{{$errors->first('price')}}</div>
            @endif</p>

        <p><label>Photo: </label>
        <input type=file name=photo />
            @if ($errors->has('photo'))
                <div class="alert alert-success" role="alert">{{$errors->first('photo')}}</div>
            @endif</p>


        <input type=submit value=Create />
    </form>

@endsection