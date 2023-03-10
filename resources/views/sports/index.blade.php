@extends('layouts.base')

@section('content')



    <!-- Page Heading -->
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
                            <li class="breadcrumb-item active">{{__('Sports House')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endsection

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sports Houses</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table  id ="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>Id</th>
                        <th>House Name</th>
                        <th>House Colours</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->houseName}}</td>
                            <td>{{$record->colours}}</td>
                            <td>

                                   <a href="/edit/sport-house/{{$record->id}}" class="btn btn-primary btn-sm">
                                      <i class="fa fa-edit"></i>
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
