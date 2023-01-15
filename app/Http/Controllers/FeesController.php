<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\Services\THttpClientWrapper;
use Illuminate\Support\Facades\Auth;


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
        $institution_url=config('app.institution_url');

        $id = Auth::user()->institution_id;
         $response = $this->tHttpClientWrapper->getRequest($institution_url.'/fees-structures/by-school-id/'. $id);

            $records= @json_decode(json_encode($response,true));
            return view('fees.view-fees')->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $base_url=config('app.base_url');
        $id = Auth::user()->institution_id;
        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . '/classes/by-institution-id/' . $id);
        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $classes= @json_decode(json_encode($classesResponse['dataList'],true));
            return view('fees.create')
                ->with('classes', $classes);

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
        $id = Auth::user()->id;
        $data = [

            'classId' => $request->classId,
            'institutionId' => $id,
            'termId' => $request->termId,
            'narration' => $request->narration,
            'status' => $request->status,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'createdBy' => $id
            ];


         $response = $this->tHttpClientWrapper->postRequest($institution_url.'fees-structures/save',$data);

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
