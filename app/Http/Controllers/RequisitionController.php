<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\FileUpload;
use App\Models\LeaveBalances;
use App\Models\Requisition;
use App\Models\School;
use App\Models\Student;
use App\Models\Suppliers;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user();

        if($userId->role =='COO'){
            $records = Requisition::where('status', 'PENDING_COO_APPROVAL')
                ->get();
            return view('requisitions.index')->with('records',$records);
        }


        if($userId->role =='FINANCE'){
            $records = Requisition::where('status', 'PENDING_FINANCE_APPROVAL')
                ->get();
            return view('requisitions.index')->with('records',$records);
        }

        if($userId->role =='HEADMASTER'){
            $records = Requisition::where('status', 'PENDING_HEADMASTER_APPROVAL')
                ->get();
            return view('requisitions.index')->with('records',$records);
        }

        $records = Requisition::where('employee_id',$userId->staff_id)->get();
        return view('requisitions.index')->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requisitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $suppliers = Suppliers::all();
        if($request->type === 'PETTY_CASH'){
            return view('requisitions.recurring-petty')->with([
                'description' => $request->description,
                'type' => $request->type,
            ])->with('supplier', $suppliers);
        }

        if($request->type === 'RECURRING'){
            return view('requisitions.recurring-petty')->with([
                'description' => $request->description,
                'type' => $request->type,
            ])->with('supplier', $suppliers);
        }

        if($request->type === 'CAPEX'){
            return view('requisitions.capex')->with([
                'description' => $request->description,
                'type' => $request->type,
            ])->with('supplier', $suppliers);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createRequisition(Request $request)
    {
        // return $request->all();
       //return  $userId = Auth::user();
        try {
            $userId = Auth::user();
            if($request->type == 'PETTY_CASH') {
                $records = new Requisition();
                $records->type = $request->type;
                $records->description = $request->description;
                $records->status = 'PENDING_HEADMASTER_APPROVAL';
                $records->currency = $request->currency;
                $records->company_id = $userId->institution_id;
                $records->employee_id = $userId->staff_id;
                $records->recommended_amount = $request->amount;
                $records->recommended_supplier =$request->suppliers;
                $records->payment_method = $request->payment_method;
                $records->save();

               // toast('Requisition successfully created', 'success');
                return  redirect('/requisitions');
            }

            if($request->type == 'RECURRING') {
                $records = new Requisition();
                $records->type = $request->type;
                $records->description = $request->description;
                $records->status = 'PENDING_HEADMASTER_APPROVAL';
                $records->currency = $request->currency;
                $records->company_id = $userId->institution_id;
                $records->employee_id = $userId->staff_id;
                $records->recommended_amount = $request->amount;
                $records->recommended_supplier =$request->suppliers;
                $records->payment_method = $request->payment_method;
                $records->save();
               // toast('Requisition successfully created', 'success');
                return  redirect('/requisitions');
            }
            //return $request->all();
            $file_one = $request->file('file_one')->getClientOriginalName();
            $file_two = $request->file('file_two')->getClientOriginalName();
            $file_three = $request->file('file_three')->getClientOriginalName();

            $one = Uuid::uuid4() . $file_one;
            $two = Uuid::uuid4(). $file_two;
            $three =  Uuid::uuid4(). $file_three;

            $request->file_one->move(public_path('files'), $one);
            $request->file_two->move(public_path('files'), $two);
            $request->file_three->move(public_path('files'), $three);

            $records = new Requisition();
            $records->type = $request->type;
            $records->description = $request->description;
            $records->status = 'PENDING_HEADMASTER_APPROVAL';
            $records->currency = $request->currency;
            $records->company_id = $userId->institution_id;
            $records->employee_id = $userId->staff_id;
            $records->s_one = $request->supplier_one;
            $records->s_two = $request->supplier_two;
            $records->s_three = $request->supplier_two;
            $records->file_one = $one;
            $records->file_two = $two;
            $records->file_three = $three;
            $records->payment_method = $request->payment_method;
            $records->amount_one = $request->amount_one;
            $records->amount_two = $request->amount_two;
            $records->amount_three = $request->amount_three;
            $records->recommended_amount = $request->amount;
            $records->recommended_supplier = $request->recommended_supplier;
            $records->save();
           // toast('Requisition successfully created', 'success');
            return  redirect('/requisitions');
        }catch (\Exception $e){
            return $e;

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
    public function destroy($id,$status)
    {
      // return $id;


        $records = Requisition::find($id);
        if($records->status=='APPROVED'){
           // toast('Leave already updated', 'error');
            return redirect()->back();
        }

        if($records->status=='CANCELLED'){
           // toast('Leave already updated', 'error');
            return redirect()->back();
        }

        $records->status=$status;
        $records->save();
        //toast('Requisition successfully cancelled', 'success');
        return redirect()->route('requisitions.index');
    }

    public function viewAttachements($id,$qt){
        $records = Requisition::find($id);
        if($qt=='one') {
            return response()->file(public_path('files/' . $records->file_one));
        }

        if($qt=='two') {
            return response()->file(public_path('files/' . $records->file_two));
        }

        if($qt=='three') {
            return response()->file(public_path('files/' . $records->file_three));
        }
    }


    public function approvalForm($id)
    {

        $requisition = Requisition::find($id);
        $supplier = Suppliers::find($requisition->recommended_supplier);
        $school =  School::find($requisition->company_id);
        $user= User::find($requisition->employee_id);
        $image =  "images/" . $school->institution_code . ".png";;

            $pdf = PDF::loadView('requisitions.requisition',[
                'data'=>$requisition,
                'school' => $school,
                'user' => $user,
                'supplier' => $supplier,
                'image' => $image
            ]);
            return $pdf->download('balance-and-statement.pdf');
    }


    public function viewSuppliers(){
        $suppliers = Suppliers::all();
        return view('suppliers.index')->with('records', $suppliers);
    }

    public function delete($id){
        Suppliers::destroy($id);
        $suppliers = Suppliers::all();
        return view('suppliers.index')->with('records', $suppliers);
    }

    public function createSupplier(){
        return view('suppliers.create');
    }

    public function createSup(Request  $request){

        $supplier = new Suppliers();
        $supplier->address=$request->address;
        $supplier->email=$request->email;
        $supplier->phone=$request->phone;
        $supplier->address=$request->address;
        $supplier->supplier_name=$request->name;
        $supplier->bank_name=$request->bank;
        $supplier->account_number=$request->account_number;
        $supplier->save();
        return $this->viewSuppliers();
        //return view('suppliers.create');
    }
}
