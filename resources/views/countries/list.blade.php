@extends('layouts.app')
@section('title', 'Nations')
@section('header', 'Nations')
@section('content')
    <div class="container">
        <h1 type="" style="color: red">{{$nation->name}}</h1>
        <img src="{{ asset('storage/'.$nation->image) }}" style="width: 100px; height: 70px">
        <h3 style="color: #2fa360">Information:</h3>
        <h5>{{$nation->information}}</h5>
        <div class="row">
            <div class="col-12 col-md-4"></div>
        </div>
    </div>


    <form>
        <div class="container">
            @if(\Illuminate\Support\Facades\Gate::allows('crud-user'))
            <a href="{{route('countries.create', $nation->id)}}">
                <button type="button" class="btn btn-primary">Create Country</button>
            </a>
            @endif
            <div class="row">

                @foreach($countries as $key=>$country)
                    <div class="col-12 col-md-4">
                        <div class="card-deck">
                            <div class="card">
                                @if($country->images)
                                    <img src="{{ asset('storage/'.$country->image) }}"
                                         style="width: 100px; height: 70px">
                                @else
                                    {{'Chưa có ảnh'}}
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #306176">{{$country->name}}</h5>
                                    <h6>
                                        <a href="{{route('countries.information', $country->id)}}">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            More...
                                        </a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
@endsection
