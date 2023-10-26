@extends('layouts.base')

@section('title')
    {{__('Dashboard')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">
@endsection

@section('breadcrumb')
 @include('sweetalert::alert'))
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        {{__('Schools')}}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{__('Schools')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Requisitions</h6>
        </div>
        <div align="center">
            <a href="{{ route('requisitions.create') }}" class="btn btn-success my-2" >Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover table-bordered"  width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>School</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Supplier</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td>@php
                                $company = \App\Models\School::find($item->company_id);
                                echo $company->institution_name;
                                @endphp
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->currency }}</td>
                            <td>{{ $item->recommended_amount }}</td>
                            <td>{{ \App\Models\Suppliers::find($item->recommended_supplier)->supplier_name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       @php
                                       $user = \Illuminate\Support\Facades\Auth::user();
                                       @endphp

                                        @if($user->role=='COO')
                                            <a class="dropdown-item" href="/delete-requisitions/{{$item->id}}/DECLINED_BY_COO">Decline</a>
                                            <a class="dropdown-item" href="/delete-requisitions/{{$item->id}}/APPROVED">COO Approval</a>
                                        @endif

                                        @if($user->role=='HEADMASTER')
                                            <a class="dropdown-item" href="/delete-requisitions/{{$item->id}}/DECLINED_BY_HEADMASTER">Decline</a>
                                            <a class="dropdown-item" href="/delete-requisitions/{{$item->id}}/PENDING_FINANCE_APPROVAL">Headmaster Approval</a>
                                        @endif

                                        @if($user->role=='FINANCE')
                                            <a class="dropdown-item" href="/delete-requisitions/{{$item->id}}/DECLINED_BY_FINANCE">Decline</a>
                                            <a class="dropdown-item" href="/delete-requisitions/{{$item->id}}/PENDING_COO_APPROVAL">Finance Approval</a>
                                        @else
                                            <a class="dropdown-item" href="/delete-requisitions/{{$item->id}}/CANCELLED">CANCELLED</a>
                                        @endif

                                        @if($item->status=='APPROVED')
                                            <a class="dropdown-item" href="/download-requisition/{{$item->id}}">Download Approval Form</a>
                                        @endif

                                        @if($item->type=='CAPEX')
                                            <a class="dropdown-item" href="/view-attachments/{{$item->id}}/one">View Quotation 1</a>
                                            <a class="dropdown-item" href="/view-attachments/{{$item->id}}/two">View Quotations 2</a>
                                            <a class="dropdown-item" href="/view-attachments/{{$item->id}}/three">View Quotation 3</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection





