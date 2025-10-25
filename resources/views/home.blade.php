@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">

    <!-- SLIDE 1 -->
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
        <div class="overlay" style="background-color: rgba(0,0,0,0.45);"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading" style="font-style: italic; color: #C6A664;">Selamat Datang</span>
                    <h1 class="mb-4" style="font-family: 'Playfair Display', serif;">Hangat di Cangkir, Tenang di Hati
                    </h1>
                    <p class="mb-4 mb-md-5" style="font-family: 'Poppins', sans-serif;">
                        Di setiap teguk kopi, ada jeda kecil dari riuhnya dunia.
                        Duduklah sebentar biarkan aroma kopi bercerita.
                    </p>
                    <p>
                        <a href="#" class="btn p-3 px-xl-4 py-xl-3"
                            style="background-color:#C6A664; color:#1E1E1E; border:none;">Order Now</a>
                        <a href="products/menu" class="btn p-3 px-xl-4 py-xl-3"
                            style="border:1px solid #C6A664; color:#C6A664;">View
                            Menu</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});">
        <div class="overlay" style="background-color: rgba(0,0,0,0.45);"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading" style="font-style: italic; color: #C6A664;">Cerita Pagi</span>
                    <h1 class="mb-4" style="font-family: 'Playfair Display', serif;">Karena Setiap Hari Punya Rasa
                        Sendiri</h1>
                    <p class="mb-4 mb-md-5" style="font-family: 'Poppins', sans-serif;">
                        Beberapa hari dimulai dengan kopi, beberapa dengan kenangan.
                        Apa pun rasanya hari ini biar kami yang menyeduhnya.
                    </p>
                    <p>
                        <a href="#" class="btn p-3 px-xl-4 py-xl-3"
                            style="background-color:#C6A664; color:#1E1E1E; border:none;">Order Now</a>
                        <a href="products/menu" class="btn p-3 px-xl-4 py-xl-3"
                            style="border:1px solid #C6A664; color:#C6A664;">View Menu</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- SLIDE 3 -->
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.45);"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading" style="font-style: italic; color: #C6A664;">Waktu yang Tenang</span>
                    <h1 class="mb-4" style="font-family: 'Playfair Display', serif;">Tempat di Mana Senja dan Kopi
                        Bertemu</h1>
                    <p class="mb-4 mb-md-5" style="font-family: 'Poppins', sans-serif;">
                        Kadang, tak perlu banyak kata.
                        Cukup secangkir kopi dan obrolan ringan semua terasa cukup.
                    </p>
                    <p>
                        <a href="#" class="btn p-3 px-xl-4 py-xl-3"
                            style="background-color:#C6A664; color:#1E1E1E; border:none;">Order Now</a>
                        <a href="products/menu" class="btn p-3 px-xl-4 py-xl-3"
                            style="border:1px solid #C6A664; color:#C6A664;">View Menu</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="container">
    @if(Session::has( 'date' ))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('date') }}</p>
    @endif
</div>
<div class="container">
    @if(Session::has( 'booking' ))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('booking') }}</p>
    @endif
</div>


<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">


            <div class="info">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text">
                            <h3>Telepon / WhatsApp</h3>
                            <p>089xxxxxxxx</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text">
                            <h3>Alamat</h3>
                            <p>Glempang, Pagojengan, Kec. Paguyangan, Kabupaten Brebes, Jawa Tengah</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Jam Buka</h3>
                            <p>Setiap Hari: 12.00 – 23.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>


            @auth

            <div class="book p-4">
                <h3>Book a Table</h3>
                <form action="{{ route('booking.tables') }}" method="POST" class="appointment-form">
                    @csrf


                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"
                        class="form-control appointment_time">

                    {{-- Field 1: First Name & Last Name --}}
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        @if($errors->has('first_name'))
                        <p class="alert alert-danger">{{ $errors->first('first_name') }}</p>
                        @endif

                        <div class="form-group ml-md-4">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        @if($errors->has('last_name'))
                        <p class="alert alert-danger">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>

                    {{-- Field 2: Date, Time, & Phone --}}
                    <div class="d-md-flex">
                        <div class="form-group">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" name="date" class="form-control appointment_date" placeholder="Date">
                            </div>
                            @if($errors->has('date'))
                            <p class="alert alert-danger">{{ $errors->first('date') }}</p>
                            @endif
                        </div>

                        <div class="form-group ml-md-4">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-ios-clock"></span></div>
                                <input type="text" name="time" class="form-control appointment_time" placeholder="Time">
                            </div>
                            @if($errors->has('time'))
                            <p class="alert alert-danger">{{ $errors->first('time') }}</p>
                            @endif
                        </div>

                        <div class="form-group ml-md-4">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        @if($errors->has('phone'))
                        <p class="alert alert-danger">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>

                    {{-- Field 3: Message & Submit Button --}}
                    <div class="d-md-flex">
                        <div class="form-group">
                            <textarea id="" cols="30" name="message" rows="2" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        @if($errors->has('message'))
                        <p class="alert alert-danger">{{ $errors->first('message') }}</p>
                        @endif
                        <div class="form-group ml-md-4">
                            <input type="submit" name="submit" value="Book" class="btn btn-white py-3 px-4">
                        </div>
                    </div>
                </form>
            </div>
            @else

            <div class="book p-4 text-center d-flex flex-column align-items-center justify-content-center">
                <h3 class="mb-4">Reservasi Meja</h3>
                <p class="mb-4">
                    Untuk melakukan pemesanan meja, Anda harus masuk ke akun Anda terlebih dahulu.
                </p>
                <a href="{{ route('login') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">
                    LOGIN
                </a>

                @if (Route::has('register'))
                <p class="mt-3">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-white">Daftar di sini</a>
                </p>
                @endif
            </div>
            @endauth

        </div>
    </div>
