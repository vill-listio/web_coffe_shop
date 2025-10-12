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


        public function storeProducts(Request $request)
    {
        // Validasi input dulu
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|max:500',
            'type' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Nama menu wajib diisi.',
            'price.required' => 'Harga wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'description.required' => 'Deskripsi wajib diisi.',
            'type.required' => 'Jenis menu wajib diisi.',
            'image.required' => 'Gambar wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpg, jpeg, atau png.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Upload gambar
        $destinationPath = 'assets/images/';
        $myimage = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path($destinationPath), $myimage);

        // Simpan ke database
        $storeProducts = Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "image" => $myimage,
            "description" => $request->description,
            "type" => $request->type,
        ]);

        // Redirect dengan pesan sukses
        if ($storeProducts) {
            return Redirect::route('all.products')->with(['success' => "Produk berhasil ditambahkan!"]);
        }

        // Kalau gagal
        return redirect()->back()->with(['error' => "Gagal menambahkan produk."]);
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
