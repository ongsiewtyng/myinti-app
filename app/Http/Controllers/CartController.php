<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use App\Models\Items;
use App\Mail\ReceiptMail;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;
use Dompdf\Options;


class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        // Retrieve all items in the cart with eager loading of the foodItem relationship
        $cartItems = Cart::with('foodItem')->get();

        return view('cart.payment', compact('cartItems'));
    }

    public function store(Request $request){
        $request->validate([
            'food_id' => 'required|exists:food,id',
            'quantity' => 'required|integer|min:1',
            'payment' => 'required',
        ]);

        $foodItem = Food::findOrFail($request->food_id);

        // Retrieve the cart item for the current user and the selected food item
        $cartItem = Cart::where('user_id', auth()->user()->id)
            ->where('food_id', $foodItem->id)
            ->first();

        if ($cartItem) {
            // If the cart item already exists, update its quantity and total
            $cartItem->quantity += $request->quantity;
            $cartItem->total = $foodItem->price * $cartItem->quantity;
            $cartItem->save();
        } else {
            // If the cart item doesn't exist, create a new one
            Cart::create([
                'name' => $foodItem->name,
                'pic' => $foodItem->pic,
                'quantity' => $request->quantity,
                'total' => $foodItem->price * $request->quantity,
                'payment' => $request->payment,
                'order_type' => $request->order_type,
                'food_id' => $foodItem->id,
                'user_id' => auth()->user()->id,
            ]);
        }

        // Return a JSON response with the success property
        return response()->json(['success' => true]);
    }

    public function addToCart(Request $request){
        $foodId = $request->input('food_id');
        $quantity = $request->input('quantity');
        
        // Retrieve the food item from the database
        $foodItem = Food::find($foodId);
        
        if ($foodItem && $quantity > 0) {
            // Retrieve the cart item for the current user and the selected food item
            $cartItem = Cart::where('user_id', auth()->user()->id)
                ->where('food_id', $foodItem->id)
                ->first();
            
            if ($cartItem) {
                // If the cart item already exists, update its quantity and total
                $cartItem->quantity += $quantity;
                $cartItem->total = $foodItem->price * $cartItem->quantity;
                $cartItem->save();
            } else {
                // If the cart item doesn't exist, create a new one
                $cartItem = new Cart([
                    'name' => $foodItem->name,
                    'pic' => $foodItem->pic,
                    'quantity' => $quantity,
                    'total' => $foodItem->price * $quantity,
                    'payment' => $request->input('payment'),
                    'order_type' => $request->input('order_type'),
                    'food_id' => $foodItem->id,
                    'user_id' => auth()->user()->id,
                ]);
                
                $cartItem->save();
            }
        }
        
        return redirect()->route('cart');
    }


    public function count(){
        $count = Cart::count();
        return response()->json(['count' => $count]);
    }

    public function update(Request $request, $id){
        // Update the quantity and total of an item in the cart
        $cartItem = Cart::findOrFail($id);

        // Retrieve the related food item and its price
        $foodItem = $cartItem->foodItem;
        $price = $foodItem->price;

        $cartItem->update([
            'quantity' => $request->quantity,
            'total' => $request->quantity * $price,
        ]);

        return redirect()->back()->with('success', 'Cart item quantity updated successfully.');
    }

    public function updatePayment(Request $request, $userId){
        // Update the payment of all items in the cart for a specific user
        Cart::where('user_id', $userId)->update([
            'payment' => $request->payment,
        ]);
    
        return redirect()->back()->with('success', 'Cart items payment updated successfully.');
    }

    public function updateOrder(Request $request, $userId){
        // Update the order of an item in the cart
        Cart::where('user_id', $userId)->update([
            'order_type' => $request->order_type,
        ]);

        return redirect()->back()->with('success', 'Option updated successfully.');
    }



    public function destroy($id){
        // Remove an item from the cart
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Cart item removed successfully.');
    }

    public function clear(){
        // Clear all items from the cart
        Cart::truncate();

        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }

    public function checkout(Request $request){
        // Check if user is authenticated
        if (!auth()->check()) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to continue.');
        }

        try {
            $userId = auth()->user()->id;

            // Retrieve the cart items and calculate the total price
            $cartItems = Cart::where('user_id', $userId)->get();
            
            //Create a row for order
            $newOrder = [
                'user_id' => $userId,
                // Other order data (e.g., shipping address, etc.)
            ];

            // Create the order
            $order = Order::create($newOrder);
            //get the id for newly created order
            $orderId = $order->id;

            // Create an order record
            foreach ($cartItems as $cartItem) {
                // Create an order record for each cart item
                $orderData = [
                    'user_id' => $userId,
                    'total' => $cartItem->total,
                    'status' => 'Pending',
                    'order_id' => $orderId,
                    'payment' => $cartItem->payment,
                    'order_type' => $cartItem->order_type,
                    'food_id' => $cartItem->food_id,
                    'quantity' => $cartItem->quantity,
                    // Other order data (e.g., shipping address, etc.)
                ];
        
                // Create the item
                $order = Items::create($orderData);

                // Update the cart items with the order ID and retrieve the ordered items data
                $orderedItems = $cartItems->map(function ($cartItem) use ($order) {
                    // $cartItem->order_id = $order->id;
                    $cartItem->save();

                    return [
                        // 'order_id' => $order->id,
                        'quantity' => $cartItem->quantity,
                        'food_name' => $cartItem->food->name,
                    ];
                });
            }
            // Clear the cart by deleting all cart items for the current user
            $delete = Cart::where('user_id', $userId)->delete();

            // Perform any additional actions (e.g., sending email notifications, etc.)

            // Redirect the user to the order confirmation page or display a success message
            return redirect()
                ->route('cart.confirmation', ['id' => $orderId])
                ->with('success', 'Order placed successfully.')
                ->with('orderedItems', $orderedItems);
        } catch (\Exception $e) {
            // Log the error
            dd($e);
            // Handle the error appropriately (e.g., log the error, display an error message)
            // return redirect()->back()->with('error', 'An error occurred while processing the order. Please try again.');
        }
    }

    public function confirmation($id){
        // Retrieve the order based on the provided ID
        $order = Order::findOrFail($id);
        $items = Items::where('order_id', $id)->get();
        $total = $items->sum('total');
        // $food = Food::where("id", $order->food_id)->get();

        // Retrieve the user's email using the relationship
        $email = $order->user->email;
        
        // Prepare the data to be passed to the email view
        $data = [
            'order' => $order,
            'food' => $order->food,
            'total' => $total,
            'items' => $items,
        ];

        // Render the view to HTML
        $html = view('emails.receipt', $data)->render();

        // Generate PDF from the HTML
        $pdf = $this->generatePDF($html);

        // Attach the PDF to the email
        $pdfAttachment = $pdf->output();
        $attachmentName = 'order_receipt.pdf';

        // Send the email with the PDF attachment
        Mail::to($email)->send(new ReceiptMail($order, $items, $total, $pdfAttachment, $attachmentName));

        // Pass the order data to the view for displaying the confirmation page
        return view('cart.confirmation', compact('order', 'total', 'items'));
    }

    private function generatePDF($html)
    {
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // (Optional) Adjust PDF settings here
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf;
    }
}
