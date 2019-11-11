@extends('layouts.app')
@section('title', 'Create Country')
@section('header', 'Create Country')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1 style="color: red">Edit Country</h1>
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Country:</label>
                    <input type="text" class="form-control"
                           placeholder=" Enter Country" name="name"
                           value="{{$country->name}}">
                    <br>
                    <label>Information:</label>
                    <textarea rows="5" class="form-control" name="information" style="resize: none">
                        {{$country->information}}
                    </textarea>
                    <br>
                    <label>Image:</label>
                    <img src="{{ asset('storage/'.$country->image) }}" style="width: 100px; height: 70px">
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection

