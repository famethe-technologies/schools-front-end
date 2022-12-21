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
                        <li class="breadcrumb-item active">{{__('Institution')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Institution</h6>
        </div>

        <div class="card-body">
            <form action="/update/staff/{{$record->id}}" method="post" enctype="multipart/form">
                @csrf

                <input type="text" class="form-control" name="id" value="{{$record->id}} " hidden required>
                <input type="text" class="form-control" name="termId" value="{{$record->term->id}} " hidden required>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="firstname">Institution Name</label>
                        <input type="text" class="form-control" name="institutionName" value="{{$record->institutionName}} "  required>
                    </div>
                    <div class="form-group col-md-4">

                        <label for="surname">Institution Address</label>
                        <input type="text" class="form-control"   name="institutionAddress"   value="{{$record->institutionAddress}}" required>

                    </div>
                    <div class="form-group col-md-4">

                        <label for="surname">Institution Code</label>
                        <input type="text" class="form-control"   name="institutionAddress"   value="{{$record->institutionCode}}" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="gender">Institution Type</label>
                        <select class="form-control" name="institutionType" required>
                            <option value="{{$record->institutionType}}">{{$record->institutionType}}</option>
                            <option value="Private">Private</option>
                            <option value="Government">Government</option>
                            <option value="High School">High School</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="position">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$record->email}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value=" {{$record->phone}}">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="position">Term Name</label>
                        <input type="text" class="form-control" name="termName" value="{{$record->termName}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Max Days</label>
                        <input type="number" class="form-control" name="maxPossibleDays" value=" {{$record->maxPossibleDays}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Start Date</label>
                        <input type="date" class="form-control" name="startDate" value=" {{$record->startDate}}" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="position">End Date</label>
                        <input type="date" class="form-control" name="endDate" value="{{$record->endDate}}" required>
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

