@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">A Perfect Blend of Coffee and Comfort.</h1>
                    <p class="mb-4 mb-md-5">Dari aroma pertama hingga tegukan terakhir, setiap kopi punya cerita dan
                        ceritamu dimulai di sini.</p>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">Every Cup Has a Story.</h1>
                    <p class="mb-4 mb-md-5">Dari aroma pertama hingga tegukan terakhir, setiap kopi punya cerita dan
                        ceritamu dimulai di sini.</p>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">Brewed for Great Vibes.</h1>
                    <p class="mb-4 mb-md-5">Kopi segar, musik asik, dan teman terbaik karena hari baik dimulai dari
                        suasana yang menyenangkan.</p>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
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
                            <p>Jln. Jln. ke Bumiayu, jangan lupa beli baju</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Jam Buka</h3>
                            <p>Setiap Hari: 09.00 – 22.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="book p-4">
                <h3>Book a Table</h3>
                <form action="{{ route('booking.tables') }}" method="POST" class="appointment-form">
                    @csrf
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">

                        </div>
                        @if($errors->has('first_name'))
                        <p class="alert alert-success">{{ $errors->first('first_name') }}</p>
                        @endif

                        <div class="form-group ml-md-4">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        @if($errors->has('last_name'))
                        <p class="alert alert-success">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" name="date" class="form-control appointment_date" placeholder="Date">
                            </div>
                            @if($errors->has('date'))
                            <p class="alert alert-success">{{ $errors->first('date') }}</p>
                            @endif
                        </div>
                        <div class="form-group ml-md-4">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-ios-clock"></span></div>
                                <input type="text" name="time" class="form-control appointment_time" placeholder="Time">
                            </div>
                            @if($errors->has('time'))
                            <p class="alert alert-success">{{ $errors->first('time') }}</p>
                            @endif


                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"
                                class="form-control appointment_time">

                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        @if($errors->has('phone'))
                        <p class="alert alert-success">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <textarea id="" cols="30" name="message" rows="2" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        @if($errors->has('message'))
                        <p class="alert alert-success">{{ $errors->first('message') }}</p>
                        @endif
                        <div class="form-group ml-md-4">
                            <input type="submit" name="submit" value="Book" class="btn btn-white py-3 px-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url(images/about.jpg);"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate ">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Story</h2>
            </div>
            <div>
                <p>My Coffee lahir dari semangat untuk menghadirkan pengalaman menikmati kopi yang istimewa.
                    Kami memilih biji kopi terbaik dari berbagai daerah, diseduh dengan teknik yang penuh presisi, dan
                    disajikan dalam suasana yang nyaman dan elegan. Setiap cangkir yang kami hidangkan mencerminkan
                    dedikasi, cita rasa, dan kehangatan karena bagi kami, kopi bukan sekadar minuman, tapi pengalaman.
                    Karena setiap tegukan punya cerita.</p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-choices"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Easy to Order</h3>
                        <p>Pesan kopi favoritmu hanya dengan beberapa klik cepat dan tanpa ribet.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-delivery-truck"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Fastest Delivery</h3>
                        <p>Kami pastikan pesananmu tiba hangat dan tepat waktu ke tempatmu.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-coffee-bean"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Quality Coffee</h3>
                        <p>Dibuat dari biji pilihan dengan cita rasa premium untuk hari yang lebih baik.</p>
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
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Menu</h2>
                    <p class="mb-4">Setiap cangkir punya cerita. Kami sajikan kopi terbaik dengan cita rasa khas dan
                        suasana yang tenang untuk setiap momen istimewa.</p>
                    <p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
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
                                <strong class="number" data-number="5">0</strong>
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
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Best Coffee Sellers</h2>
                <p>Setiap tegukan punya cerita, dan setiap gigitan menyimpan kehangatan.
                    Nikmati menu pilihan yang jadi favorit para pecinta kopi kami.</p>
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


<<<<<<< HEAD
<<<<<<< HEAD
    <section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="row justify-content-center mb-5">
	        <div class="col-md-7 heading-section text-center ftco-animate">
	        	<span class="subheading">Testimony</span>
	          <h2 class="mb-4">Customers Says</h2>
	          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
=======
>>>>>>> c3ad37cf500cb4854db8ef33a4925f2295e0872f

<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Kata Mereka</h2>
                <p>Kami percaya rasa enak bukan cuma dari kopi, tapi juga dari pengalaman yang kamu rasakan di setiap
                    kunjungan. Ini kata mereka yang udah nyobain langsung.</p>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row d-flex no-gutters">
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_1.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Imron Sulistio<span class="position">Mahasiswa
                            </span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name of Lorem Ipsum
                            decided to leave for the far World of Grammar.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_2.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;kopijo. &rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_3.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_2.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_3.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


=======

<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Kata Mereka</h2>
                <p>Kami percaya rasa enak bukan cuma dari kopi, tapi juga dari pengalaman yang kamu rasakan di setiap
                    kunjungan. Ini kata mereka yang udah nyobain langsung.</p>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row d-flex no-gutters">
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_1.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name of Lorem Ipsum
                            decided to leave for the far World of Grammar.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_2.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_3.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_2.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_3.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


>>>>>>> c3ad37cf500cb4854db8ef33a4925f2295e0872f

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