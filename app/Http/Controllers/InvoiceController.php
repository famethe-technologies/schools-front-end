<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\Services\THttpClientWrapper;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
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

        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . 'classes/all');
        $termsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'Term/all');
        $feesResponse = $this->tHttpClientWrapper->getRequest($institution_url.'fees-structures/find-all');
        $studentsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'student/all');
        $response = $this->tHttpClientWrapper->getRequest($base_url.'institutions/all');


        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));
            $classes= @json_decode(json_encode($classesResponse['dataList'],true));
            $terms= @json_decode(json_encode($termsResponse['dataList'],true));
            $fees= @json_decode(json_encode($feesResponse,true));
            $students= @json_decode(json_encode($studentsResponse['dataList'],true));

            return view('invoice.create')->with('institutions',$records)
                ->with('classes', $classes)
                ->with('fees', $fees)
                ->with('students', $students)
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
        $institution_url=config('app.institution_url');
        $data = [
            'amount' => $request->amount,
            'classs' => $request->classs,
            'createdDate' => $request->createdDate."T00:00:00.000Z",
            'description' => $request->description,
            'feesId' => $request->feesId,
            'institutionId' => $request->institutionId,
            'invoiceDate' => $request->invoiceDate."T00:00:00.000Z",
            'invoiceNumber' => $request->invoiceNumber,
            'studentId' => $request->studentId,
            'termId' => $request->termId,
            'updatedDate' => $request->updatedDate."T00:00:00.000Z",
        ];

        $response = $this->tHttpClientWrapper->postRequest($institution_url.'invoices/',$data);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            return redirect()->back()->with('success','Invoice created Successfully!!');
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

    //class invoice Page
    public function getClassInvoicePage()
    {

        $base_url=config('app.base_url');
        $id = Auth::user()->institution_id;
         $response = $this->tHttpClientWrapper->getRequest($base_url . '/classes/by-institution-id/' . $id);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));

            return view('invoice.class-invoicePage')->with('classes', $records);

        }

    }

    //Class Invoice Report
    public function getClassInvoice(Request $request)
    {

        $institution_url=config('app.institution_url');
         $response = $this->tHttpClientWrapper->getRequest($institution_url.'invoices/find-by-class-id/'. $request->classId);

        if(isset($response["code"] ) && $response["code"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['invoiceList'],true));

            return view('invoice.class-invoice')->with('records', $records);

        }

    }

    //Class invoice Page
    public function getSchoolInvoicePage()
    {
        $base_url=config('app.base_url');

        $id = Auth::id();
        $response = $this->tHttpClientWrapper->getRequest($base_url . '/institutions/by-id/'.$id);
       // $response = $this->tHttpClientWrapper->getRequest($base_url.'institutions/all');

        if(isset($response["code"] ) && $response["code"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
           $records= @json_decode(json_encode($response['dataList'],true));
            return view('invoice.school-invoicePage')->with([
                'id' =>  $response['data']['id'],
                'institutionName' =>  $response['data']['institutionName']
            ]);

        }

    }

    //Class Invoice Report
    public function getSchoolInvoice(Request $request)
    {

        $institution_url=config('app.institution_url');
        $response = $this->tHttpClientWrapper->getRequest($institution_url.'invoices/find-by-school-id/'. $request->institutionId);

        if(isset($response["code"] ) && $response["code"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= json_decode(json_encode($response['invoiceList'],true));

            return view('invoice.school-invoice')->with('records', $records);

        }

    }

    //Term invoice Page
    public function getTermInvoicePage()
    {
        $base_url=config('app.base_url');
        $institution_url=config('app.institution_url');
        $id = Auth::user()->institution_id;


        $response = $this->tHttpClientWrapper->getRequest($base_url.'/institutions/by-id/'.$id);
        $fees = $this->tHttpClientWrapper->getRequest($institution_url.'fees-structures/by-school-id/'. $id);
        $class = $this->tHttpClientWrapper->getRequest($base_url . '/classes/by-institution-id/' . $id);

        if(isset($response["code"] ) && $response["code"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            return view('invoice.term-invoicePage')
                ->with([
                    'id' => $response['data']['id'],
                    'institutionName' => $response['data']['institutionName'],

                ])->with('fees',$fees)
                ->with('classes', $class['dataList']);

        }

    }

    //Class Invoice Report
    public function getTermInvoice(Request $request)
    {
        //return $request->all();
        $institution_url=config('app.institution_url');
        $id = Auth::user()->institution_id;
        $response = $this->tHttpClientWrapper->getRequest($institution_url.'invoices/generate-for-class/'.$request->class_id . '/' . $request->termId .'/' . Auth::user()->id. '/' . $id . '/' . $request->fees_id);
        if(isset($response["status"] ) && $response["status"] != "200"){
            session()->flash('error',$response['message']);
            //return view('auth.login');
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= json_decode(json_encode($response,true));
            session()->flash('success',$response['message']);
            //return view('auth.login');
            return view('invoice.term-invoice')->with('records', $records);

        }

    }

    public function generateClassInvoice(Request $request)
    {
        $id = Auth::user()->institution_id;
        $institution_url=config('app.institution_url');
        $response = $this->tHttpClientWrapper->getRequest($institution_url.'invoices/generate-for-class/'. session('class_id'). '/' . $request->termId .'/' . Auth::user()->id. '/' . $id);
        if(isset($response["status"] ) && $response["status"] != "200"){
            session()->flash('error',$response['message']);
            //return view('auth.login');
            return redirect()->back()->with(['failed' => $response['message']]);
        }
        else
        {
            $records= json_decode(json_encode($response,true));
            session()->flash('success',$response['message']);
            //return view('auth.login');
            return view('invoice.term-invoice')->with('records', $records);

        }

    }
}
