<?php

namespace App\Http\Controllers;

use App\Business\Services\THttpClientWrapper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(THttpClientWrapper $tHttpClientWrapper)
    {
        $this->middleware('auth');
        $this->tHttpClientWrapper = $tHttpClientWrapper;

    }
    protected function validator(array $data){
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
   }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
   public function create()
    {
        $base_url=config('app.base_url');

        $response = $this->tHttpClientWrapper->getRequest($base_url.'/institutions/all');

        if(isset($response["statusCode"] ) && $response["statusCode"] != "200"){
            return redirect()->back()->with(['error' => $response['message']]);
        }
        else
        {
            $records= @json_decode(json_encode($response['dataList'],true));
            return view('users.create')->with('records',$records);

        }


    }

    public function register(Request $request) {

        try {

                $data = array(
                    "first_name" => ucwords($request->first_name),
                    "last_name" => ucwords($request->first_name),
                    "email" => $request->email,
                    "username" => ucwords($request->first_name),
                    "password" => Hash::make($request->password),
                    "role" => $request->role,
                    "account_status" => 'ACTIVE',
                    "institution_id" => $request->institution,
                );

                User::create($data);
                return redirect('/view/users')->with(['success' => 'User Successfully Added!!!!', 'alert' => 'alert-success']);
            }

        catch (\Exception $exception) {

            return redirect()->back()->with(['error' => 'An error occured while processing your request !!', 'alert' => 'alert-danger']);

        }
    }
    public function show()
    {
        $records=User::join('institution', 'users.institution_id', '=', 'institution.id')
            ->get(['users.*', 'institution.institution_name']);

        return view('users.index')->with('records',$records);
    }
}
