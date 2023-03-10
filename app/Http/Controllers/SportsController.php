<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SportsController extends Controller
{

    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }
    public function create()
    {
        return view('sports.create');
    }

    public function index()
    {

        $base_url=config('app.base_url');
        $id= Session::get('school_id');
        $response = $this->tHttpClientWrapper->getRequest($base_url . '/sporthouse/by-institution-id/'.$id);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('sports.index')->with('records', $records);

        }
    }
    public function store(Request $request)
    {
        $base_url=config('app.base_url');
        $data = [
            'houseName'=>$request->sport_house,
            'colours'=>$request->colours,
            'institutionId'=>Session::get('school_id'),
            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];
        $response = $this->tHttpClientWrapper->postRequest($base_url.'/sporthouse',$data);
        if ($response['statusCode'] == 200)
        {

            return redirect()->route('houses')->with('success','Sport House Added Successfully!!');

        }
        else
        {
            return redirect()->route('houses')->with('error','An error occurred while processing your request');
        }



    }

    public function edit($id)
    {

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/sporthouse/by-id/'.$id);


        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $record = @json_decode(json_encode($response['data'], true));

            return view('sports.edit')->with('record', $record);

        }
    }


    public function update(Request $request,$id)
    {

        $data = [
            'id'=>$id,
            'houseName'=>$request->sport_house,
            'colours'=>$request->colours,
            'institutionId'=>Session::get('school_id'),
            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->patchRequest($base_url . '/sporthouse/update/'.$id,$data);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            //$record = @json_decode(json_encode($response['data'], true));

            return redirect('/view/sport-houses')->with('success','Sports House Record Updated Successfully!!');

        }
    }
}
