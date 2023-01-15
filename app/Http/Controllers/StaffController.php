<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use App\Models\Staff;
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
        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . 'institutions/all');

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('staff.create')->with('records', $records);
        }
    }

    public function index()
    {
        $base_url=config('app.base_url');;

        $id = Auth::user()->institution_id;
        $response = $this->tHttpClientWrapper->getRequest($base_url . '/staff/by-institution-id/'. $id);

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
        $id = Auth::user()->institution_id;
        $data = [
              'firstname'=>$request->firstname,
              'surname'=>$request->surname,
              'gender'=>$request->gender,
              'position'=>$request->position,
              'nationalId'=>$request->national_id,
              'institutionId'=>$id,
              'createdBy'=>Auth::user()->first_name,
             'lastModifiedBy'=> Auth::user()->first_name,

        ];


        $response = $this->tHttpClientWrapper->postRequest($base_url.'/staff',$data);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            return redirect()->route("staff.index")->with('success','Staff created Successfully!!');
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

        $id = Auth::user()->institution_id;
        $data = [
            'id'=>$id,
            'firstname'=>$request->firstname,
            'surname'=>$request->surname,
            'gender'=>$request->gender,
            'position'=>$request->position,
            'nationalId'=>$request->national_id,
            'institutionId'=>$id,
            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->patchRequest($base_url . '/staff/update/'.$id,$data);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            //$record = @json_decode(json_encode($response['data'], true));
            return redirect()->route("staff.index")->with('success','Staff created updated!!');
            //return redirect('/view/staff/'.Session::get('school_id'))->with('success','Staff Member Record Updated Successfully!!');

        }
    }

    public function viewStaff()
    {
        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/staff/all');

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('staff.edit')->with('records', $records);

        }
    }

    public function checkIfStaffExists(Request  $request) {
        $id = $request->nationalId;
        return $result =  Staff::where('national_id',$id)->first();
}
}
