<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InstitutionController extends Controller
{
    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }
    public function index()
    {

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url.'/institutions/all');

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));
            return view('schools.index')->with('records',$records);

        }
    }
    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $base_url=config('app.base_url');
        $data = [

            'institutionName' => $request->school,
            'institutionAddress' => $request->address,
            'institutionCode' => $request->code,
            'phone' => $request->phone,
            'email' => $request->email,
            'institutionType' => $request->type,
            'createdBy' => Auth::user()->first_name,
            'lastModifiedBy' =>'',

        ];


        $response = $this->tHttpClientWrapper->postRequest($base_url.'/institutions',$data);

        return redirect()->route('schools')->with('success','School Added Successfully!!');


    }
    public function getSchoolById($id)
    {
        $base_url=config('app.base_url');
        $response = $this->tHttpClientWrapper->getRequest($base_url.'/institutions/by-id/'.$id);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {

            $records= @json_decode(json_encode($response['data'],true));
            Session::put('school', $records->institutionName);
            Session::put('school_id', $id);
            return view('schools.dashboard')->with('records',$records);

        }
    }


    public function edit($id)
    {

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/institutions/by-id/'.$id);


        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $record = @json_decode(json_encode($response['data'], true));

            return view('schools.edit')->with('record', $record);

        }
    }


    public function update(Request $request,$id)
    {

        $data = [
            'id' => $id,
            'institutionName' => $request->school,
            'institutionAddress' => $request->address,
            'institutionCode' => $request->code,
            'phone' => $request->phone,
            'email' => $request->email,
            'institutionType' => $request->type,
            'createdBy' => Auth::user()->first_name,
            'lastModifiedBy' =>Auth::user()->first_name

        ];

        $base_url=config('app.base_url');

         $response = $this->tHttpClientWrapper->patchRequest($base_url . '/institutions/update/'.$id,$data);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            //$record = @json_decode(json_encode($response['data'], true));

            return redirect('/schools')->with('success','School Record Updated Successfully!!');

        }
    }

}
