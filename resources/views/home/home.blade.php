@extends('template')
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/daterangepicker.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/user-front.min.css') }}" />
    
@endpush

@section('main') 


	<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type') }}">
	   <section class="hero-banner magic-ball">
	                      
	                           <!--<h1 class="pt-4 text-center">{{ __('Make Your Reservation') }}</h1>-->
	                           
	                           <!--<div class="main-banner"  style="background-image: url('{{ getBanner() }}');">-->
		                              <div class="container">
			                              <form class="fixed-form" id="front-search-form" method="post" action="{{ url('search') }}">
                                             {{ csrf_field() }}
                                            <div class="row">
                                              <div class="d-flex">
                                                <div class="col">
                                                  <input class="text-12 pl-3" id="front-search-field" placeholder="{{ __('Where') }}" autocomplete="off" name="location" type="text" required>
                                                </div>
                                                <div class="d-flex" id="daterange-btn">
                                                    <div class="col">
                                                      <input class="  text-12 checkinout" name="checkin" id="startDate" type="text" placeholder="{{ __('Check In') }}" autocomplete="off" readonly="readonly" required>
                                                    </div>
                                                    <div class="col">
                                                      <label for="checkout-date" class="sr-only">Check-out Date</label>
                                                      <input class="  text-12 checkinout" name="checkout" id="endDate" placeholder="{{ __('Check Out') }}" type="text" readonly="readonly" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col">
                                               <select id="front-search-guests" name="guest" class="text-12">
                                                 <option class="p-2 text-12" value="1">1 {{ __('Guest') }}</option>
                                                 @for ($i=2;$i<=16;$i++)
                                                 <option class="p-4 text-12" value="{{ $i }}"> {{ ($i == '16') ? $i . '+ '.__('Guest') : $i . ' ' . __('Guests') }} </option>
                                                 @endfor
                                               </select>
                                             </div>
                                              <div class="col justify-content-end">
                                               <div class="col-auto ml-auto pl-5">
                                                 <button type="submit" class="btn vbtn-default text-16 rounded-circle pl-2"><i class="fas fa-search"></i></button>
                                               </div>
                                              </div>
                                              </div>
                                            </div>
                                        </form>
                        </div>
        			</div>
        		</div>
        	</section>
<script>
        	    document.addEventListener("scroll", function() {
                var fixedForm = document.querySelector('.fixed-form');
                var scrollPosition = window.scrollY;

                if (scrollPosition > 100) {
                    fixedForm.style.position = 'fixed';
                    fixedForm.style.top = '15px';
                } else {
                fixedForm.style.position = 'absolute';
                    fixedForm.style.top = '83px';
                }
                 });
        	</script>
<br>
<style>
  .pac-container {
    width: 300px !important; 
    max-width: 100% !important;
  }
  .pac-container.pac-logo {
    z-index: 1050;
  }
  @media (max-width: 480px) {
    .carousel-fixed {
      position: absolute;
      top: 165px;
      width: 100%;
      padding-bottom: 10px;
      padding-top: 10px;
      z-index: 1000;
      transition: top 0.3s;
    }
  }
  .fixed-form {
    position: absolute;
    top: 75px;
    left: 49%;
    transform: translateX(-50%);
    z-index: 1000;
    border-radius: 35px;
    border: 1px solid #dbcfcf;
    background-color: white;
    padding: 9px;
    transition: top 0.3s ease;
  }
  input.checkinout {
    padding: 0px !important;
    height: 40px;
  }
  .fixed-form input{
    border: none;
    outline: none;
    padding-top: 12px;
    box-shadow: none;
    width: 70px;
  }
  .fixed-form select {
    border: none;
    outline: none;
    padding-top: 12px;
    box-shadow: none;
    width: 85px;
  }
  /* this is most effective way to make responsive form using medea query */
  @media (max-width: 480px) {
    .fixed-form {
      /*top: 50px;*/
      left: 50%;
      border-radius: 35px;
      width: calc(100% - 20px); 
      padding: 5px; 
      transform: translateX(-50%);
      z-index: 1000;
      border-radius: 35px;
      background-color: white;
      padding: 9px;
      0 0px 30px rgb(203 195 211 / 50%);
      transition: top 0.3s ease;
    }
    input.checkinout {
      padding: 0px !important;
      height: 40px;
    }
    .fixed-form input{
      border: none;
      outline: none;
      padding-top: 12px;
      box-shadow: none;
      width: 60px;
    }
    .fixed-form select {
      border: none;
      background-color:none;
      outline: none;
      padding-top: 12px;
      box-shadow: none;
      width: 75px;
    }
  }
  .scrollable-gallery {
    display: flex;
    overflow-x: scroll;
    scroll-snap-type: x mandatory;
    padding: 10px;
    background-color: #fff;
  }
  .scrollable-gallery img {
    scroll-snap-align: start;
    flex: 0 0 auto;
    width: 50px;
    height: 50px;
    margin-right: 30px;
    margin-left: 30px;
    padding: 8px;
    border-radius: 5px;
    transition: transform 0.2s;
  }
  .scrollable-gallery img:hover {
    transform: scale(1.05);
  }
  .scrollable-gallery::-webkit-scrollbar {
    display: none;
  }
  .scrollable-gallery-container {
    padding-left: 40px;
    padding-right: 40px;
    position: relative;
    transition: top 0.3s ease;
  }
  .scroll-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #fff;
    border: none;
    cursor: pointer;
    /*padding: 10px;*/
    border-radius: 50%;
    z-index: 1;
  }
  .scroll-button-prev {
    left: 10px;
  }
  .scroll-button-next {
    right: 10px;
  }
  @media only screen and (max-width: 767px) {
    .scrollable-gallery img {
      width: 35px;
      height: 35px;
      margin-right: 20px;
      margin-left: 20px;
      padding: 8px;
    }
  }
  .fixed {
    position: fixed;
    top: 80px;
    left: 0;
    width: 100%;
    background-color: white;
    z-index: 1050;
    padding-left: 40px;
    padding-right: 40px;
  }