</section>


<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url(images/about.jpg);"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate">
                <span class="subheading">Sepotong Cerita</span>
                <h2 class="mb-4">Cerita di Balik Kopi</h2>
            </div>
            <div>
                <p>
                    Semua berawal dari secangkir kopi dan obrolan sederhana di malam yang pelan.
                    Kami ingin menciptakan tempat di mana setiap tegukan membawa cerita,
                    setiap aroma jadi pengingat bahwa hidup tak perlu terburu-buru.
                    Di sini, kamu bisa duduk, diam sejenak, dan menemukan kembali dirimu
                    di antara denting sendok dan lagu-lagu pelan yang menenangkan.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <!-- 1. Easy to Order -->
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-choices"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Mudah Dipesan</h3>
                        <p>Kopi bukan soal ribet. Di sini, cukup satu langkah kecil untuk memulai pagi yang hangat dan
                            tenang.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Fastest Delivery -->
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-delivery-truck"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Cepat Sampai</h3>
                        <p>Dari seduhan kami ke tanganmu tanpa menunggu lama. Karena hangatnya kopi tak menunggu siapa
                            pun.</p>
                    </div>
                </div>
            </div>

            <!-- 3. Quality Coffee -->
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-coffee-bean"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Kopi Berkualitas</h3>
                        <p>Setiap biji kami pilih dengan hati. Karena rasa terbaik lahir dari proses yang sederhana tapi
                            tulus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
                    <span class="subheading">Rasa yang Bercerita</span>
                    <h2 class="mb-4">Menu Kami</h2>
                    <p class="mb-4">
                        Kami percaya, setiap cangkir kopi punya kisahnya sendiri.
                        Dari aroma pertama yang menyapa, hingga tegukan terakhir yang menenangkan.
                        Di sini, kamu tak sekadar memesan kamu menikmati waktu, perlahan.
                    </p>
                    <p><a href="products/menu" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="0">0</strong>
                                <span>Coffee Branches</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="0">0</strong>
                                <span>Number of Awards</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="6">0</strong>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="6">0</strong>
                                <span>Staff</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Pilihan Favorit</span>
                <h2 class="mb-4">Kopi yang Paling Dicari</h2>
                <p>
                    Ada rasa yang tak pernah gagal membuat rindu.
                    Dari pahit yang jujur, hingga manis yang menenangkan
                    inilah beberapa racikan yang paling dicintai para penikmat kopi.
                </p>
            </div>
        </div>
        <div class="row">

            @foreach($products as $product)
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img"
                        style="background-image: url({{ asset('assets/images/'.$product->image.'') }});"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="{{ route('product.single', $product->id) }}">{{ $product->name }}</a></h3>
                        <p>{{ $product->description }}</p>
                        <p class="price"><span>${{ $product->price }}</span></p>
                        <p><a href="{{ route('product.single', $product->id) }}"
                                class="btn btn-primary btn-outline-primary">Show</a></p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>

<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-1.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-3.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-3.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-4.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Cerita Mereka</span>
                <h2 class="mb-4">Suara dari Penikmat Kopi</h2>
                <p>
                    Setiap cangkir punya kisahnya sendiri
                    tentang pagi yang kembali hangat,
                    tentang pertemuan yang tak sengaja,
                    atau sekadar jeda di tengah hari yang berat.
                </p>
            </div>
        </div>

    </div>
    <div class="container-wrap">
        <div class="row d-flex no-gutters">
            @foreach ($reviews as $review)
            <div class="col-md align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;
                            {{$review->review}}.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <!-- <div class="image mr-3 align-self-center">
							 <img src="{{ asset('assets/images/person_1.jpg') }}" alt=""> 
						</div> -->
                        <div class="name align-self-center">{{$review->name}}</div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>



<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection