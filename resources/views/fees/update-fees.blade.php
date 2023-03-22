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
            <h6 class="m-0 font-weight-bold text-primary">Edit Fees Structure</h6>
        </div>

        <div class="card-body">
            <form action="{{route("fees.update", $records->id)}}" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="status">Narration</label>
                        <input type="text" class="form-control"   name="narration" value="{{ $records->narration }}" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="gender">Term</label>

                        <select class="form-control" name="termId" required>
                            <option value="{{$records->term_id}}">{{$records->term_id}} </option>
                            <option value="1">1 </option>
                            <option value="2">2 </option>
                            <option value="3">3 </option>

                        </select>
                    </div>

                    <div class="form-group col-md-4">

                        <label for="surname">Amount *</label>
                        <input type="number" class="form-control"   name="amount" value="{{$records->amount}}" required>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="status">Currency *</label>
                        <select class="form-control" name="currency" required>
                            <option value="{{$records->currency}}">{{$records->currency}}</option>
                            <option value="USD">USD</option>
                            <option value="RTGS">RTGS</option>
                            <option value="RAND">RAND</option>
                            <option value="KWACHA">KWACHA</option>
                            <option value="PULA">PULA</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4" hidden>
                        <label for="status">Status *</label>
                        <select class="form-control" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Blocked">Blocked</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    </div>
                    {{--                    <div class="form-group col-md-4">--}}
                    {{--                        <label for="firstname">Date created *</label>--}}
                    {{--                        <input type="date" class="form-control" name="createdDate" required>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="form-group col-md-4">--}}
                    {{--                        <label for="firstname">Date Updated *</label>--}}
                    {{--                        <input type="date" class="form-control" name="updatedDate" required>--}}
                    {{--                    </div>--}}
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

