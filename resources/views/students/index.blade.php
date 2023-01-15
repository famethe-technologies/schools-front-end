@extends('layouts.base')

@section('content')



    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Staff Members</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Schools</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table  id ="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Gender</th>
                        <th>National ID</th>
                        <th>Passport No</th>
                        <th>Race</th>
                        <th>DOB</th>
                        <th>Institution</th>
                        <th>Class</th>
                        <th>SportHouse</th>
                        <th>Date Enrolled</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->studentFirstName}}</td>
                            <td>{{$record->studentSurname}}</td>
                            <td>{{$record->gender}}</td>
                            <td>{{$record->nationalId}}</td>
                            <td>{{$record->passportNo}}</td>
                            <td>{{$record->race}}</td>
                            <td>{{$record->dob}}</td>
                            <td>{{$record->classes->staff->institution->institutionName}}</td>
                            <td>{{$record->classes->nameOfClass}}</td>
                            <td>{{$record->sporthouse->houseName ?? null}}</td>
                            <td>{{$record->dateEnrolled}}</td>
                            <td>

                                   <a href="" class="btn btn-primary btn-sm">
                                      <i class="fa fa-edit"></i>
                                   </a>

                                <a href="/view-balance/{{ $record->id }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-money-bill"></i>
                                </a>

                                     <form method="POST" action="" class="d-inline">
                                         <input type="hidden" name="_method" value="delete">
                                         <button type="submit" class="btn btn-danger btn-sm delete_branch">
                                             <i class="fa fa-trash"></i>
                                                  </button>
                                                  </form>
                              </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
