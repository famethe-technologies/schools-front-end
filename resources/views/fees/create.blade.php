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
                        <li class="breadcrumb-item active">{{__('Fees')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Fees Structure</h6>
        </div>

        <div class="card-body">
            <form action="{{route("fees.store")}}" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="gender">Institution</label>

                        <select class="form-control" name="institutionId" required>
                            @foreach($records as $record)
                                <option value="{{$record->id}}">{{$record->institutionName}} {{$record->institutionCode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">

                        <label for="surname">Narration *</label>
                        <input type="text" class="form-control"   name="narration" required>

                    </div>
                    <div class="form-group col-md-4">

                        <label for="gender">Class</label>

                        <select class="form-control" name="classId" required>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->nameOfClass}} {{$class->code}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="status">Status *</label>
                        <select class="form-control" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Blocked">Blocked</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="firstname">Date created *</label>
                        <input type="date" class="form-control" name="createdDate" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="firstname">Date Updated *</label>
                        <input type="date" class="form-control" name="updatedDate" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="gender">Term</label>

                        <select class="form-control" name="termId" required>
                            @foreach($terms as $record)
                                <option value="{{$record->id}}">{{$record->termName}} </option>
                            @endforeach
                        </select>
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

