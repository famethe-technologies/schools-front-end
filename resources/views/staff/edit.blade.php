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
                        <li class="breadcrumb-item active">{{__('Staff')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Staff Member</h6>
        </div>

        <div class="card-body">
            <form action="{{route("staff.update",$record->id)}}" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="{{$record->firstname}} "  required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control"   name="surname"   value="{{$record->surname}}" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                 <select class="form-control" name="gender" required>
                     <option value="{{$record->gender}}">{{$record->gender}}</option>
                     <option value="Female">Female</option>
                     <option value="Male">Male</option>
                 </select>
                </div>
                    <div class="form-group col-md-6">
                        <label for="position">Position</label>
                        <select class="form-control" name="position" required>
                            <option value="{{$record->position}}">{{$record->position}}</option>
                            <option value="teacher">Teacher</option>
                            <option value="bursar">Bursar</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="it-support">IT Support</option>
                            <option value="Senior Teacher">Senior Teacher</option>
                            <option value="Swimming Coach">Swimming Coach</option>
                            <option value="Bursar">Bursar</option>
                            <option value="Sports Teacher">Sports Teacher</option>
                            <option value="Administrator Clerk">Administrator Clerk</option>
                            <option value="Ancilary Staff">Ancillary Staff</option>
                            <option value="Boarding Master">Boarding Master</option>
                            <option value="Boarding Matron">Boarding Matron</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">National ID</label>
                        <input type="text" class="form-control" name="national_id" value=" {{$record->nationalId}}">
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-check">

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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

