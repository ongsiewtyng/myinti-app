<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Items;
use App\Models\Category;

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
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function admin()
    {
        return view('admin.admin');
    }

    public function home()
    {
        $totalStudents = $this->getTotalStudents();

        // Retrieve the users' data
        $users = User::all();

        return view('admin.dashboard', ['totalStudents' => $totalStudents , 'users' => $users]);
    }

    public function food(){
        $categories = Category::distinct('category')->pluck('category');
        $foodItems = Food::all();

        return view('admin.food', compact('categories','foodItems'));

    }

    public function toggleAvailability(Request $request, $id)
    {
        $foodItem = Food::findOrFail($id);
        $foodItem->available = !$foodItem->available;
        $foodItem->save();

        // Return a JSON response with the updated availability status
        return Response::json(['available' => $foodItem->available]);
    }


    public function addCategory(Request $request){
        $category = new Category();
        $category->category = $request->input('category');

        // Check if an image file was uploaded
        if ($request->hasFile('catpic')) {
            $image = $request->file('catpic');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('catpics'), $imageName);
            $category->catpic = $imageName;
        }

        $category->save();

        return redirect()->back();
    }


    public function addFood(Request $request){
        // Create a new food item instance
        $foodItem = new Food();

        // Set the values for the food item
        $foodItem->category = $request->input('category');
        $foodItem->name = $request->input('name');
        $foodItem->pic = $request->input('pic');
        $foodItem->description = $request->input('description');
        $foodItem->price = $request->input('price');
        // Set additional properties for other columns in the food table

        // Save the food item to the database
        $foodItem->save();

        // Redirect back to the food page with a success message
        return redirect()->route('food')->with('success', 'Food item added successfully');
    }


    public function updateFood(Request $request, $id){
        // Retrieve the food item from the database
        $foodItem = Food::findOrFail($id);

        // Store the previous values
        $previousCategory = $foodItem->category;
        $previousName = $foodItem->name;
        $previousPic = $foodItem->pic;
        $previousDescription = $foodItem->description;
        $previousPrice = $foodItem->price;

        // Update the food item with the new values
        $foodItem->category = $request->input('category');
        $foodItem->name = $request->input('name');
        $foodItem->description = $request->input('description');
        $foodItem->price = $request->input('price');

        // Check if a new file was uploaded
        if ($request->hasFile('pic')) {
            // Delete the previous picture if it exists
            if ($previousPic) {
                // Delete the previous picture file from storage
                Storage::delete('public/' . $previousPic);
            }

            // Generate a unique filename
            $filename = $request->file('pic')->getClientOriginalName();

            // Upload the new picture file to the public folder
            $picPath = $request->file('pic')->storeAs('public', $filename);

            // Get the file name only
            $fileNameOnly = basename($picPath);
            $foodItem->pic = $fileNameOnly;
        }


        // Check if any changes were made
        $hasChanges = (
            $previousCategory != $foodItem->category ||
            $previousName != $foodItem->name ||
            $previousDescription != $foodItem->description ||
            $previousPrice != $foodItem->price ||
            ($request->hasFile('pic') && $previousPic != $foodItem->pic)
            // Add conditions for other columns
        );

        // Save the changes to the database only if there are changes
        if ($hasChanges) {
            $foodItem->save();
            return redirect()->route('food')->with('success', 'Food item updated successfully');
        } else {
            return redirect()->route('food')->with('info', 'No changes made to the food item');
        }
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

    public function order(){

        return view('admin.order');
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
            'email' => ['required', 'string'],
            'password' => ['required', 'string','min:6'],
        ];
    }

    public function access(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required|min:6'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if(!$admin){
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        if(Hash::check($request->password, $admin->password)){
            Auth::guard('admin')->login($admin);
            return redirect()->intended('/dashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
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