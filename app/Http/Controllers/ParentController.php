<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ParentController extends Controller
{
    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }

    public function index($id)
    {

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/staff/by-institution-id/'.$id);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('students.index')->with('records', $records);

        }
    }
    public function store(Request $request)
    {

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

        $base_url=config('app.base_url');
        $response = $this->tHttpClientWrapper->postRequest($base_url.'/staff',$data);
        if ($response['statusCode'] == 200)
        {

            return redirect()->route('students')->with('success','Staff Member Added Successfully!!');

        }
        else
        {
            return redirect()->route('students')->with('error','An error occurred while processing your request');
        }



    }
}
