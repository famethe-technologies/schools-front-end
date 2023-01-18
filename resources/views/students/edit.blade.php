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
            <h6 class="m-0 font-weight-bold text-primary">Update Student</h6>
        </div>

        <div class="card-body">
            <form action="{{route("students.update", $record->id)}}" method="post" enctype="multipart/form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">First Name *</label>
                        <input type="text" class="form-control" name="student_firstname" value="{{$record->studentFirstName}}"  required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Surname *</label>
                        <input type="text" class="form-control"   name="student_surname" value="{{$record->studentSurname}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">National ID</label>
                        <input type="text" class="form-control"   name="student_national_id" value="{{$record->nationalId}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Date of Birth *</label>
                        <input type="date" class="form-control"   name="dob" value="{{$record->dob}}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Birth Entry Number *</label>
                        <input type="text" class="form-control" name="birth_entry_no" value="{{$record->birthEntryNo}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Gender *</label>
                        <select class="form-control" name="student_gender" required>
                            <option value="{{$record->gender}}">{{$record->gender}}</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Passport No </label>
                        <input type="text" class="form-control"   name="passport_no" value="{{$record->passportNo}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Race *</label>
                        <select class="form-control" name="race" required>
                            <option value="{{$record->race}}">{{$record->race}}</option>
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
                            <option value="{{$record->race}}">{{$record->race}}</option>
                            <option value="O">O</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Disabilities </label>
                        <input type="text" class="form-control"   name="disabilities" value="{{$record->disabilities}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Main Language *</label>
                        <input type="text" class="form-control"   name="main_language" value="{{$record->mainLanguage}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Religion *</label>
                        <input type="text" class="form-control"   name="religion" value="{{$record->religion}}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Medical Aid</label>
                        <input type="text" class="form-control" name="medical_aid" value="{{$record->medicalAid}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Medical Aid No</label>
                        <input type="text" class="form-control"  name="medical_aid_no" value="{{$record->medicalAidNo}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Residential Address</label>
                        <input type="text" class="form-control"  name="residential_address" value="{{$record->residentialAddress}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Student Phone</label>
                        <input type="text" class="form-control"   name="student_phone" value="{{$record->studentPhone}}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="firstname">Student Email</label>
                        <input type="text" class="form-control" name="student_email" value="{{$record->studentEmail}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Special Diet</label>
                        <input type="text" class="form-control"   name="special_diet" value="{{$record->specialDiet}}" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="firstname">Sporting Description</label>
                        <input type="text" class="form-control" name="sporting_description" value="{{$record->sportingDescription}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="surname">Sports House</label>
                        <select type="text" class="form-control"   name="sport_house" required>
                           {{-- <option value="{{$record->sporthouse}}">{{$record->sporthouse}}</option>--}}
                        @foreach($houses as $house)
                                <option value="{{$house->id}}">{{$house->houseName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="surname">Allergies</label>
                        <input type="text" class="form-control" name="allergies" value="{{$record->allergies}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Special Medical Requirements</label>
                        <input type="text" class="form-control" name="special_medical_requirements" value="{{$record->specialMedicalRequirements}}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="surname">Class</label>
                        <select type="text" class="form-control"   name="class_id" required>
                            <option value="{{$record->classes->id}}">{{$record->classes->nameOfClass}}</option>
                        @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->nameOfClass}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="gender">Institution</label>
                        <select class="form-control" name="institutionId" required>
                            <option value="{{$record->institution->id}}">{{$record->institution->institutionName}}</option>
                        @foreach($institutions as $school)
                                <option value="{{$school->id}}">{{$school->institutionName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="firstname">Student Type</label>
                        <select class="form-control" name="studentType" required>
                            <option value="{{$record->studentType}}">{{$record->studentType}}</option>
                            <option value="Trustee">Trustee</option>
                            <option value="Teaching Staff">Teaching Staff</option>
                            <option value="Admin Staff">Admin Staff</option>
                            <option value="Ancillary Staff">Ancillary Staff</option>
                            <option value="Full Scholarship">Full Scholarship</option>
                            <option value="Partial Scholarship">Partial Scholarship</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="phone">Date Enrolled</label>
                        <input type="date" class="form-control"   name="date_enrolled" value="{{$record->dateEnrolled}}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="firstname">Denomination</label>
                        <input type="text" class="form-control" name="denomination" value="{{$record->denomination}}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="surname">Pastor</label>
                        <input type="text" class="form-control"   name="pastor" value="{{$record->pastor}}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="firstname">Route</label>
                        <input type="text" class="form-control" name="route" value="{{$record->route}}" >
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
                                        <input type="text" class="form-control" name="parent_guardian_id" value="{{$record->parentguardian->id}}" hidden required>
                                        <div class="form-group col-md-3">
                                            <label for="surname">First Name</label>
                                            <input type="text" class="form-control" name="firstname" value="{{$record->parentguardian->firstname}}"  required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="surname">Surname</label>
                                            <input type="text" class="form-control" name="surname" value="{{$record->parentguardian->surname}}"  required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="surname">National ID</label>
                                            <input type="text" class="form-control" name="national_id"  id="create_phone" value="{{$record->parentguardian->nationalId}}"  required>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="Phone">Phone</label>
                                            <input type="number" class="form-control" name="phone" id="create_address" value="{{$record->parentguardian->nationalId}}"  required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="Gender">Relationship</label>
                                            <input type="text" class="form-control datepicker"  name="relationship"  value="{{$record->parentguardian->relationship}}"  required id="create_dob">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Gender">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$record->parentguardian->email}}" id="create_address"  required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Gender">Occupation</label>
                                            <input type="text" class="form-control datepicker" name="occupation" value="{{$record->parentguardian->occupation}}" required id="create_dob">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="Gender">Employer</label>
                                            <input type="text" class="form-control datepicker" name="employer" value="{{$record->parentguardian->employer}}" required id="create_dob">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Gender">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{$record->parentguardian->residentialAddress}}"  required>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">{{__('Submit')}}</button>
                                    </div>
                                </div>
                    </div>
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

