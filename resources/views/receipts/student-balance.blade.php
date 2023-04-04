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
                            <li class="breadcrumb-item active">{{__('Student Balance')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endsection


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Balance : {{ $records->balance }} </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table  id ="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Narration</th>
                            <th>Debit</th>
                            <th>Credit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{{$record->description}}</td>
                                <td>{{$record->debit}}</td>
                                <td>{{$record->credit}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>





@endsection
