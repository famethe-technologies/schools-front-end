<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\School;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Couchbase\QueryException;
use Exception;
use Illuminate\Http\Request;
use App\Business\Services\THttpClientWrapper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
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
    public function reportsFinder()
    {
        $base_url=config('app.base_url');
        $id = Auth::user()->institution_id;
        $classesResponse = $this->tHttpClientWrapper->getRequest($base_url . 'classes/by-institution-id/' . $id);
         $classes = @json_decode(json_encode($classesResponse['dataList'], true));
        return view('reports.index')->with('classes',$classes);
    }

    public function generateReport(Request $request){
        $institution_id = Auth::user()->institution_id;
        if($request->fees_type == "School Billing Report"){
           $period =  Carbon::now()->format('Y');
//           $sql = "select f.narration,c.name_of_class,sum(i.amount) as total_billed from invoices i
//                    inner join fees_structure f on i.fees_id = f.id
//                    inner join classes c on f.class_id = c.id
//                    where i.institution_id=$institution_id and i.term_id=$request->termId and i.created_date like '%$period%'
//                    group by f.narration, c.name_of_class,i.amount";

            $sql = "SELECT SUM(i.amount) AS total_billed, (select name_of_class from classes where id=i.classs and is_deleted=false) as className
                    FROM invoices i
                    WHERE i.created_date LIKE '%2023%'
                    GROUP BY classs;";

            $total_sql = "select sum(i.amount) as total_billed from invoices i
                    where i.institution_id=$institution_id and i.term_id=$request->termId and i.created_date like '%$period%' ";

            $image =  "images/" . $this->imageRenderer($institution_id);
            $school =  School::find($institution_id);
            $report = DB::select(DB::raw($sql));
            $total = DB::select(DB::raw($total_sql));
            $pdf = PDF::loadView('reports.school-billing-pdf',[
                'records'=>$report,


                'term' => $request->termId,
                'school' => $school,
                'image' => $image,
                'total' => $total[0]->total_billed,
                'period' => 'Term  ' . $request->termId . ' ' .  $period

            ]);
            return $pdf->download('school-billing.pdf');
        }

        if($request->fees_type == "Student Billing Report By Student"){
            if(!isset($request->class_id)) {
                $sql = "select select c.name_of_class as class, s.student_surname as student_surname, s.student_first_name as student_first_name,(select sum(amount) from invoices where student_id=i.student_id) total, c.name_of_class as class
                                               from invoices i
                                                inner join fees_structure f on i.fees_id = f.id
                                                inner join classes c on f.class_id = c.id
                                                inner join student s on i.student_id =s.id
                                                where i.institution_id=$institution_id and f.term_id=$request->termId
                                                group by i.student_id,total,student_first_name,student_surname,class";
            }else{
                $sql = "select c.name_of_class as class, s.student_surname as student_surname, s.student_first_name as student_first_name,(select sum(amount) from invoices where student_id=i.student_id) total, c.name_of_class as class
                                               from invoices i
                                                inner join fees_structure f on i.fees_id = f.id
                                                inner join classes c on f.class_id = c.id
                                                inner join student s on i.student_id =s.id
                                                where i.institution_id=$institution_id and f.term_id=$request->termId and i.classs=$request->class_id
                                                group by i.student_id,total,student_first_name,student_surname,class";

            }
          return  $report = DB::select(DB::raw($sql));
            return view('reports.class-billing')->with('records', $report)->with([ 'term' => $request->termId ]);
        }

//        if($request->fees_type == "Arrears Report By School"){
//                $sql = "SELECT f.narration, COALESCE(sum(t1.amount), 0) - (SELECT COALESCE(sum(t2.amount), 0) FROM  receipts t2) as amountDue
//                    FROM invoices t1 inner join fees_structure f on t1.fees_id = f.id
//                    where t1.institution_id=$institution_id and t1.term_id=$request->termId group by fees_id";
//           return $report = DB::select(DB::raw($sql));
//            return view('reports.school-arrears')->with('records', $report)->with([ 'term' => $request->termId ]);
//        }

        if($request->fees_type == "Arrears Report By Class"){
            $sql = "SELECT c.name_of_class,f.narration, COALESCE(sum(t1.amount), 0) - (SELECT COALESCE(sum(t2.amount), 0) FROM  receipts t2) as amountDue
                    FROM invoices t1 inner join fees_structure f on t1.fees_id = f.id
                     inner join classes c on f.class_id = c.id
                     where t1.institution_id=$institution_id and t1.term_id=$request->termId
                    group by fees_id";
            $report = DB::select(DB::raw($sql));
            return view('reports.class-arrears')->with('records', $report)->with([ 'term' => $request->termId ]);
        }


//        "termId": "1",
//"fees_id": "School Billing Report",
//"class_id": "173"


       // return $request->all();
    }


    public function imageRenderer($schoolId){
         $school = School::find($schoolId);
         return $school->institution_code . ".png";
    }





}
