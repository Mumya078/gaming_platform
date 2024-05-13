<link rel="stylesheet" href="{{asset('/assets/front/profile.scss')}}">
@extends("layouts.front.frontbase")

@section("content")
    <div class="main">
        <div class="content">
            <div class="container-fluid">
                <form method="post" action="{{route('update_profile')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

