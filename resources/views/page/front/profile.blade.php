<link rel="stylesheet" href="{{asset('/assets/front/profile.scss')}}">
@extends("layouts.front.frontbase")

@section("content")
    <div class="main">
        <div class="frame">
            @include('profile.show')
        </div>
    </div>
@endsection

