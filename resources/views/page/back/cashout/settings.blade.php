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
                        <h3 class="card-title">Cashout Choice List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="padding-left: 15px">Diamond</th>
                                <th style="width: 100px;margin-right: 5px">TRY</th>
                                <th style="width: 100px;margin-right: 5px">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cashouts as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td><i class="fa-solid fa-gem" style="color: darkblue;margin-right: 10px;margin-left: 10px"></i>{{$rs->diamond}}</td>
                                    <td style="width: 100px"><i class="fa-solid fa-turkish-lira-sign" style="margin-right: 5px"></i>{{$rs->TRY}}</td>
                                    <td><a href="{{route('delete',$rs->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-info" style="margin-top: 50px">
                    <div class="card-header">
                        <h3 class="card-title">Add Cashout Choice</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('upload_choice')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Diamond</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diamond" id="diamond" placeholder="Diamond">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">TRY</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="TRY" id="TRY" placeholder="TRY">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

