<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Booking;
use App\Models\Product\Order;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use Redirect;
use File;


class AdminsController extends Controller
{
    


    public function viewLogin() {


        return view('admins.login');
    }


    public function checkLogin(Request $request) {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }


    public function index() {

        $productsCount = Product::select()->count();
        $orderssCount = Order::select()->count();
        $bookingsCount = Booking::select()->count();
        $adminsCount = Admin::select()->count();


        return view('admins.index', compact('productsCount', 'orderssCount', 'bookingsCount', 'adminsCount'));
    }


    public function adminLogout(Request $request) {
    
    auth()->guard('admin')->logout();

    
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    
    return redirect()->route('index');
    }


    public function displayAllAdmins() {

        $allAdmins = Admin::select()->orderBy('id', 'desc')->get();
        

        return view('admins.alladmins', compact('allAdmins'));
    }

    public function createAdmins() {

        
        

        return view('admins.createadmins');
    }


    public function storeAdmins(Request $request) {

        Request()->validate([
            "name" => "required|max:40",
            "email" => "required|max:40",
            "password" => "required|max:40",
           
        ]);

        $storeAdmins = Admin::Create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if($storeAdmins) {
            return Redirect::route('all.admins')->with( ['success' => "admin created succesffully"] );

        }
        

    }


    

    //orders


    public function displayAllOrders() {

        $allOrders = Order::select()->orderBy('id', 'desc')->get();
        

        return view('admins.allorders', compact('allOrders'));
    }


    public function editOrders($id) {

        $order = Order::find($id);
        

        return view('admins.editorders', compact('order'));
    }
    
    
    public function UpdateOrders(Request $request, $id) {

        $order = Order::find($id);

        $order->update($request->all());

        if($order) {

            return Redirect::route('all.orders')->with( ['update' => "order status updated succesffully"] );

        }
        

    }


    public function deleteOrders($id) {

        $order = Order::find($id);

        $order->delete();

        if($order) {

            return Redirect::route('all.orders')->with( ['delete' => "order deleted succesffully"] );

        }
        

    }


    public function displayProducts() {

        $products = Product::select()->orderBy('id', 'desc')->get();

        
        return view('admins.allproducts', compact('products'));
        
        
    }


    public function createProducts() {

        

        
        return view('admins.createproducts');
        
        
    }


    public function storeProducts(Request $request) {

        Request()->validate([
            "name" => "required|max:40",
            "price" => "required|numeric",
            "image" => "required|image|mimes:jpeg,png,jpg|max:5048", 
            "description" => "required",
            "type" => "required",
           
        ]);


        $myimage = null; 

    
        if ($request->hasFile('image')) {
        $destinationPath = 'assets/images/';
        
        
            $imageFile = $request->file('image');
        
        
            $myimage = $imageFile->getClientOriginalName();
        
        
            $imageFile->move(public_path($destinationPath), $myimage);
    }


        $storeProducts = Product::Create([
            "name" => $request->name,
            "price" => $request->price,
            "image" => $myimage,
            "description" => $request->description,
            "type" => $request->type,
        ]);

        if($storeProducts) {
            return Redirect::route('all.products')->with( ['success' => "product created succesffully"] );

        }


        
    }



    public function editProducts($id) {

        $product = Product::find($id);
        
        return view('admins.editproducts', compact('product'));
    }



    public function UpdateProducts(Request $request, $id) {


        $product = Product::find($id);

        $myimage = $product->image;


        if ($request->hasFile('image')) {
        $destinationPath = 'assets/images/';
        $newimage = $request->file('image');
        
        
            if (File::exists(public_path($destinationPath . $product->image))) {
                File::delete(public_path($destinationPath . $product->image));
            }
        
        
            $myimage = $newimage->getClientOriginalName();
            $newimage->move(public_path($destinationPath), $myimage);
        }


        
        $product->update([
            "name" => $request->name,
            "price" => $request->price,
            "image" => $myimage,
            "description" => $request->description,
            "type" => $request->type,
        ]);

        if($product) {

            return Redirect::route('all.products')->with( ['update' => "product updated succesffully"] );

        }


    }


    public function deleteProducts($id) {


        $product = Product::find($id);

         if(File::exists(public_path('assets/images/' . $product->image))){
            File::delete(public_path('assets/images/' . $product->image));
        }else{
            //dd('File does not exists.');
        }

        $product->delete();

        
        if($product) {
            return Redirect::route('all.products')->with( ['delete' => "product deleted succesffully"] );

        }        
        
    }

    

    public function displayBookings() {

        $bookings = Booking::select()->orderBy('id', 'desc')->get();

        
        return view('admins.allbookings', compact('bookings'));
        
        
    }
    
    public function editBooking($id) {

        $booking = Booking::find($id);
        

        return view('admins.editbooking', compact('booking'));
    }



    public function UpdateBooking(Request $request, $id) {

        $booking = Booking::find($id);

        $booking->update($request->all());



        if($booking) {

            return Redirect::route('all.bookings')->with( ['update' => "booking status updated succesffully"] );

        }
        

    }

    public function deleteBooking($id) {


        $booking = Booking::find($id);

        

        $booking->delete();

        
        if($booking) {
            return Redirect::route('all.bookings')->with( ['delete' => "booking deleted succesffully"] );

        }        
        
    }
    


}
