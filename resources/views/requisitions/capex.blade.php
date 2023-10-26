@extends('layouts.base')

@section('title')
    {{__('Dashboard')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">
@endsection

@section('breadcrumb')
    @include('sweetalert::alert')
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
            <h6 class="m-0 font-weight-bold text-primary">Create Requisition</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('requisitions.createRequisition') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Description & Justification</label>
                        <input type="text" class="form-control" name="description" value="{{ $description }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Type</label>
                        <select type="text" class="form-control" id="validationDefault02" name="type" readonly>
                            <option value="{{ $type}}"> {{ $type }}</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount"  >
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Supplier One</label>
                        <input type="text" class="form-control" name="supplier_one"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Supplier Two</label>
                        <input type="text" class="form-control" name="supplier_two"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Supplier Three</label>
                        <input type="text" class="form-control" name="supplier_three"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Supplier One Amount</label>
                        <input type="text" class="form-control" name="amount_one"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Supplier Two Amount</label>
                        <input type="text" class="form-control" name="amount_two"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Supplier Three Amount</label>
                        <input type="text" class="form-control" name="amount_three"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Quotation One</label>
                        <input type="file" class="form-control" name="file_one"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Quotation Two</label>
                        <input type="file" class="form-control" name="file_two"  >
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Quotation Three</label>
                        <input type="file" class="form-control" name="file_three"  >
                    </div>


                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label">Suppliers</label>
                        <select type="text" class="form-control" id="validationDefault02" name="recommended_supplier">
                            @foreach($supplier as $item)
                                <option value="{{$item->id}}">{{$item->supplier_name}}</option>
                            @endforeach
                        </select>
                    </div>

{{--                    <div class="col-md-4">--}}
{{--                        <label for="exampleInputEmail1" class="form-label">Recommend Supplier</label>--}}
{{--                        <input type="text" class="form-control" name="recommended_supplier"  >--}}
{{--                    </div>--}}


                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Currency</label>
                        <select type="text" class="form-control" id="validationDefault02" name="currency">
                            <option value="USD">USD</option>
                            <option value="ZWL">ZWL</option>
                        </select>
                    </div>
                </div>
                <br>
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


