
<link rel="stylesheet" href="{{asset('/assets/front/home.scss')}}">

@extends("layouts.front.frontbase")

@section("content")
        <div class="main1">
            <div class="reklam">
                reklam
            </div>
            <div class="slider">
                slider
            </div>
            <div class="reklam">
                reklam
            </div>
        </div>
        <div class="main">
            <div class="header-home">
                Category
            </div>
            <div class="list">
                @foreach($games as $rs)
                    <div class="outer" style="border-radius: 10px">
                        <a href="{{route('game_index',$rs->id)}}">
                            <div class="inner-content" style="border-radius: 10px;" >
                                <div style="border-radius: 10px;">
                                    <h3>{{$rs->name}}</h3>
                                    <div class="img-holder">
                                        <img src="/games/{{$rs->name}}/{{$rs->image}}">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
