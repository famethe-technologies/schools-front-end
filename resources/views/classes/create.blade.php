@extends('layouts.base')

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
                        <li class="breadcrumb-item active">{{__('Class')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Class</h6>
        </div>

        <div class="card-body">
            <form action="/add/class" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">Class Name</label>
                        <input type="text" class="form-control" name="class_name" required>
                    </div>
                    <div class="form-group col-md-6">

                        <label for="surname">Class Code</label>
                        <input type="text" class="form-control"   name="code" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Class Teacher</label>

                         <select class="form-control" name="staff" required>
                             @foreach($staff as $record)
                             <option value="{{$record->id}}">{{$record->firstname}} {{$record->surname}}</option>
                                 @endforeach
                         </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Institution</label>

                        <select class="form-control" name="institutionId" required>
                            @foreach($institutions as $record)
                                <option value="{{$record->id}}">{{$record->institutionName}} {{$record->institutionCode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                       <br>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>


@endsection


@section('scripts')
    <!-- Switch -->
    <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
    <script src="{{url('js/admin/dashboard.js')}}"></script>
@endsection

