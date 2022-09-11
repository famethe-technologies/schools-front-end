<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }
    public function create()
    {
        $base_url=config('app.base_url');
        $id=Session::get('school_id');
        $response = $this->tHttpClientWrapper->getRequest($base_url . '/staff/by-institution-id/'.$id);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('classes.create')->with('records', $records);

        }
    }

    public function index($id)
    {

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/classes/by-institution-id/'.$id);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('classes.index')->with('records', $records);

        }
    }
    public function store(Request $request)
    {
        $base_url=config('app.base_url');
        $data = [
            'nameOfClass'=>$request->class_name,
            'code'=>$request->code,
            'staffId'=>$request->staff,
            'institutionId'=>Session::get('school_id'),
            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];
        $response = $this->tHttpClientWrapper->postRequest($base_url.'/classes',$data);
        if ($response['statusCode'] == 200)
        {

            return redirect()->route('classes')->with('success','Class Added Successfully!!');

        }
        else
        {
            return redirect()->route('classes')->with('error','An error occurred while processing your request');
        }



    }


    public function edit($id)
    {

        $base_url=config('app.base_url');
        $school_id=Session::get('school_id');
        $staff_response = $this->tHttpClientWrapper->getRequest($base_url . '/staff/by-institution-id/'.$school_id);
        $class_response = $this->tHttpClientWrapper->getRequest($base_url . '/classes/by-id/'.$id);

        if (isset($staff_response["statusCode"]) && $staff_response["statusCode"] != "200") {
            if (isset($class_response["statusCode"]) && $class_response["statusCode"] != "200") {
                return redirect()->back()->with(['error' => $staff_response['message']]);
            }
        }else {
            $staff = @json_decode(json_encode($staff_response['dataList'], true));
            $record = @json_decode(json_encode($class_response['data'], true));

            return view('classes.edit')->with('record', $record)->with('staff',$staff);


        }

    }


    public function update(Request $request,$id)
    {
        $data = [
            'id'=>$id,
            'nameOfClass'=>$request->class_name,
            'code'=>$request->code,
            'staffId'=>$request->staff,
            'institutionId'=>Session::get('school_id'),
            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];

        $base_url=config('app.base_url');

     $response = $this->tHttpClientWrapper->patchRequest($base_url . '/classes/update/'.$id,$data);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            //$record = @json_decode(json_encode($response['data'], true));

            return redirect('/view/classes/'.Session::get('school_id'))->with('success','Class Record Updated Successfully!!');

        }
    }
}
