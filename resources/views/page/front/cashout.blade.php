<link rel="stylesheet" href="{{ asset('/assets/front/profile.scss') }}">
@extends("layouts.front.frontbase")

@section("content")
    <div class="main">
        <div class="frame">
            <div class="in-frame">
                <div class="header-cashout">
                    <h5>{{ \Illuminate\Support\Facades\Auth::user()->name }}
                        <i class="fa-solid fa-gem" style="margin-right: 15px; margin-left: 55px; margin-top: 6px; color: darkblue"></i>{{ \Illuminate\Support\Facades\Auth::user()->diamond }}
                    </h5>
                </div>
                <div class="content">
                    <div class="left-table">
                        <table id="customers">
                            <tr>
                                <th>Diamond</th>
                                <th>TRY</th>
                            </tr>
                            @foreach($cashouts as $rs)
                                <tr>
                                    <td><i class="fa-solid fa-gem" style="color: darkblue; margin-right: 10px; margin-left: 10px"></i>{{ $rs->diamond }}</td>
                                    <td><h5 style="margin-left: 10px"><i class="fa-solid fa-turkish-lira-sign"></i>{{ $rs->TRY }}</h5></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="right-table">
                        <div class="d-flex">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="content" style="place-items: center">
                            <div class="container-fluid">
                                <form action="{{ route('withdraw') }}" method="post">
                                    @csrf
                                    <div>
                                        <div class="form-group">
                                            <label class="label" for="iban">Iban No</label>
                                            <input type="text" class="form-control" name="iban" id="iban" placeholder="Iban No">
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="diamond">Select Choice</label>
                                            <select class="form-control" name="values" id="values">
                                                @foreach($cashouts as $rs)
                                                    <option value='{"mainValue": "{{$rs->diamond}}", "extraValue": "{{$rs->TRY}}"}'>
                                                        <i class="fa-solid fa-gem" style="color: darkblue; margin-right: 10px; margin-left: 10px"></i>♦{{ $rs->diamond }} -->
                                                        <i class="fa-solid fa-turkish-lira-sign"></i>{{ $rs->TRY }} TRY
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="float: right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

