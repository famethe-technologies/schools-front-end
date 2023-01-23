<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\Services\THttpClientWrapper;
use Illuminate\Support\Facades\Auth;

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

        //return $paymentMethodsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'paymentMethod/all');
        $id = Auth::user()->institution_id;
        $studentsResponse = $this->tHttpClientWrapper->getRequest($base_url . '/student/by-institution-id/'. $id);


        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
           // $paymentMethods= @json_decode(json_encode($paymentMethodsResponse['dataList'],true));
            $students= @json_decode(json_encode($studentsResponse['dataList'],true));


            return view('receipts.create')
                ->with('students', $students);

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
        $id = Auth::user()->institution_id;
        $institution_url=config('app.institution_url');
         $data = [
            'amount' => $request->amount,
            'currency' => $request->currency,
            'receiptDate' => $request->receiptDate . 'T00:00:58.573Z',
            'description' => $request->description,
            'institutionId' => $id,
            'methodOfPayment' => $request->methodOfPayment,
            'receiptNumber' => $request->receiptNumber,
            'studentId' => $request->studentId,
            'createdBy' => Auth::user()->email

            ];

        $response = $this->tHttpClientWrapper->postRequest($institution_url.'receipts/create',$data);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            return redirect()->back()->with('success','Receipt created Successfully!!');
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

    //receipt page
    public function getReceiptPage()
    {
        $base_url=config('app.base_url');

        $id = Auth::user()->institution_id;
        $response = $this->tHttpClientWrapper->getRequest($base_url . '/student/by-institution-id/'. $id);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));

            return view('receipts.print-statement')->with('students', $records);

        }

    }

    //print receipt
    public function printReceipt(Request $request)
    {
        $user = Auth::user()->first_name;

        $receipt_url=config('app.receipt_url');
        //$response = $this->tHttpClientWrapper->getRequest($receipt_url.'receipts/print-statement/'. $id . '/' .$user);

        $url = $receipt_url.'receipts/print-statement/'. $request->studentId . '/' .$user;
        $CurlConnect = curl_init();
        curl_setopt($CurlConnect, CURLOPT_URL, $url);
        curl_setopt($CurlConnect, CURLOPT_CUSTOMREQUEST,   'GET');
        curl_setopt($CurlConnect, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($CurlConnect, CURLOPT_HTTPHEADER, array(
            ""));
        $Result = curl_exec($CurlConnect);

        header('Cache-Control: public');
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="new.pdf"');
        header('Content-Length: '.strlen($Result));
        //echo $Result;
        echo "<script>window.open('".$Result."', '_blank')</script>";

    }

    //cpc page
    public function getCPCPage()
    {
            return view('receipts.print-cpc');
    }

    //print cpc
    public function printCPC(Request $request)
    {
        $user = Auth::user()->first_name;
        $institutionId = Auth::user()->institution_id;;

        $receipt_url=config('app.receipt_url');
        //$response = $this->tHttpClientWrapper->getRequest($receipt_url.'receipts/print-statement/'. $id . '/' .$user);

        $url = $receipt_url.'receipts/print-cpc/'. $request->startDate . '/' .$request->endDate.'/' . $institutionId .'/' .$user;
        $CurlConnect = curl_init();
        curl_setopt($CurlConnect, CURLOPT_URL, $url);
        curl_setopt($CurlConnect, CURLOPT_CUSTOMREQUEST,   'GET');
        curl_setopt($CurlConnect, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($CurlConnect, CURLOPT_HTTPHEADER, array(
            ""));
        $Result = curl_exec($CurlConnect);

        header('Cache-Control: public');
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="new.pdf"');
        header('Content-Length: '.strlen($Result));
        //echo $Result;
        echo "<script>window.open('".$Result."', '_blank')</script>";

    }



}
