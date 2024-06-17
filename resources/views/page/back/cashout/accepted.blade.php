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
                            <li class="breadcrumb-item active">Accepted Cashouts</li>
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
                        <h3 class="card-title">Accepted Cashouts</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>User ID</th>
                                <th style="width: 150px;">User Name</th>
                                <th>Deposit Diamond</th>
                                <th>Request Money</th>
                                <th style="width: 300px;padding-left: 60px">IBAN</th>
                                <th style="width: 70px">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($withdraw as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td style="padding-left: 25px">{{$rs->user_id}}</td>
                                        <td style="width: 150px">{{$rs->user_name}}</td>
                                        <td style="padding-left: 60px">{{$rs->deposit_diamond}}</td>
                                        <td style="padding-left: 60px">{{$rs->cashout_try}}</td>
                                        <td style="width: 300px">{{$rs->iban}}</td>
                                        <td style="width: 50px;"><a href="{{route('delete_accepted',$rs->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a></td>
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

