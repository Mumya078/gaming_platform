
<link rel="stylesheet" href="{{asset('/assets/front/home.scss')}}">

@extends("layouts.front.frontbase")

@section("content")
    <div style="background: radial-gradient(circle at right bottom, #84f0ee , #967fef)">
        <div class="main1">
            <div class="reklam">
                reklam
            </div>
            <div class="slider">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="border-radius: 10px">
                            <div class="carousel-item active" style="border-radius: 10px">
                                <a href="/game/7">
                                    <img class="slider" src="/games/Araba/btc.jpg" alt="First slide">
                                </a>
                            </div>
                        @foreach($games as $game)
                            <div class="carousel-item" style="border-radius: 10px">
                                <a href="/game/{{$game->id}}">
                                    <img class="slider" src="/games/{{$game->name}}/{{$game->image}}" alt="First slide" style="border-radius: 10px">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="reklam">
                reklam
            </div>
        </div>
        <div class="main">
            <div class="header-home">
                @foreach($category as $rs)
                   <a href="{{route('category',$rs->id)}}" style="text-decoration: none"><div class="cat-container">{{$rs->name}}</div></a>
                @endforeach
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
    </div>
@endsection
