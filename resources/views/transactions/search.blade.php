@extends('layouts.base')

@section('content')





    <div class="page-content">
        <div class="container">
            <br><br>
            <div class ="card" >

                <h4>&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;Transaction Search</h4>
                <hr>
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-lg-left">
                            <h6 >Enter Start and End Date to search</h6>
                            <hr>
                        </div>


                        <form method="POST" action="/search/transactions">
                            @csrf
                            <div class="form-group row justify-content-center ">


                                <div class="col-sm-6">
                                    <label for="startDate">Start Date</label>
                                    <input id="mobile" type="date" class="form-control datepicker"  name="start_date" value="" required autofocus>
                                </div>

                                <div class="col-sm-6">
                                    <label for="endDate">End Date</label>
                                    <input id="mobile" type="date" class="form-control datepicker"  name="end_date" value="" required autofocus>
                                </div>

                                <div class="col-sm-2" style="margin-top: 30px">
                                    <button type="submit" class="btn btn-primary" onclick=""> Submit</button>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>

                    <br>
                    <div class="box-body">
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
        </div>



@endsection
