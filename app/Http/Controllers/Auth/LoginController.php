<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{


    public function login(Request $request){
        $this->validate($request,[
          'email'=>'required',
          'password'=>'required'
        ]);

        $email=$request->email;
        $password=$request->password;
        $validdata=User::Where('email',$email)->first();
        $password_check=password_verify($password,@$validdata->password);
        if($password_check==false){ 

            return redirect()->back()->with('msg','Email or Password not matched');
        }
        if($validdata->status=='0'){

            return redirect()->back()->with('msg','Sorry you are not verified');
        }
        if(Auth::attempt(['email'=>$email,'password'=>$password])){

            return redirect()->route('login');
        }

        //dd('ok');
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
