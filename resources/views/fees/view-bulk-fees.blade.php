@extends('layouts.base')

@section('content')



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
                            {{Session::get('school')}}
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{__('Fees')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endsection


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Fees</h6>
            <br>
            <div>
                <a href="{{route('createBulkView')}}">Create Bulk Fee Type</a>
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table  id ="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Created</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->name}}</td>
                            <td>{{$record->amount}}</td>
                            <td>{{$record->created_at}}</td>
                            <td>

                                <a href="{{route("bulkFeesTypeEdit", $record->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection