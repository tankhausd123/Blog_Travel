@extends('layouts.app')
@section('title', 'Create Country')
@section('header', 'Create Country')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1 style="color: red">Create Nation</h1>
            <form method="post" action="{{route('countries.store', $nation->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Country:</label>
                    <input type="text" class="form-control
                           @if($errors->has('name'))
                               border-danger
                           @endif" placeholder=" Enter Country" name="name">
                           @if($errors->has('name'))
                           <p class="text-danger">
                            {{$errors->first('name')}}
                           </p>
                           @endif
                    <br>
                    <label>Information:</label>
                    <textarea rows="5" class="form-control" name="information" style="resize: none"></textarea>
                    <br>
                    <lable>Weather API</lable>
                    <input type="text" class="form-control" name="query_api">
                    <label>Image:</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
