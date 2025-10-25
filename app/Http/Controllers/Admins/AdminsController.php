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
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'Gagal login, periksa kembali email dan password Anda.']);
    }

    public function index()
    {
        $productsCount = Product::count();
        $orderssCount = Order::count();
        $bookingsCount = Booking::count();
        $adminsCount = Admin::count();

        return view('admins.index', compact('productsCount', 'orderssCount', 'bookingsCount', 'adminsCount'));
    }

    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

    // ================= ADMIN ==================

    public function displayAllAdmins()
    {
        $allAdmins = Admin::orderBy('id', 'desc')->get();
        return view('admins.alladmins', compact('allAdmins'));
    }

    public function createAdmins()
    {
        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request)
    {
        $request->validate([
            "name" => "required|max:40",
            "email" => "required|email|max:40|unique:admins,email",
            "password" => "required|min:6|max:40",
        ]);

        $storeAdmins = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if ($storeAdmins) {
            return Redirect::route('all.admins')->with(['success' => "Admin berhasil dibuat."]);
        }

        return redirect()->back()->with(['error' => "Gagal membuat admin."]);
    }

    // ================= ORDERS ==================

    public function displayAllOrders()
    {
        $allOrders = Order::orderBy('id', 'desc')->get();
        return view('admins.allorders', compact('allOrders'));
    }

    public function editOrders($id)
    {
        $order = Order::find($id);
        return view('admins.editorders', compact('order'));
    }

    public function UpdateOrders(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());

        return Redirect::route('all.orders')->with(['update' => "Status pesanan berhasil diperbarui."]);
    }

    public function deleteOrders($id)
    {
        $order = Order::find($id);
        $order->delete();

        return Redirect::route('all.orders')->with(['delete' => "Pesanan berhasil dihapus."]);
    }

    // ================= PRODUCTS ==================

    public function displayProducts()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admins.allproducts', compact('products'));
    }

    public function createProducts()
    {
        return view('admins.createproducts');
    }

    public function storeProducts(Request $request)
    {
        // Validasi input
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

        if ($storeProducts) {
            return Redirect::route('all.products')->with(['success' => "Produk berhasil ditambahkan!"]);
        }

        return redirect()->back()->with(['error' => "Gagal menambahkan produk."]);
    }

    public function editProducts($id)
    {
        $product = Product::find($id);
        return view('admins.editproducts', compact('product'));
    }

    public function UpdateProducts(Request $request, $id)
    {
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

        return Redirect::route('all.products')->with(['update' => "Produk berhasil diperbarui."]);
    }

    public function deleteProducts($id)
    {
        $product = Product::find($id);

        if (File::exists(public_path('assets/images/' . $product->image))) {
            File::delete(public_path('assets/images/' . $product->image));
        }

        $product->delete();

        return Redirect::route('all.products')->with(['delete' => "Produk berhasil dihapus."]);
    }

    // ================= BOOKINGS ==================

    public function displayBookings()
    {
        $bookings = Booking::orderBy('id', 'desc')->get();
        return view('admins.allbookings', compact('bookings'));
    }

    public function editBooking($id)
    {
        $booking = Booking::find($id);
        return view('admins.editbooking', compact('booking'));
    }

    public function UpdateBooking(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->all());

        return Redirect::route('all.bookings')->with(['update' => "Status pemesanan berhasil diperbarui."]);
    }

    public function deleteBooking($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return Redirect::route('all.bookings')->with(['delete' => "Pemesanan berhasil dihapus."]);
    }
}