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
use Illuminate\Support\Facades\DB;

use App\Models\Message;
use App\Mail\ReplyMessage;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Items;
use App\Models\Category;
use App\Models\Approval;
use App\Models\Facility;
use App\Models\Booking;


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

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search users
        $users = User::where('name', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%")
                    ->get();

        // Search food names
        $foods = Food::where('name', 'LIKE', "%$query%")
                    ->get();

        // Search facilities associated with bookings
        $facilities = Booking::whereHas('facility', function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'LIKE', "%$query%");
        })
        ->get();

        // Fetch additional user information if matching user found
        $userOrders = [];
        $userApprovals = [];
        $userMessage =[];
        if (!$users->isEmpty()) {
            $userId = $users->first()->id;
            $name = $users->first()->name;
            $userOrders = Order::where('user_id', $userId)->get();
            $userApprovals = Approval::where('user_id', $userId)->get();
            $userMessage = Message::where('name', $name)->get();
        }

        // You can add more search queries for different types of data

        //return view
        return view('admin.search', compact('users', 'foods', 'facilities', 'userOrders', 'userApprovals', 'userMessage'));
    }
    

    public function home()
    {
        $totalStudents = $this->getTotalStudents();

        // Retrieve the users' data
        $users = User::all();

        // Retrieve revenue
        $revenue = $this->calculateRevenue();

        // Retrieve the count of orders pending approval
        $approvalPendingCount = $this->getApprovalPendingCount();

        return view('admin.dashboard', compact('totalStudents', 'users', 'revenue', 'approvalPendingCount'));
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
            $category->category = $request->input('cat');

            // Check if an image file was uploaded
            if ($request->hasFile('pic')) {
                $image = $request->file('pic');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('cafeMenu'), $imageName);
                $category->catpic = $imageName;
            }
            $category->save();

            return redirect()->back();
        }


        public function addFood(Request $request)
        {
            // Create a new food item instance
            $foodItem = new Food();
        
            // Set the values for the food item
            $foodItem->category = $request->input('category');
            $foodItem->name = $request->input('name');
            $foodItem->description = $request->input('description');
            $foodItem->price = $request->input('price');
            // Set additional properties for other columns in the food table
        
            // Check if an image file was uploaded
            if ($request->hasFile('pic')) {
                $image = $request->file('pic');
                $category = $request->input('category');
        
                // Generate the destination path based on the category value
                $destinationPath = public_path('cafe' . $category);
        
                // Move the uploaded picture file to the destination path
                $imageName = $image->getClientOriginalName();
                $image->move($destinationPath, $imageName);
        
                // Save the destination path in the pic field of the food item
                $foodItem->pic =$imageName;
            }
        
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
                // Get the previous category value
                $previousCategoryFolder = 'cafe' . $previousCategory;

                // Construct the previous picture path
                $previousPicturePath = public_path($previousCategoryFolder . '/' . $previousPic);

                // Delete the previous picture file
                if (file_exists($previousPicturePath)) {
                    unlink($previousPicturePath);
                }
            }

            // Get the uploaded picture file
            $image = $request->file('pic');

            // Generate the destination path based on the category value
            $destinationPath = public_path('cafe' . $foodItem->category);

            // Move the uploaded picture file to the destination path
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Save the destination path in the pic field of the food item
            $foodItem->pic =$imageName;
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

    // APPROVAL SECTION

    public function approval(Request $request){

        $info = Approval::all();

        $urgency = $request->input('urgency');

        $submissions = Approval::when($urgency, function ($query) use ($urgency) {
            return $query->where('urgency', $urgency);
        })->get();

        return view('admin.approval', compact('submissions','info'));
    }

    public function toggle($id)
    {
        $submission = Approval::findOrFail($id);
        $submission->status = $submission->status === 'pending' ? 'approved' : 'pending';
        $submission->save();

        return redirect()->route('approval')->with('success', 'Approval status toggled successfully.');
    }

    public function download($id){
        $submission = Approval::findOrFail($id);
        $filenames = explode(',', $submission->document); // Split the filenames string into an array

        // Create a zip archive to store the files
        $zip = new \ZipArchive();
        $zipName = 'downloaded_files.zip';
        $zipPath = storage_path('app/documents/' . $zipName);

        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            // Add each file to the zip archive
            foreach ($filenames as $filename) {
                $filename = trim($filename); // Remove any whitespace
                $file = storage_path('app/documents/' . $filename);
                if (file_exists($file)) {
                    $zip->addFile($file, $filename);
                }
            }

            $zip->close();

            // Download the zip archive
            return response()->download($zipPath)->deleteFileAfterSend(true);
        } else {
            // Unable to create the zip archive
            return back()->with('error', 'Unable to create the download archive.');
        }
    }

    // APPROVAL SECTION END

    // BOOKING SECTION
    public function booking(){
        $facilities = Facility::with('booking')->get();

        return view('admin.booking', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cost' => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('facilities', 'public');

        $facility = new Facility();
        $facility->name = $request->input('name');
        $facility->image = $imagePath;
        $facility->cost = $request->input('cost');
        $facility->availability = true;
        $facility->save();

        return redirect()->route('booking')->with('success', 'Facility created successfully.');
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cost' => 'required|numeric',
        ]);

        $facility = Facility::findOrFail($id);
        $facility->name = $request->input('name');
        $facility->cost = $request->input('cost');

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($facility->image);
            $imagePath = $request->file('image')->store('facilities', 'public');
            $facility->image = $imagePath;
        }

        $facility->availability = $request->input('availability', false);
        $facility->save();

        return redirect()->route('booking')->with('success', 'Facility updated successfully.');
    }

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        Storage::disk('public')->delete($facility->image);
        $facility->delete();

        return redirect()->route('booking')->with('success', 'Facility deleted successfully.');
    }

    // BOOKING SECTION END


    // MESSAGES SECTION
    public function message(){
        $messages = Message::orderBy('subject')->get();

        return view('admin.message',compact('messages'));
    }

    public function reply(Request $request){
        $request->validate([
            'message_id' => 'required|exists:message,id',
            'reply' => 'required|string',
        ]);

        $message = Message::find($request->message_id);
        $userEmail = $message->email;
        $reply = $request->reply;

        // Send the reply email
        Mail::to($userEmail)->send(new ReplyMessage($message, $reply));

        return redirect()->route('message')->with('success', 'Message replied successfully.');
    }

    // ORDER HISTORY SECTION

    public function order($id = null){
        $orders = Order::all();
        $items = Items::all();
        $food = Food::all();
        $order = null;

        if ($id) {
            $order = Order::find($id);
            $items = Items::where('order_id', $id)->get();
        }

        return view('admin.order', compact('orders', 'order', 'items', 'food'));
    }

    public function updateStatus(Request $request){
        $orderId = $request->input('order_id');

        // Retrieve all items with the given order_id
        $items = Items::where('order_id', $orderId)->get();

        if ($items->isNotEmpty()) {
            // Determine the new status based on the current status of the first item
            $currentStatus = $items->first()->status;
            $newStatus = $currentStatus === 'completed' ? 'pending' : 'completed';

            // Update the status of all items with the given order_id
            $items->each(function ($item) use ($newStatus) {
                $item->status = $newStatus;
                $item->save();
            });

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    // ORDER HISTORY SECTION END

    public function getTotalStudents()
    {
        $totalStudents = User::whereNotNull('created_at')->count();

        return $totalStudents;
    }

    private function calculateRevenue()
    {
        // Logic to calculate the revenue based on order items
        $revenue = Items::sum('total');

        return $revenue;
    }

    private function getApprovalPendingCount()
    {
        // Logic to retrieve the count of orders pending approval from the approval table
        $approvalPendingCount = Approval::where('status', 'pending')->count();

        return $approvalPendingCount;
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