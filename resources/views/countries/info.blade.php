@extends('layouts.app')
@section('title', 'Nations')
@section('header', 'Nations')
@section('content')

    <div class="container">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4"></div>


            <div class="main-grid1-grid-left">
                <h2>
                    <img src="{{$weather->current->weather_icons[0]}}" style="width: 50px; height: 50px">
                </h2>

                <h2 style="color: #dc0b09; font-weight: bold">
                    Nhiệt độ: {{$weather->current->temperature}}°C
                    <h3>
                        @if($weather->current->cloudcover > 0)
                            Nhiều mây
                        @else
                            Ít mây
                        @endif
                    </h3>
                    @if($weather->current->temperature > 30)
                        <h2>Trời nắng nóng </h2>
                    @elseif($weather->current->temperature > 24)
                        <h2>Trời mát </h2>
                    @elseif($weather->current->temperature > 15)
                        <h2>Trời lạnh </h2>
                    @else
                        <h2>Trời rét</h2>
                    @endif
                </h2>


                <h5 style="color: #2a9055; font-weight: bold">
                    Độ ẩm: {{$weather->current->humidity}}%
                </h5>

            </div>

            <div class="clear"></div>


        </div>
        @if(\Illuminate\Support\Facades\Gate::allows('crud-user'))
            <a href="{{route('countries.delete', $country->id)}}"
               onclick="return(confirm('xoa khong babie?'))">
                <button type="button" class="btn btn-danger">Delete</button>
            </a>
            <a href="{{route('countries.edit', $country->id)}}">
                <button type="button" class="btn btn-primary">Edit</button>
            </a>
        @endif
        <h1 type="" style="color: red">{{$country->name}}</h1>

        <img src="{{ asset('storage/'.$country->image) }}" style="width: 100px; height: 70px">

        <h3 style="color: #2fa360">Information:</h3>
        <h5>{{$country->information}}</h5>
        <div class="row">
            <div class="col-12 col-md-4"></div>
        </div>
    </div>
    <form>
        <div class="container">
            <div class="row">
            </div>
        </div>
    </form>
@endsection
