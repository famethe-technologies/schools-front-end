
<!DOCTYPE html>
<html>
<head>
    <title>Requisition</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:200px;
        height:60px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }

    body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    .title {
        font-size: 10px;
        text-align: center;
        margin-top: 20px;
    }
    .signature-line {
        border-top: 1px solid #000;
        margin-top: 20px;
        text-align: center;
    }
    .signatory {
        width: 48%;
        display: inline-block;
        vertical-align: top;
    }
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    /*.signed {*/
    /*    font-weight: bold;*/
    /*}*/
    .signed-text {
        text-align: center;
        margin-bottom: 5px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0"> <img src="{{ public_path("$image") }}" alt="" style="width: 150px; height: 150px;"></h1>
    <br>
    <h1 class="text-center m-0 p-0" style="font-size: 14px">Requisition</h1>
    <div class="w-50 float-right logo mt-10">

    </div>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5  w-100" style="font-size: 10px">{{'Requested By : ' . $user->first_name . ' ' . $user->last_name }}  <span class="gray-color"></span></p>
        <p class="m-0 pt-5  w-100" style="font-size: 10px">{{'School Name : ' . $school->institution_name}}  <span class="gray-color"></span></p>
        <p class="m-0 pt-5  w-100" style="font-size: 10px">{{'Type : ' . $data->type}}  <span class="gray-color"></span></p>
        <p class="m-0 pt-5  w-100" style="font-size: 10px">{{'Requisition Date : ' . $data->created_at}}  <span class="gray-color"></span></p>
        <p class="m-0 pt-5  w-100" style="font-size: 10px">{{'Supplier:' . $supplier->name  }}  <span class="gray-color"></span></p>
        <p class="m-0 pt-5  w-100" style="font-size: 10px">{{'Supplier Account Details:' . $supplier->account_number  }}  <span class="gray-color"></span></p>
        <p class="m-0 pt-5  w-100" style="font-size: 10px">{{'Supplier Bank Details:' . $supplier->bank_name  }}  <span class="gray-color"></span></p>
        <br><br>

    </div>


    <div style="clear: both;"></div>
</div>

@if($data->type=='PETTY_CASH')
    <table class="table w-100 mt-10">
        <tr>
            <th>Requisition No.</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Currency</th>
            <th>Payment Method</th>
        </tr>
        </thead>
            <tr>
                <td>{{$data->id }}</td>
                <td>{{$data->description }}</td>
                <td>{{number_format($data->recommended_amount,2) }}</td>
                <td>{{$data->currency}}</td>
                <td>{{$data->payment_method}}</td>
            </tr>
    </table>
@else
    <table class="table w-100 mt-10">
        <tr>
            <th>Requisition No.</th>
            <th>Description</th>
            <th>Supplier</th>
            <th>Supplier Amount</th>
            <th>Currency</th>
            <th>Payment Method</th>
        </tr>
        </thead>
        <tr>
            <td>{{$data->id }}</td>
            <td>{{$data->description }}</td>
            <td>{{$data->s_one }}</td>
            <td>{{$data->amount_one }}</td>
            <td>{{$data->currency}}</td>
            <td>{{$data->payment_method}}</td>
        </tr>
        <tr>
            <td>{{$data->id }}</td>
            <td>{{$data->description }}</td>
            <td>{{$data->s_two }}</td>
            <td>{{$data->amount_two }}</td>
            <td>{{$data->currency}}</td>
        </tr>
        <tr>
            <td>{{$data->id }}</td>
            <td>{{$data->description }}</td>
            <td>{{$data->s_three }}</td>
            <td>{{$data->amount_three }}</td>
            <td>{{$data->currency}}</td>
        </tr>
    </table>

@endif

<br>
<br>

<div class="container">
    <div class="signatory">
        <div class="signed-text">Signed</div>
        <div class="signature-line"></div>
        <div class="title">{{ "Requested By: " . $user->first_name . ' ' . $user->last_name }}</div>
    </div>
    <div class="signatory">
        <div class="signed-text">Signed</div>
        <div class="signature-line"></div>
        <div class="title">Finance : Mr Matema</div>
    </div>
    <div class="clearfix"></div>
    <p>&nbsp;</p>
    <div class="signatory">
        <div class="signed-text">Signed</div>
        <div class="signature-line"></div>
        <div class="title">Group COO : BloodShow Muregi</div>
    </div>
    <div class="signatory">
        <div class="signed-text">.</div>
        <div class="signature-line"></div>
        <div class="title">Managing Director Signature & Date: Peace Pundu</div>
    </div>
</div>

<br>
<br>

<hr>
<p align="right" >Amount: {{ $data->recommended_amount }}</p>
<hr>
<div>

    <style>
        .table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #000;
            padding: 10px;
        }

        .md-comments {
            height: 60px;
            border: none;
            outline: none;
            width: 100%;
        }
    </style>

    <table class="table">
        <tr>
            <th>Managing Director Comments:</th>
        </tr>
        <tr>
            <td class="md-comments" contenteditable="true">

            </td>
        </tr>
    </table>
</div>
</div>
</html>
