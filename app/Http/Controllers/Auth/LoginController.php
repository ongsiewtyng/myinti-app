<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the email format.
     *
     * @param  string  $email
     * @return bool
     */
    protected function validateEmail($email)
    {
        $regex = '/^[pP]\d{8}@student\.newinti\.edu\.my$/i';
        return preg_match($regex, $email);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string','min:6'],
        ];
    }


    public function authenticate(Request $request){
        $login = $request->input('login');
        $password = $request->input('password');

        // Check if the login credentials belong to an admin
        $admin = Admin::where('email', $login)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            Auth::guard('admin')->login($admin, $request->boolean('remember-me'));
            return redirect()->intended('/dashboard');
        }

        // Check if the login credentials belong to a student (using email)
        $student = User::where('email', $login)->first();
        if ($student && Hash::check($password, $student->password)) {
            Auth::guard('web')->login($student, $request->boolean('remember-me'));
            return redirect()->intended('/home');
        }

        // Check if the login credentials belong to a student (using name)
        $student = User::where('name', $login)->first();
        if ($student && Hash::check($password, $student->password)) {
            Auth::guard('web')->login($student, $request->boolean('remember-me'));
            return redirect()->intended('/home');
        }

        // If the credentials don't match any admin or student, show an error
        return back()->withErrors([
            'login' => 'Please re-enter your username or email correctly.',
            'password' => 'The password you entered does not match',
        ])->withInput();
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')).'|'.$request->ip();
    }
    
    
}