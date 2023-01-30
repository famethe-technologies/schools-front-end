<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SchoolUsers;
use App\Models\Staff;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'nationalId' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
    }


    public function register(Request $request)
    {
       // return $request->all();
        $id = "'" .  $request->ref . "'";
         $staff = DB::select(DB::raw("SELECT * FROM staff where national_id=$id limit 1"));

        if($staff){
            $email = User::whereEmail($request->email)->first();
            if(isset($email)){
                session()->flash('error','email already registered');
                return view('auth.register');
            }

            $email = User::whereStaffId($staff[0]->id)->first();
            if(isset($email)){
                session()->flash('error','Staff is already registered');
                return view('auth.register');
            }


            $user = new User();
            $user->first_name = $staff[0]->firstname;
            $user->last_name = $staff[0]->surname;
            $user->email = $request->email;
            $user->username = $request->email;
            $user->institution_id = $staff[0]->institution;
            $user->account_status = 'PENDING ACTIVATION';
            $user->role = $staff[0]->position;
            $user->password = Hash::make($request->password);
            $user->staff_id = $staff[0]->id;
            $user->save();

            session()->flash('success','Registration success');
            return view('auth.register');
        }

        session()->flash('error','Not  registered as staff');
        return view('auth.register');

    }
}
