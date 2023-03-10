<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }
    public function create()
    {
        return view('staff.create');
    }

    public function index($id)
    {

        $base_url=config('app.base_url');;

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/staff/by-institution-id/'.$id);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('staff.index')->with('records', $records);

        }
    }
    public function store(Request $request)
    {
        $base_url=config('app.base_url');
        $data = [
              'firstname'=>$request->firstname,
              'surname'=>$request->surname,
              'gender'=>$request->gender,
              'position'=>$request->position,
              'nationalId'=>$request->national_id,
              'institutionId'=>Session::get('school_id'),
              'createdBy'=>Auth::user()->first_name,
             'lastModifiedBy'=> Auth::user()->first_name,

        ];


        $response = $this->tHttpClientWrapper->postRequest($base_url.'/staff',$data);
        if ($response['statusCode'] == 200)
        {

            return redirect()->route('staff')->with('success','Staff Member Added Successfully!!');

        }
        else
        {
            return redirect()->route('staff')->with('error','An error occurred while processing your request');
        }

    }

    public function edit($id)
    {

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/staff/by-id/'.$id);


        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
          $record = @json_decode(json_encode($response['data'], true));

            return view('staff.edit')->with('record', $record);

        }
    }


    public function update(Request $request,$id)
    {

        $data = [
            'id'=>$id,
            'firstname'=>$request->firstname,
            'surname'=>$request->surname,
            'gender'=>$request->gender,
            'position'=>$request->position,
            'nationalId'=>$request->national_id,
            'institutionId'=>Session::get('school_id'),
            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->patchRequest($base_url . '/staff/update/'.$id,$data);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            //$record = @json_decode(json_encode($response['data'], true));

            return redirect('/view/staff/'.Session::get('school_id'))->with('success','Staff Member Record Updated Successfully!!');

        }
    }
}
