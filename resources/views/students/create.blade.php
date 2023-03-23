@extends('layouts.base')

@section('title')
    {{__('Dashboard')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        {{Session::get('school')}} : {{__('Students')}}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{__('Student')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Student</h6>
        </div>

        <div class="card-body">
            <form action="/add/student" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">First Name *</label>
                        <input type="text" class="form-control" name="student_firstname" required>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Surname *</label>
                        <input type="text" class="form-control"   name="student_surname" required>

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">National ID</label>
                        <input type="text" class="form-control"   name="student_national_id">

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Date of Birth *</label>
                        <input type="date" class="form-control"   name="dob" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Birth Entry Number *</label>
                        <input type="text" class="form-control" name="birth_entry_no" required>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Gender *</label>
                        <select class="form-control" name="student_gender" required>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Passport No </label>
                        <input type="text" class="form-control"   name="passport_no">

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Race *</label>
                        <select class="form-control" name="race" required>
                            <option value="Black">Black</option>
                            <option value="White">White</option>
                            <option value="Asian">Asian</option>
                            <option value="Other">Other</option>
                        </select>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Blood Group </label>
                        <select class="form-control" name="blood_group" required>

                        <option value="O">O</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Disabilities </label>
                        <input type="text" class="form-control"   name="disabilities" required>

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Main Language *</label>
                        <input type="text" class="form-control"   name="main_language" required>

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Religion *</label>
                        <input type="text" class="form-control"   name="religion" required>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Medical Aid</label>
                        <input type="text" class="form-control" name="medical_aid" required>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Medical Aid No</label>
                        <input type="text" class="form-control"   name="medical_aid_no" required>

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Residential Address</label>
                        <input type="text" class="form-control"   name="residential_address" required>

                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Student Phone</label>
                        <input type="text" class="form-control"   name="student_phone" required>

                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="firstname">Student Email</label>
                        <input type="text" class="form-control" name="student_email" required>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Special Diet</label>
                        <input type="text" class="form-control"   name="special_diet" required>

                    </div>

                    <div class="form-group col-md-3">
                        <label for="firstname">Sporting Description</label>
                        <input type="text" class="form-control" name="sporting_description" required>
                    </div>
                    <div class="form-group col-md-3">

                        <label for="surname">Sports House</label>
                        <select type="text" class="form-control"   name="sport_house" required>
                            @foreach($houses as $house)
                                <option value="{{$house->id}}">{{$house->houseName}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">

                        <label for="surname">Allergies</label>
                        <input type="text" class="form-control"   name="allergies" required>

                    </div>
                    <div class="form-group col-md-6">

                        <label for="surname">Special Medical Requirements</label>
                        <input type="text" class="form-control"   name="special_medical_requirements" required>

                    </div>



                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">

                        <label for="surname">Class</label>
                        <select type="text" class="form-control"   name="class_id" required>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->nameOfClass}}</option>
                            @endforeach
                        </select>

                    </div>
{{--                    <div class="form-group col-md-4">--}}
{{--                        <label for="gender">Institution</label>--}}

{{--                        <select class="form-control" name="institutionId" required>--}}
{{--                            @foreach($institutions as $record)--}}
{{--                                <option value="{{$record->id}}">{{$record->institutionName}} {{$record->institutionCode}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="form-group col-md-4">
                        <label for="firstname">Student Type</label>
                        <select class="form-control" name="studentType" required>
                            <option value="Normal">Normal</option>
                            <option value="Trustee">Trustee</option>
                            <option value="Teaching Staff">Teaching Staff</option>
                            <option value="Non-Teaching Staff">Non-Teaching Staff</option>
                            <option value="Scholarship 100">Scholarship 100</option>
                            <option value="Scholarship 50">Scholarship 50</option>
                            <option value="Scholarship 25">Scholarship 25</option>
                            <option value="Scholarship 25">Scholarship 25</option>
                            <option value="Scholarship 10">Scholarship 10</option>
                            <option value="Scholarship 5">Scholarship 5</option>
                        </select>
                    </div>
{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="phone">Parent/Guardian</label>--}}
{{--                        @include('students.parent_modal')--}}
{{--                        <button type="button" class="btn btn-warning btn-sm add_patient float-right"  data-toggle="modal" data-target="#parent_modal">--}}
{{--                            <i class="fa fa-exclamation-triangle"></i>  {{__('Not Listed ? Add Parent/Guardian')}}--}}
{{--                        </button>--}}
{{--                        <select name="productId" id ="lang" class="form-control" >--}}

{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="form-group col-md-4">
                        <label for="phone">Date Enrolled</label>
                        <input type="date" class="form-control"   name="date_enrolled" required>
                    </div>
                </div>

    <div class="card">
        <div class="card-content">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Add Parent/Guardian</h6>
            </div>
                <div class="text-danger" id="parent_modal_error"></div>
                <div class="card-body" id="create_parent_inputs">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="surname">First Name</label>
                            <input type="text" class="form-control" placeholder="{{__('First Name')}}" name="firstname"  required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" placeholder="{{__('Surname')}}" name="surname"  required>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="surname">National ID</label>
                            <input type="text" class="form-control" placeholder="{{__('National-ID')}}" name="national_id"  id="create_phone" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="Phone">Phone</label>
                            <input type="number" class="form-control" placeholder="{{__('Phone')}}" name="phone" id="create_address"  required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="Gender">Gender</label>
                                <select class="form-control" name="gender" placeholder="{{__('Gender')}}" id="create_gender" required>
                                    <option value="" disabled selected>{{__('Select Gender')}}</option>
                                    <option value="male" >{{__('Male')}}</option>
                                    <option value="female">{{__('Female')}}</option>
                                </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Gender">Relationship</label>
                            <input type="text" class="form-control datepicker" placeholder="{{__('Relationship')}}" name="relationship" required id="create_dob">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Gender">Email</label>
                            <input type="email" class="form-control" placeholder="{{__('Email')}}" name="email" id="create_address"  required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Gender">Occupation</label>
                            <input type="text" class="form-control datepicker" placeholder="{{__('Occupation')}}" name="occupation" required id="create_dob">
                        </div>
                    </div>
                   <div class="row">

                         <div class="form-group col-md-6">
                           <label for="Gender">Employer</label>
                            <input type="text" class="form-control datepicker" placeholder="{{__('Employer')}}" name="employer" required id="create_dob">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="Gender">Address</label>
                        <input type="text" class="form-control" placeholder="{{__('Address')}}" name="address"  required>
                        </div>

                           <button type="submit" class="btn btn-primary btn-lg btn-block">{{__('Submit')}}</button>
                    </div>



        </form>
        </div>
    </div>


@endsection


@section('scripts')
    <!-- Switch -->
    <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
    <script src="{{url('js/admin/dashboard.js')}}"></script>
    <script type="text/javascript">
        $("#lang").select2().val("0").trigger("change");
        $("#lang2").select2().val("0").trigger("change");
    </script>


@endsection

