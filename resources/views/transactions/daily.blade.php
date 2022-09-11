@extends('layouts.base')

@section('content')



                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Merchant Transactions</h1>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{session('REPORT_TYPE')}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date Time</th>
                                    <th>Transaction Type</th>
                                    <th>Card #</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>TID</th>
                                    <th>Description</th>
                                    <th>Bank</th>
                                    <th>Reference</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)
                                <tr>
                                  <td>{{$record->transaction_date}}</td>
                                    <td>{{$record->transaction_type}}</td>
                                    <td>{{$record->card_number}}</td>
                                    <td>{{$record->amount}}</td>
                                    <td>{{$record->status}}</td>
                                    <td>{{$record->terminal_id}}</td>
                                    <td>{{$record->response_message}}</td>
                                    <td>{{$record->issuer_bank}}</td>
                                    <td>{{$record->rrn}}</td>

                                </tr>
                               @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>





@endsection
