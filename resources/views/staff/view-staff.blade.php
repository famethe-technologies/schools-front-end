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
                            <li class="breadcrumb-item active">{{__('Staff')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endsection


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table  id ="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>National Id</th>
                        <th>Institution</th>
                        <th>Date Created</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->firstname}}</td>
                            <td>{{$record->surname}}</td>
                            <td>{{$record->gender}}</td>
                            <td>{{$record->position}}</td>
                            <td>{{$record->nationalId}}</td>
                            <td>{{$record->institution->institutionName}}</td>
                            <td>{{$record->createdDate}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