</style>

<br><br>
<hr>
<div class="scrollable-gallery-container" id="galleryContainer">
  <button class="scroll-button scroll-button-prev" onclick="scrollGalleryLeft()">
      <!--<i class="fas fa-chevron-left"></i>-->
      <img src="{{asset('public/images/prev.jpg')}}" class="" alt=""/>
      </button>
  <div class="scrollable-gallery text-center">
    @foreach($starting_cities as $city)
    <a href="{{ url('search?location=' . $city->name . '&checkin=&checkout=&guest=1') }}"> 
      <img src="{{ $city->image_url }}" alt="city"/>
      <div class="text-12">{{ $city->name }}</div>
    </a>
    @endforeach
  </div>
  <button class="scroll-button scroll-button-next" onclick="scrollGalleryRight()">
      <!--<i class="fas fa-chevron-right"></i>-->
      <img src="{{asset('public/images/next.jpg')}}" class="" alt=""/>
      </button>
</div>

<script>
  function scrollGalleryLeft() {
    //   console.log('Scroll left button clicked');
    const gallery = document.querySelector('.scrollable-gallery');
    if (gallery) {
      gallery.scrollBy({
        left: -200,
        behavior: 'smooth'
      });
      console.log('Scrolling left');
    } else {
      console.error('Gallery not found');
    }
  }

  function scrollGalleryRight() {
    //   console.log('Scroll right button clicked');
    const gallery = document.querySelector('.scrollable-gallery');
    if (gallery) {
      gallery.scrollBy({
        left: 200,
        behavior: 'smooth'
      });
      console.log('Scrolling right');
    } else {
      console.error('Gallery not found');
    }
  }

  window.addEventListener('scroll', function() {
    const galleryContainer = document.getElementById('galleryContainer');
    const fixedClass = 'fixed';
    const offset = 80;

    if (window.scrollY >= offset) {
      galleryContainer.classList.add(fixedClass);
    } else {
      galleryContainer.classList.remove(fixedClass);
    }
  });
</script>


