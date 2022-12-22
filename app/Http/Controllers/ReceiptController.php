<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\Services\THttpClientWrapper;

class ReceiptController extends Controller
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

        $paymentMethodsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'paymentMethod/all');
        $studentsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'student/all');
        $termsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'Term/all');
        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . 'classes/all');
         $feesResponse = $this->tHttpClientWrapper->getRequest($institution_url.'fees-structures/find-all');

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $paymentMethods= @json_decode(json_encode($paymentMethodsResponse['dataList'],true));
            $students= @json_decode(json_encode($studentsResponse['dataList'],true));
            $terms= @json_decode(json_encode($termsResponse['dataList'],true));
            $fees= @json_decode(json_encode($feesResponse,true));
            $classes= @json_decode(json_encode($classesResponse['dataList'],true));
            return view('receipts.create')->with('paymentMethods',$paymentMethods)
                ->with('students', $students)
                ->with('fees', $fees)
                ->with('classes', $classes)
                ->with('terms', $terms);

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
        $base_url=config('app.base_url');
        $data = [
            'date' => $request->date."T00:00:00.000Z",
            'amount' => $request->amount,
            'description' => $request->description,
            'receiptNo' => $request->receiptNo,
            'classs' => $request->classs,
            'currentRate' => $request->currentRate,
            'feesId' => $request->feesId,
            'studentId' => $request->studentId,
            'paymentMethodId' => $request->paymentMethodId,
            'termId' => $request->termId,
            'createdBy' => $request->createdBy,
            'lastModifiedBy' => $request->lastModifiedBy,
            ];

       return $response = $this->tHttpClientWrapper->postRequest($base_url.'Receipt',$data);

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
