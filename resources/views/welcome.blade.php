@extends('layouts.app')

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
                        <i class="nav-icon fas fa-th"></i>
                        {{__('Dashboard')}}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-2 col-6">

            <div class="small-box bg-light">
                <div class="inner">
                    <h3>5</h3>
                    <p>{{__('Tests')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-2 col-6">

            <div class="small-box bg-light">
                <div class="inner">
                    <h3>20</h3>
                    <p>{{__('Cultures')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-2 col-6">

            <div class="small-box bg-light">
                <div class="inner">
                    <h3>25</h3>
                    <p>{{__('Antibiotics')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-2 col-6">

            <div class="small-box bg-light">
                <div class="inner">
                    <h3>30</h3>
                    <p>{{__('Patients')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-2 col-6">

            <div class="small-box bg-light">
                <div class="inner">
                    <h3>30</h3>
                    <p>{{__('Patients')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">

            <div class="small-box bg-light">
                <div class="inner">
                    <h3>30</h3>
                    <p>{{__('Patients')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <!-- Switch -->
    <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
    <script src="{{url('js/admin/dashboard.js')}}"></script>
@endsection
