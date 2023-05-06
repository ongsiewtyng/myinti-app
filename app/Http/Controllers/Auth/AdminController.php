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
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Controller
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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('admin.admin');
    }

    public function home()
    {
        $totalStudents = $this->getTotalStudents();

        // Retrieve the users' data
        $users = User::all();

        return view('admin.dashboard', ['totalStudents' => $totalStudents],['users' => $users]);
    }

    public function food(){

        return view('admin.food');
    }

    public function approval(){

        return view('admin.approval');
    }

    public function booking(){

        return view('admin.booking');
    }

    public function message(){

        return view('admin.message');
    }

    public function getTotalStudents()
    {
        $totalStudents = User::whereNotNull('created_at')->count();

        return $totalStudents;
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


    public function verified(Request $request)
    {
    $admin = Admin::where('email', $request->input('login'))->first();

    if (!$admin || !Hash::check($request->input('password'), $admin->password)) {
        RateLimiter::hit($this->throttleKey($request));

        throw ValidationException::withMessages([
            'login' => __('auth.failed'),
        ]);
    }

    Auth::guard('admin')->login($admin, $request->boolean('remember-me'));
    RateLimiter::hit($this->throttleKey($request));

    $credentials = $request->only('login', 'password');
    $remember = $request->filled('remember-me');

    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        $admin = Auth::guard('admin')->user();
        return redirect()->route('admin/dashboard');
    } else {
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
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