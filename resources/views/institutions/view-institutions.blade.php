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
                            <li class="breadcrumb-item active">{{__('Institutions')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endsection


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Institutions</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table  id ="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Inst Name</th>
                        <th>Inst Code</th>
                        <th>Inst Type</th>
                        <th>Inst Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Term</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Max Days</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->institutionName}}</td>
                            <td>{{$record->institutionCode}}</td>
                            <td>{{$record->institutionType}}</td>
                            <td>{{$record->institutionAddress}}</td>
                            <td>{{$record->phone}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->term->termName}}</td>
                            <td>{{$record->term->startDate}}</td>
                            <td>{{$record->term->endDate}}</td>
                            <td>{{$record->term->maxPossibleDays}}</td>
                            <td>

                                <a href="{{route("institutions.edit", $record->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form method="POST" action="" class="d-inline">
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm delete_branch">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
