@extends('layouts.app')
@section('title', 'Create Nation')
@section('header', 'Create Nation')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1 style="color: red">Create Nation</h1>
            <form method="post" action="{{route('nations.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nation:</label>
                    <input type="text" class="form-control"
                           placeholder=" Enter nation" name="name">
                    <br>
                    <label>Information:</label>
                    <textarea rows="5" class="form-control" name="information" style="resize: none"></textarea>
                    <br>
                    <label>National Flag:</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection

