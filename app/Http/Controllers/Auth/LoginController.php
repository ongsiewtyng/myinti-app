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


    public function authenticate(Request $request)
    {

        $user = User::where('email', $request->input('login'))->first();

        if (!$user) {
            $user = User::where('name', $request->input('login'))->first();
        }

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            RateLimiter::hit($this->throttleKey($request));

            throw ValidationException::withMessages([
                'login' => __('auth.failed'),
            ]);
        }

        Auth::login($user, $request->boolean('remember-me'));
        RateLimiter::hit($this->throttleKey($request));

        $credentials = $request->only('login', 'password');
        $remember = $request->filled('remember-me');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            return redirect()->intended('/home');
        } else {
            return back()->withErrors([
                'login' => 'Please re-enter your username or email correctly.',
                'password'=>'The password you entered does not match',
            ])->withInput();
        }

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