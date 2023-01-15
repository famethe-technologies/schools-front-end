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
                        <li class="breadcrumb-item active">{{__('Receipt')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Receipt</h6>
        </div>

        <div class="card-body">
            <form action="{{route("receipts.store")}}" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="gender">Student Name</label>

                        <select class="form-control" name="studentId" required>
                            @foreach($students as $record)
                                <option value="{{$record->id}}">{{$record->studentFirstName}} {{$record->studentSurname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">

                        <label for="surname">Amount *</label>
                        <input type="text" class="form-control"   name="amount" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">


                        <label for="surname">Description *</label>
                        <select class="form-control" name="description" required>
                            <option value="TUITION">TUITION</option>
                            <option value="UNIFORM">UNIFORM</option>
                            <option value="LEVY">LEVY</option>
                            <option value="OTHER">OTHER</option>
                        </select>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender">Payment Method</label>
                        <select class="form-control" name="methodOfPayment" required>
                            <option value="USD">USD</option>
                            <option value="SWIPE-USD">SWIPE-USD</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="surname">Receipt No *</label>
                        <input type="text" class="form-control"   name="receiptNumber" required>
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

