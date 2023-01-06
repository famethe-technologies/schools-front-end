<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $id=Session::get('school_id');
        $housesResponse = $this->tHttpClientWrapper->getRequest($base_url . '/sporthouse/all');
        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . '/classes/all');
        $institutionsResponse = $this->tHttpClientWrapper->getRequest($base_url . 'institutions/all');

        if (isset($houses["statusCode"]) && $houses["statusCode"] != "200" && isset($classes["statusCode"]) && $classes["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $classes['message']]);
        } else {
            $houses = @json_decode(json_encode($housesResponse['dataList'], true));
            $classes = @json_decode(json_encode($classesResponse['dataList'], true));
            $institutions = @json_decode(json_encode($institutionsResponse['dataList'], true));

            return view('students.create')->with('houses', $houses)
                ->with('classes',$classes)
                ->with('institutions',$institutions);

        }

    }

    public function index()
    {
        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url . '/student/all');

        if (isset($response["statusCode"]) && $response["statusCode"] != "200") {
            return redirect()->back()->with(['error' => $response['message']]);
        } else {
            $records = @json_decode(json_encode($response['dataList'], true));

            return view('students.index')->with('records', $records);

        }
    }

    public function store(Request $request)
    {
        $base_url=config('app.base_url');
        $id=Session::get('school_id');
        $data = [
            'studentFirstName'=> $request->student_firstname,
            'studentSurname'=> $request->student_surname,
            'route'=> 'string',
            'nationalId'=> $request->student_national_id,
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
                                'nationalId'=> $request->national_id,
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

        $response = $this->tHttpClientWrapper->postRequest($base_url.'/student',$data);

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            return redirect()->route('students.view')->with('success','Student Added Successfully!!');
        }
    }
}
