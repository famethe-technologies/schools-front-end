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
            <h6 class="m-0 font-weight-bold text-primary">Add New Institution</h6>
        </div>

        <div class="card-body">
            <form action="{{route("institutions.save")}}" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Institution Name *</label>
                        <input type="text" class="form-control" name="institutionName" required>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Institution Code *</label>
                        <input type="text" class="form-control"   name="institutionCode" required>

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Institution type *</label>
                        <select class="form-control" name="institutionType" required>
                            <option value="Private">Private</option>
                            <option value="Government">Government</option>
                            <option value="High School">High School</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Institution Address *</label>
                        <input type="text" class="form-control"   name="institutionAddress" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Email *</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="firstname">Phone *</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>

                    <div class="form-group col-md-3">

                        <label for="surname">Start Date </label>
                        <input type="date" class="form-control"   name="startDate" required>

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">End Date </label>
                        <input type="date" class="form-control"   name="endDate" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Term Name *</label>
                        <input type="text" class="form-control" name="termName" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="firstname">Maximum Days *</label>
                        <input type="number" class="form-control" name="maxPossibleDays" required>
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

