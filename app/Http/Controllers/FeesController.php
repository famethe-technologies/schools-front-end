<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\Services\THttpClientWrapper;


class FeesController extends Controller
{

    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $institution_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($institution_url.'/fees-structures/find-all');

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));
            return view('fees.view-fees')->with('records',$records);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $base_url=config('app.base_url');
        $institution_url=config('app.institution_url');

        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . '/classes/all');
         $response = $this->tHttpClientWrapper->getRequest($institution_url.'/institution/find-all-institutions');

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
             $records= @json_decode(json_encode($response,true));
            $classes= @json_decode(json_encode($classesResponse['dataList'],true));
            return view('fees.create')->with('records',$records)->with('classes', $classes);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $institution_url=config('app.institution_url');
        $data = [

            'classId' => $request->classId,
            'createdDate' => $request->createdDate . " " ."00:00:00",
            'institutionId' => $request->institutionId,
            'narration' => $request->narration,
            'status' => $request->status,
            'updatedDate' => $request->updatedDate . " " ."00:00:00"

            ];

        return $response = $this->tHttpClientWrapper->postRequest($institution_url.'fees-structures/save',$data);

        return redirect()->route('fees.index')->with('success','Fees Added Successfully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