@if (!$properties->isEmpty())
		<section class="recommandedbg bg-gray  magic-ball magic-ball-about pb-2">
			<div class="container-fluid container-fluid-90">
				<div class="row mt-1">
					@foreach ($properties as $property)
					<div class="col-md-6 col-lg-4 col-xl-3 pl-3 pr-3 pb-3 mt-4">
						<div class="card h-100 card-shadow card-1">
							<div class="grid">
								<a href="properties/{{ $property->slug }}" aria-label="{{ $property->name }}">
									<figure class="effect-milo">
										<img src="{{ $property->cover_photo }}" class="room-image-container200" alt="{{ $property->name }}"/>
										<figcaption>
										</figcaption>
									</figure>
								</a>
							</div>

							<div class="card-body p-0 pl-1 pr-1">
								<div class="d-flex">
									<div>
										<div class="profile-img pl-2">
											<a href="{{ url('users/show/' . $property->host_id) }}"><img src="{{ $property->users->profile_src }}" alt="{{ $property->name }}" class="img-fluid"></a>
										</div>
									</div>

									<div class="p-2 text">
										<a class="text-color text-color-hover" href="properties/{{ $property->slug }}">
											<p class="text-16 font-weight-700 text"> {{ $property->name }}</p>
										</a>
										<p class="text-13 mt-2 mb-0 text"><i class="fas fa-map-marker-alt"></i> {{ $property->property_address->city }}</p>
									</div>
								</div>

								<div class="review-0 p-3">
									<div class="d-flex justify-content-between">

										<div class="d-flex">
                                            <div class="d-flex align-items-center">
											<span><i class="fa fa-star text-14 secondary-text-color"></i>
												@if ( $property->guest_review)
                                                    {{ $property->avg_rating }}
                                                @else
                                                    0
                                                @endif
                                                ({{ $property->guest_review }})</span>
                                            </div>

                                            <div class="">
                                                @auth
                                                    <a class="btn btn-sm book_mark_change"
                                                       data-status="{{ $property->book_mark }}" data-id="{{ $property->id }}"
                                                       style="color:{{ ($property->book_mark == true) ? '#1dbf73':'' }}; ">
                                                    <span style="font-size: 22px;">
                                                        <i class="fas fa-heart pl-2"></i>
                                                    </span>
                                                    </a>
												@else
													<a class="btn btn-sm book_mark_change" data-id="{{ $property->id }}"
														style="color:#1dbf73 }}; ">
														<span style="font-size: 22px;">	
															<i class="fas fa-heart pl-2"></i>
														</span>
													</a>
                                                @endauth
                                            </div>
                                        </div>


										<div>
											<span class="font-weight-700">{!! moneyFormat( $property->property_price->default_symbol, $property->property_price->price) !!}</span> / {{ __('night') }}
										</div>
									</div>
								</div>

								<div class="card-footer text-muted p-0 border-0">
									<div class="d-flex bg-white justify-content-between pl-2 pr-2 pt-2 mb-3">
										<div>
											<ul class="list-inline">
												<li class="list-inline-item  pl-4 pr-4 border rounded-3 mt-2 bg-light text-dark">
														<div class="vtooltip"> <i class="fas fa-user-friends"></i> {{ $property->accommodates }}
														<span class="vtooltiptext text-14">{{ $property->accommodates }} {{ __('Guests') }}</span>
													</div>
												</li>

												<li class="list-inline-item pl-4 pr-4 border rounded-3 mt-2 bg-light">
													<div class="vtooltip"> <i class="fas fa-bed"></i> {{ $property->bedrooms }}
														<span class="vtooltiptext  text-14">{{ $property->bedrooms }} {{ __('Bedrooms') }}</span>
													</div>
												</li>

												<li class="list-inline-item pl-4 pr-4 border rounded-3 mt-2 bg-light">
													<div class="vtooltip"> <i class="fas fa-bath"></i> {{ $property->bathrooms }}
														<span class="vtooltiptext  text-14 p-2">{{ $property->bathrooms }} {{ __('Bathrooms') }}</span>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (!$testimonials->isEmpty())
	<section class="testimonialbg pb-70">
		<div class="testimonials">
			<div class="container">
				<div class="row">
					<div class="recommandedhead section-intro text-center mt-70">
						<p class="animated fadeIn text-24 text-color font-weight-700 m-0">{{ __('Say about Us') }}</p>
						<p class="mt-2">{{ __('People Say The Nicest Things') }}</p>
					</div>
				</div>

				<div class="row mt-5">
					@foreach ($testimonials as $testimonial)
					<?php $i = 0; ?>
						<div class="col-md-4 mt-4">
							<div class="item h-100 card-1">
								<img src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}">
								<div class="name">{{ $testimonial->name }}</div>
									<small class="desig">{{ $testimonial->designation }}</small>
									<p class="details">{{ substr($testimonial->description, 0, 200) }} </p>
									<ul>
										@for ($i = 0; $i < 5; $i++)
											@if ($testimonial->review >$i)
												<li><i class="fa fa-star secondary-text-color" aria-hidden="true"></i></li>
											@else
												<li><i class="fa fa-star rating" aria-hidden="true"></i></li>
											@endif
										@endfor
									</ul>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	@endif
@stop

@section('validation_script')
	<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyBr19LnTnibP2lPEUvDzo3iq71sUdPYhaY&libraries=places'></script>
	<script type="text/javascript" src="{{ asset('public/js/moment.min.js') }}"></script>
	<script src="{{ asset('public/js/sweetalert.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/js/daterangepicker.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/js/daterangecustom.js') }}"></script>
    <script type="text/javascript">
        'use strict'
        var success = "{{ __('Success') }}";
        var yes = "{{ __('Yes') }}";
        var no = "{{ __('No') }}";
        var user_id = "{{ Auth::id() }}";
        var token = "{{ csrf_token() }}";
        var add = "{{ __('Add to Favourite List ?') }}";
        var remove = "{{ __('Remove from Favourite List ?') }}";
        var added = "{{ __('Added to favourite list.') }}";
        var removed = "{{ __('Removed from favourite list.') }}";
        var dateFormat = '{{ $date_format }}';
		const BaseURL = '{{ url("/") }}';
    </script>
    <script src="{{ asset('public/js/front.min.js') }}"></script>
    
@endsection

