
<!DOCTYPE html>
<html>
<head>
    <title>Class Billing Report</title>
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
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0"> <img src="{{ public_path("$image") }}" alt="" style="width: 150px; height: 150px;"></h1>
    <br>
    <h1 class="text-center m-0 p-0">Class Billing Report</h1>
    <div class="w-50 float-right logo mt-10">

    </div>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5  w-100">{{'Class Name : ' . $class_name }}  <span class="gray-color"></span></p>
        <p class="m-0 pt-5  w-100">{{'School Name : ' . $schools }}  <span class="gray-color"></span></p>


        <br><br>
    </div>


    <div style="clear: both;"></div>
</div>

    <table class="table w-100 mt-10">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Fee</th>
        </tr>
        </thead>
        @foreach($reports as $record)
            <tr>
                <td>{{$record->student_first_name . ' ' . $record->student_surname}}</td>
                <td>{{$record->student_type}}</td>
                <td>{{$record->description}}</td>
                <td>{{$record->amount}}</td>
            </tr>
            @endforeach
            </tr>
    </table>
<br>
<br>
<hr>
<p align="right" >Balance: {{$total}}</p>
<hr>
</div>
</html>
