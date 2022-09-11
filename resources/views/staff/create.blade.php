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
            <h6 class="m-0 font-weight-bold text-primary">Add New Staff Member</h6>
        </div>

        <div class="card-body">
            <form action="/add/staff" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" required>
                    </div>
                    <div class="form-group col-md-6">

                        <label for="surname">Surname</label>
                        <input type="text" class="form-control"   name="surname" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                 <select class="form-control" name="gender" required>
                     <option value="Female">Female</option>
                     <option value="Male">Male</option>
                 </select>
                </div>
                    <div class="form-group col-md-6">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" name="position">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">National ID</label>
                        <input type="text" class="form-control" name="national_id">
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

