<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use App\Admin;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Redirect;
class LoginController extends Controller
{
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('guest:web',['except'=>['logout','logout']]);
    }

    public function showLoginForm()
    {
        $data = array();
        $data['title'] = 'Log In';
        return view('auth.login',$data);
        
    }

    public function login(Request $request)
    {
         // dd($request);
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required| min:5'
        ]);
        // dd($request);
        $admin = Admin::where('email', $request->email)->first();
        // dd($user);
       if(!is_null($admin))
       {   
           if(!Hash::check($request->password, $admin->password))
           {
               // dd($user);
               session()->flash('errors', 'Your Password is wrong !!');
               return redirect()->route('login');
           }elseif ($admin->status == 1)
               {
                   if(Auth::guard('web')->attempt
                           (['email' => $request->email, 'password' => $request->password], $request->remember))
                   { 
                        return redirect()->intended(route('admin.dashboard'));
                      
                   }
               }else{
                   session()->flash('errors', 'There are some unsolved issues with your account!');
                   return redirect()->route('login');
               }
           
       }else{
           session()->flash('errors', 'You are not authentic user!');
           return redirect()->route('login');
       }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
    
}
