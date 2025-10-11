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
    
}
