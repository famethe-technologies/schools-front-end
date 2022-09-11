<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <style>
        @if($type==3||$type==4)
        @page {
            margin-top: {{$reports_settings['margin-top']}}px;
            margin-right: {{$reports_settings['margin-right']}}px;
            margin-left: {{$reports_settings['margin-left']}}px;
            margin-bottom: {{$reports_settings['margin-bottom']}}px;
        }
        @else
            @page {
            header: page-header;
            footer: page-footer;

            margin-left: {{$reports_settings['margin-left']}}px;
            margin-right: {{$reports_settings['margin-right']}}px;

            margin-top: {{$reports_settings['content-margin-top']}}px;
            margin-header: {{$reports_settings['margin-top']}}px;

            margin-bottom: {{$reports_settings['content-margin-bottom']}}px;
            margin-footer: {{$reports_settings['margin-bottom']}}px;
        }
        @endif

        .table-bordered {
            border: 1px solid #dee2e6;
            border-collapse: collapse;
            background-color: white!important;
        }

        .table-bordered,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table td,th{
            padding: 5px;
        }
        .title{
            background-color: #ddd;
        }
        .signature{
            font-size:13px;
            font-weight: bold!important;
        }
        .footer{
            border-top: 3px double;
        }
        .branch_name{
            color:{{$reports_settings['branch_name']['color']}}!important;
            font-size:{{$reports_settings['branch_name']['font-size']}}!important;
            font-family:{{$reports_settings['branch_name']['font-family']}}!important;
        }
        .branch_info{
            color:{{$reports_settings['branch_info']['color']}}!important;
            font-size:{{$reports_settings['branch_info']['font-size']}}!important;
            font-family:{{$reports_settings['branch_info']['font-family']}}!important;
        }
        .title{
            color:{{$reports_settings['patient_title']['color']}}!important;
            font-size:{{$reports_settings['patient_title']['font-size']}}!important;
            font-family:{{$reports_settings['patient_title']['font-family']}}!important;
        }
        .data{
            color:{{$reports_settings['patient_data']['color']}}!important;
            font-size:{{$reports_settings['patient_data']['font-size']}}!important;
            font-family:{{$reports_settings['patient_data']['font-family']}}!important;
        }
        .signature{
            color:{{$reports_settings['signature']['color']}}!important;
            font-size:{{$reports_settings['signature']['font-size']}}!important;
            font-family:{{$reports_settings['signature']['font-family']}}!important;
        }
        .footer{
            color:{{$reports_settings['report_footer']['color']}}!important;
            font-size:{{$reports_settings['report_footer']['font-size']}}!important;
            font-family:{{$reports_settings['report_footer']['font-family']}}!important;
            text-align:{{$reports_settings['report_footer']['text-align']}}!important;
        }
    </style>

</head>

<body>
@if($type!==3&&$type!==4)
    <htmlpageheader name="page-header">

      <img src="{{asset('/img/letterhead.png')}}">
        @if(isset($group['patient']))
            <table width="100%" class="table table-bordered">
                <tbody>
                <tr>
                    <td width="50%">
                        <span class="title">Patient Name :</span> <span
                            class="data">
                                    @if(isset($group['patient']))
                                {{ $group['patient']['name'] }}
                            @endif
                                </span>
                    </td>
                    <td width="50%">
                        <span class="title">Patient Code :</span> <span
                            class="data">
                                    @if(isset($group['patient']))
                                {{ $group['patient']['code'] }}
                            @endif
                                </span>

                    </td>


                </tr>
                <tr>
                    <td>
                        <span class="title">Age :</span>
                        <span class="data">
                                    @if(isset($group['patient']))
                                {{$group['patient']['age']}}
                            @endif
                                </span>

                    </td>
                    <td>
                        <span class="title">Gender :</span> <span
                            class="data">
                                    @if(isset($group['patient']))
                                {{ __($group['patient']['gender']) }}
                            @endif
                                </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="title">Doctor :</span> <span
                            class="data">
                                    @if(isset($group['doctor']))
                                {{ $group['doctor']['name'] }}
                            @endif
                                </span>
                    </td>
                    <td>
                        <span class="title">Date :</span>
                        <span class="data">
                                    {{ date('d-m-Y H:i',strtotime($group['created_at'])) }}
                                </span>
                    </td>
                </tr>

                </tbody>
            </table>
        @endif

    </htmlpageheader>
@endif
<br><br>
@yield('content')


<htmlpagefooter name="page-footer" class="page-footer">
    @if($type==1)
        @if($reports_settings['show_signature'])
            <table>
                <tbody>
                <tr>
                    <td width="70%">
                    </td>
                    <td align="center">
                        <p class="signature">
                            {{__('Signature')}}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="70%">
                    </td>
                    <td align="center">

                    </td>
                </tr>
                </tbody>
            </table>
        @endif
    @endif
    @if($reports_settings['show_footer'])
        @if($type==1||$type==2)
            <p class="footer">
                {!! str_replace(["\r\n", "\n\r", "\r", "\n"], "<br>", $reports_settings['footer'])!!}
            </p>
        @endif
    @endif
</htmlpagefooter>
</body>

</html>
