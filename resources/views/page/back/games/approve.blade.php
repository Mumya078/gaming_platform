<link rel="stylesheet" href="{{asset('/assets/back/dist/css/myback.scss')}}">

@extends("layouts.back.adminbase")


@section("content_back")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Striped Full Width Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Uploader</th>
                                <th style="width: 75px;padding-left: 25px">Try It</th>
                                <th style="width: 40px">Approve</th>
                                <th style="width: 40px">Deny</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $rs)
                                @php
                                $user = \App\Models\User::find($rs->user_id)
                                @endphp
                                <tr>
                                    <td style="padding-top: 30px">{{$rs->id}}</td>
                                    <td style="padding-top: 30px;width: 400px">{{$rs->name}}</td>
                                    <td style="padding-top: 30px;width: 400px">{{$user->name}}</td>
                                    <td>
                                        <a href="{{route('game_index',$rs->id)}}">
                                            <div class="my-imgholder">
                                                <img src="/games/{{$rs->name}}/{{$rs->image}}">
                                                <img src="/assets/images/playbutton.png"
                                                     style="width: 50px;height: 50px;justify-content: center;opacity: 0.885">
                                            </div>
                                        </a>
                                    </td>
                                    <td style="padding-top: 30px"><a href="{{route('approve_game',$rs->id)}}"><button class="btn btn-sm btn-primary">Approve</button></a></td>
                                    <td style="padding-top: 30px"><a href="{{route('deny_game',$rs->id)}}"><button class="btn btn-sm btn-danger">Deny</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
