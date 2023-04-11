<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use App\Models\Fees;
use App\Models\School;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }
    public function create()
    {
        $base_url=config('app.base_url');
        $id = Auth::user()->institution_id;
        $housesResponse = $this->tHttpClientWrapper->getRequest($base_url . 'sporthouse/by-institution-id/'. $id);
        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . 'classes/by-institution-id/' . $id);
        //$institutionsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'institutions/by-id/'. $id);

        if (isset($houses["statusCode"]) && $houses["statusCode"] != "200" && isset($classes["statusCode"]) && $classes["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $classes['message']]);
        } else {
            $houses = @json_decode(json_encode($housesResponse['dataList'], true));
            $classes = @json_decode(json_encode($classesResponse['dataList'], true));
         //   $institutions = @json_decode(json_encode($institutionsResponse['data'], true));

            return view('students.create')->with('houses', $houses)
                ->with('classes',$classes);

        }

    }

    public function index()
    {
        $base_url=config('app.base_url');

        $id = Auth::user()->institution_id;

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/student/by-institution-id/'. $id);

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
             $records = @json_decode(json_encode($response, true));
            return view('students.index')->with('records', $records);

        }
    }

    public function store(Request $request)
    {
        $base_url=config('app.base_url');
        //$id=Session::get('school_id');

        if(strtolower($request->student_national_id) == 'nill'){
            $nationalId = Str::uuid()->toString();
        }else{
           $nationalId =  $request->student_national_id;
        }

        $id = Auth::user()->institution_id;
         $data = [
            'studentFirstName'=> $request->student_firstname,
            'studentSurname'=> $request->student_surname,
            'route'=> 'string',
            'nationalId'=> $nationalId,
            'dob'=> $request->dob,
            'birthEntryNo'=> $request->birth_entry_no,
            'gender'=> $request->student_gender,
            'passportNo'=> $request->passport_no,
            'race'=> $request->race,
            'bloodGroup'=> $request->blood_group,
            'disabilities'=> $request->disabilities,
            'mainLanguage'=> $request->main_language,
            'religion'=> $request->religion,
            'denomination'=>'string',
            'pastor'=> 'string',
            'studentType'=> $request->studentType,
            'medicalAid'=> $request->medical_aid,
            'medicalAidNo'=> $request->medical_aid_no,
            'dateEnrolled'=> $request->date_enrolled,
            'residentialAddress'=> $request->residential_address,
            'studentPhone'=> $request->student_phone,
            'studentEmail'=> $request->student_email,
            'specialDiet'=> $request->special_diet,
            'allergies'=> $request->allergies,
            'specialMedicalRequirements'=> $request->special_medical_requirements,
            'sportingDescription'=> $request->sporting_description,
            'sportsHouseId'=> $request->sport_house,
            'institutionId'=>$id,
            'classId'=> $request->class_id,
            'parentGuardianDTO'=> [
                                'id'=>0,
                                'nationalId'=> $nationalId,
                                'firstname'=> $request->firstname,
                                 'surname'=> $request->surname,
                                 'relationship'=> $request->relationship,
                                 'residentialAddress'=> $request->address,
                                 'phone'=> $request->phone,
                                 'email'=> $request->email,
                                 'employer'=> $request->employer,
                                 'occupation'=> $request->occupation,
                                 'createdBy'=>Auth::user()->first_name,
                                 'lastModifiedBy'=> Auth::user()->first_name,
                                ],

            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];


        $response = $this->tHttpClientWrapper->postRequest($base_url.'/student',$data);
        if(isset($response["errorId"])){
            return redirect()->route('students.view')->with('failed',$response['errors'][0]['message']);
            //return redirect()->back()->with(['error' => 'Failed to register student']);
        }
        else
        {
            return redirect()->route('students.view')->with('success','Student Added Successfully!!');
        }
    }

    public function viewBalance ($id)
    {
         $institution_id = Auth::user()->institution_id;
         $image =  "images/" . $this->imageRenderer($institution_id);
        $school =  School::find($institution_id);
         $institution_url=config('app.institution_url');
        $response = $this->tHttpClientWrapper->getRequest($institution_url.'receipts/student-balance/'. $id);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $sql = "SELECT i.created_date as created_at,i.description as narration, i.id, COALESCE(i.amount, 0) AS debit, COALESCE(NULL, 0) AS credit
                FROM invoices i
                WHERE i.student_id =$id
                UNION
                SELECT r.receipt_date as created_at,r.description as narration, r.narration as id, COALESCE(NULL, 0) AS debit, COALESCE(r.amount, 0) AS credit
                FROM receipts r
                WHERE student_details =$id";
            $report = DB::select(DB::raw($sql));
            //$records= @json_decode(json_encode($response,true));
            $student= Student::find($id);
            $pdf = PDF::loadView('reports.student-statement-pdf',[
                'reports'=>$report,
                'student' => $student->student_first_name . ' ' . $student->student_surname,
                'school' => $school,
                'image' => $image,
                'total' => $response['balance'],

            ]);

            return $pdf->download('balance-and-statement.pdf');



            return view('receipts.student-balance')->with('records', $records)->with('reports', $report);
        }

    }

    public function viewSchoolBalance ($id)
    {
        $institution_url=config('app.institution_url');
        $response = $this->tHttpClientWrapper->getRequest($institution_url.'receipts/school-balance/'. $id);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $sql = "
                SELECT f.narration AS description, i.id, COALESCE(i.amount, 0) AS debit, COALESCE(NULL, 0) AS credit
                FROM invoices i
                INNER JOIN fees_structure f ON i.fees_id = f.id
                WHERE i.student_id = 3
                UNION
                SELECT description, id, COALESCE(NULL, 0) AS debit, COALESCE(amount, 0) AS credit
                FROM receipt
                WHERE student = 3
                UNION
                SELECT description, id, COALESCE(NULL, 0) AS debit, COALESCE(amount, 0) AS credit
                FROM receipts r
                WHERE student_details = 3";
          return  $report = DB::select(DB::raw($sql));
            $records= @json_decode(json_encode($response,true));
            return view('receipts.school-balance')->with('records', $records);
        }

    }

    //edit student
    public function edit($id)
    {
        $base_url=config('app.base_url');
        $institutionId = Auth::user()->institution_id;

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/student/by-id/'. $id);
        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . 'classes/by-institution-id/' . $institutionId);
        $sportHouses = $this->tHttpClientWrapper->getRequest($base_url . 'sporthouse/by-institution-id/' . $institutionId);
        $institutionsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'institutions/all');

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['data'], true));
            $classes = @json_decode(json_encode($classesResponse['dataList'], true));
            $institutions = @json_decode(json_encode($institutionsResponse['dataList'], true));
            $sportHouse = @json_decode(json_encode($sportHouses['dataList'], true));

            return view('students.edit')->with('record', $records)
                ->with('classes', $classes)
                ->with('sportHouse', $sportHouse)
                ->with('institutions', $institutions);
        }

    }

    //update student
    public function update(Request $request, $id)
    {
        $base_url=config('app.base_url');

        if(strtolower($request->student_national_id) == 'nill' || is_null($request->student_national_id)){
            $nationalId = Str::uuid()->toString();
        }else{
            $nationalId =  $request->student_national_id;
        }
        $data = [
            'studentFirstName'=> $request->student_firstname,
            'studentSurname'=> $request->student_surname,
            'route'=> $request->route,
            'nationalId'=> $nationalId,
            'dob'=> $request->dob,
            'birthEntryNo'=> $request->birth_entry_no,
            'gender'=> $request->student_gender,
            'passportNo'=> $request->passport_no,
            'race'=> $request->race,
            'bloodGroup'=> $request->blood_group,
            'disabilities'=> $request->disabilities,
            'mainLanguage'=> $request->main_language,
            'religion'=> $request->religion,
            'denomination'=>$request->denomination,
            'pastor'=> $request->pastor,
            'studentType'=> $request->studentType,
            'medicalAid'=> $request->medical_aid,
            'medicalAidNo'=> $request->medical_aid_no,
            'dateEnrolled'=> $request->date_enrolled,
            'residentialAddress'=> $request->residential_address,
            'studentPhone'=> $request->student_phone,
            'studentEmail'=> $request->student_email,
            'specialDiet'=> $request->special_diet,
            'allergies'=> $request->allergies,
            'specialMedicalRequirements'=> $request->special_medical_requirements,
            'sportingDescription'=> $request->sporting_description,
            'sportsHouseId'=> $request->sport_house,
            'institutionId'=>$request->institutionId,
            'classId'=> $request->class_id,
            'parentGuardianDTO'=> [
                'id'=>$request->parent_guardian_id,
                'nationalId'=> $nationalId,
                'firstname'=> $request->firstname,
                'surname'=> $request->surname,
                'relationship'=> $request->relationship,
                'residentialAddress'=> $request->address,
                'phone'=> $request->phone,
                'email'=> $request->email,
                'employer'=> $request->employer,
                'occupation'=> $request->occupation,
                'createdBy'=>Auth::user()->first_name,
                'lastModifiedBy'=> Auth::user()->first_name,
            ],

            'createdBy'=>Auth::user()->first_name,
            'lastModifiedBy'=> Auth::user()->first_name,

        ];
        //return $data;

        $response = $this->tHttpClientWrapper->patchRequest($base_url.'/student/update/' . $id,$data);

        if(isset($response["errorId"])){
            return redirect()->route('students.view')->with('failed',$response['errors'][0]['message']);
            //return redirect()->back()->with(['error' => 'Failed to register student']);
        }
        else
        {
            return redirect()->route('students.view')->with('success','Student Updated Successfully!!');
        }
    }

    public function singleInvoiceView($id){

        $ids = Auth::user()->institution_id;
        $fees = Fees::where('institution_id', $ids)->get();
        return view('students.single-invoice')->with([
           'id' => $id,
            'fees' => $fees
        ]);
    }

    public function generateSingleInvoice(Request $request){
        $base_url=config('app.base_url');
        $response = $this->tHttpClientWrapper->getRequest($base_url . '/student/by-id/'. $request->studentId);
        $schools = Auth::user()->institution_id;
        $user= Auth::user()->email;

         $data = [
            'feesId' => 1,
            'studentId' =>  $request->studentId,
            'termId' =>  $request->termId,
            'institutionId' => $schools,
            'invoiceNumber' => Carbon::now()->timestamp,
            'amount' => $request->amount,
            'description' =>  $request->description . ' ' . "SINGLE - $user",
            'classs' => $response['data']['classes']['id'] ?? null,
        ];

        $url = env('RECEIPT_API') . "invoices/";
         $responses  = $this->tHttpClientWrapper->postRequest($url,$data);
        return redirect()->route('students.view')->with('success','Single invoice successful posted.');
       // return redirect('/view/students')->with(['success', 'Single invoice successful posted.']);
    }

    public function imageRenderer($schoolId){
        $school = School::find($schoolId);
        return $school->institution_code . ".png";
    }




}
