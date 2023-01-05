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
        $response = $this->tHttpClientWrapper->getRequest($base_url.'institutions/all');


        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $paymentMethods= @json_decode(json_encode($paymentMethodsResponse['dataList'],true));
            $students= @json_decode(json_encode($studentsResponse['dataList'],true));
            $records= @json_decode(json_encode($response['dataList'],true));


            return view('receipts.create')->with('paymentMethods',$paymentMethods)
                ->with('students', $students)
                ->with('institutions', $records);

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
            'amount' => $request->amount,
            'description' => $request->description,
            'institutionId' => $request->institutionId,
            'methodOfPayment' => $request->methodOfPayment,
            'receiptNumber' => $request->receiptNumber,
            'studentId' => $request->studentId,
            ];

        $response = $this->tHttpClientWrapper->postRequest($institution_url.'receipts/create',$data);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            return redirect()->back();
        }


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

    //school Balance Page
    public function getSchoolBalancePage()
    {

        $base_url=config('app.base_url');
        $response = $this->tHttpClientWrapper->getRequest($base_url.'institutions/all');


        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));

            return view('receipts.school-balancePage')->with('institutions', $records);

        }

    }

    //School Balance Report
    public function getSchoolBalance(Request $request)
    {

        $institution_url=config('app.institution_url');
        $response = $this->tHttpClientWrapper->getRequest($institution_url.'receipts/school-balance/'. $request->institutionId);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response,true));

            return view('receipts.school-balance')->with('records', $records);

        }

    }

    //student Balance Page
    public function getStudentBalancePage()
    {

        $base_url=config('app.base_url');
        $response = $this->tHttpClientWrapper->getRequest($base_url.'student/all');


        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));

            return view('receipts.student-balancePage')->with('students', $records);

        }

    }

    //Student Balance Report
    public function getStudentBalance(Request $request)
    {

        $institution_url=config('app.institution_url');
        $response = $this->tHttpClientWrapper->getRequest($institution_url.'receipts/student-balance/'. $request->studentId);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response,true));

            return view('receipts.school-balance')->with('records', $records);

        }

    }

}
