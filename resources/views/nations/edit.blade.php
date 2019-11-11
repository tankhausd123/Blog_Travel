@extends('layouts.app')
@section('title', 'Update Nation')
@section('header', 'Update Nation')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1 style="color: red">Update Nation</h1>
            <form method="post" action="{{route('nations.update', $nations->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nation:</label>
                    <input type="text" class="form-control"
                           value="{{$nations->name}}"
                           placeholder=" Enter nation" name="name">
                    <br>
                    <label>Information:</label>
                    <textarea rows="5" class="form-control" name="information" style="resize: none">{{$nations->information}}</textarea>
                    <br>
                    <label>National Flag:</label>
                    <img src="{{ asset('storage/'.$nations->image) }}" style="width: 80px; height: 50px">
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
