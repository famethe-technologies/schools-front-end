<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$base_url=env('base_url');
       /* $base_url='http://localhost:4001/api/v1';

        return $response = $this->tHttpClientWrapper->getRequest($base_url.'/institutions/all');*/

        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url.'/institutions/all');


        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {

          $schools=$response['dataList'];
            return view('home')->with('schools',$schools);

        }
        return view('home');
    }
}
