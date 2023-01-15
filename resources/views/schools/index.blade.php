@extends('layouts.app')

@section('title')
    {{__('Dashboard')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        {{__('Schools')}}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{__('Schools')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Schools</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover table-bordered"  width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>School</th>
                        <th>School Type</th>
                        <th>Address</th>
                        <th>Code</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->institutionName}}</td>
                            <td>{{$record->institutionType}}</td>
                            <td>{{$record->institutionAddress}}</td>
                            <td>{{$record->institutionCode}}</td>
                            <td>{{$record->phone}}</td>
                            <td>{{$record->email}}</td>
                            <td>

                                <a href="/view-school-balance/{{ $record->id }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-money-bill"></i>
                                </a>

{{--                                <a href="/edit/school/{{$record->id}}" class="btn btn-primary btn-sm">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </a>--}}

{{--                                <form method="POST" action="" class="d-inline">--}}
{{--                                    <input type="hidden" name="_method" value="delete">--}}
{{--                                    <button type="submit" class="btn btn-danger btn-sm delete_branch">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection




