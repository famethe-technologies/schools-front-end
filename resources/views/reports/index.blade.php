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
                        <li class="breadcrumb-item active">{{__('Invoice')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Report Generator</h6>

            @if (session('error'))
                <div style="text-align: center;"> <div class="alert alert-danger" id="flash-message">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div style="text-align: center;"> <div class="alert alert-danger" id="flash-message">
                        {{ session('success') }}
                    </div>
                </div>
            @endif


            <style>
                #flash-message {
                    animation: fadeOut 5s forwards;
                }

                @keyframes fadeOut {
                    to {
                        opacity: 0;
                        visibility: hidden;
                    }
                }

            </style>
        </div>

        <div class="card-body">
            <form action="{{route('generateReport')}}" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Term</label>

                        <select class="form-control" name="termId" required>
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="gender">Fees</label>
                        <select class="form-control" name="fees_type" required>
                            <option value="School Billing Report">Class Billing Report</option>
{{--                            <option value="Student Billing Report By Student">School Billing Report By Student & Fees</option>--}}
                            <option value="Arrears Report By School">Arrears Report By School</option>
                            <option value="Arrears Report By Class">Arrears Report By Class</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Class</label>
                            <select type="text" class="form-control"   name="class_id" required>
                                <option value="NONE">NONE</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->nameOfClass}}</option>
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

