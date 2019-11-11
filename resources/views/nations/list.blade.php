@extends('layouts.app')
@section('title', 'Nations')
@section('header', 'Nations')
@section('content')
    <form>
        <div style="text-align:center;padding:1em 0;">
            <iframe
                src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FHo_Chi_Minh"
                width="100%" height="90" frameborder="0" seamless>
            </iframe>
        </div>
        <div class="container">
            @if(\Illuminate\Support\Facades\Gate::allows('crud-user'))
                <a href="{{route('nations.create')}}">
                    <button type="button" class="btn btn-primary">Create</button>
                </a>
            @endif
            <div class="row">
                @foreach($nations as $key=>$nation)
                    <div class="col-12 col-md-4">
                        <div class="card-deck">
                            <div class="card">
                                @if($nation->image)
                                    <img src="{{ asset('storage/'.$nation->image) }}"
                                         style="width: 100px; height: 70px">
                                @else
                                    {{'Chưa có ảnh'}}
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #306176">{{$nation->name}}</h5>
                                    <h6>
                                        <a href="{{route('countries.list', $nation->id)}}">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            More...
                                        </a>
                                    </h6>
                                </div>
                                @if(\Illuminate\Support\Facades\Gate::allows('crud-user'))
                                    <div class="card-footer">

                                        <a href="{{route('nations.edit', $nation->id)}}">
                                            <button type="button" class="btn btn-primary">Edit</button>
                                        </a>
                                        <a href="{{route('nations.destroy', $nation->id)}}"
                                           onclick="return(confirm('xoa khong babie?'))">
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </a>

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>

    {{--    <br>--}}
    {{--    <form>--}}
    {{--        <a href="{{route('countries.list')}}">--}}
    {{--            <button type="button" class="btn btn-primary">Country</button>--}}
    {{--        </a>--}}

    {{--        <a href="{{route('nations.create')}}">--}}
    {{--            <button type="button"  class="btn btn-primary">Create</button>--}}
    {{--        </a>--}}
    {{--        <table class="table table-dark">--}}
    {{--            <tr>--}}
    {{--                <th>STT</th>--}}
    {{--                <th>Nations</th>--}}
    {{--                <th>Information</th>--}}
    {{--                <th>National Flag</th>--}}
    {{--                <th>Control</th>--}}
    {{--            </tr>--}}
    {{--            @foreach($nations as $key=>$nation)--}}
    {{--                <tr>--}}
    {{--                    <td>{{++$key}}</td>--}}
    {{--                    <td>{{$nation->name}}</td>--}}
    {{--                    <td>{{$nation->information}}</td>--}}
    {{--                    <td>--}}
    {{--                        @if($nation->image)--}}
    {{--                            <img src="{{ asset('storage/'.$nation->image) }}" style="width: 80px; height: 50px">--}}
    {{--                        @else--}}
    {{--                            {{'Chưa có ảnh'}}--}}
    {{--                        @endif--}}
    {{--                    </td>--}}
    {{--                    <td><a href="{{route('nations.destroy', $nation->id)}}" onclick="return(confirm('xoa khong babie?'))">Delete</a>--}}
    {{--                        <a href="{{route('nations.edit', $nation->id)}}">Edit</a>--}}
    {{--                    </td>--}}
    {{--                </tr>--}}
    {{--            @endforeach--}}
    {{--        </table>--}}
    {{--    </form>--}}

@endsection
