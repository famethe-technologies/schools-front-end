@extends('layouts.app')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Deduction Management</label>
    <hr>

    <form method="POST" action="{{ route('deductions.update', $deduction->id) }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Name </label>
                <input type="text" class="form-control" name="name" value="{{$deduction->name}}" required>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
