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
        @foreach($schools as $school)
            <div class="card">
                <br>
                <img src="/img/badge3.png" style="width:30%" class="center">
                <h1>{{$school['institutionCode']}}</h1>
                <p class="title"></p>
                <p>{{$school['institutionName']}}</p>
                <a href="/school/{{$school['id']}}" class="btn btn-primary">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                <p></p>
            </div>
        @endforeach
    </div>

@endsection
            <style>
                .card {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                    max-width: 200px;
                    margin: auto;
                    text-align: center;
                    font-family: arial;
                }

                .title {
                    color: grey;
                    font-size: 12px;
                }
                button:hover, a:hover {
                    opacity: 0.7;
                }
                .center {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%;
                }
            </style>
@section('scripts')
    <!-- Switch -->
    <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
    <script src="{{url('js/admin/dashboard.js')}}"></script>
@endsection






