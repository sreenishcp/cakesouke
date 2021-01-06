<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
	<!-- Title -->
	<title>:: CakeSouk ::</title>
    
	<!-- Favicon icon -->
    <link rel="icon" type="image/png" href="">
    
	<!-- Stylesheet -->
	<link href="{{asset("frontsearch/vendor/bootstrap-select/bootstrap-select.min.css")}}" rel="stylesheet">
	<link href="{{asset("frontsearch/vendor/animate/animate.css")}}" rel="stylesheet">
	
	<!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset("frontsearch/css/style.css")}}">
	<link class="skin" rel="stylesheet" href="{{asset("frontsearch/css/skin/skin-2.css")}}">

</head>
<body id="bg">
<div id="loading-area" class="loading-02"></div>
<div class="page-wraper">
	<!-- Header -->
	<header class="site-header mo-left header-transparent">
		<!-- Main Header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="container clearfix">
					<!-- Website Logo -->
					<div class="logo-header mostion">
						<a href="index.html"><img class="logo-2" src="{{asset("frontsearch/images/logo-white.png")}}" alt=""></a>
					</div>
					<!-- Nav Toggle Button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Extra Nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<a href="" class="btn btn-light rounded-xl shadow">Login</a> 
						</div>
					</div>
					<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<ul class="nav navbar-nav navbar">	
							<li><a href="javascript:void(0);"><span>Sign Up</span></a></li>
						</ul>
						<div class="dlab-social-icon">
							<ul>
								<li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
								<li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
								<li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
								<li><a class="fa fa-instagram" href="javascript:void(0);"></a></li>
							</ul>
						</div>		
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>
	<!-- Header End -->
	
	<div class="page-content bg-white">
		<div class="banner-two gradient">
			<div class="container">
				<div class="banner-inner">
					<img class="img1 move-2" src="{{asset("frontsearch/images/main-slider/slider2/pic3.png")}}" alt="">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="banner-content text-white">
								<h6 class="wow fadeInUp sub-title bgl-light text-white" data-wow-delay="0.5s">We are The Best</h6>
								<h1 class="wow fadeInUp m-b20" data-wow-delay="1s">Search your favourite restuarants near you</h1>
								{{ Form::open(['route' => 'search','files'=>true]) }}
									<span class="search-container">
										<input type="hidden" name="latitude" id="latitude" placeholder="Latitude" value="" ><br>
										<input type="hidden" name="longitude" id="longitude" placeholder="Longitude" value="" ><br>
										<input name="" onFocus="initializeAutocomplete()" id="locality" onFocus="geolocate()" type="text" class="form-control" placeholder="Enter your location">
										<button class="btn btn-search">Explore</button>
									</span>
								{!! Form::close() !!}

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dz-media">
				<img src="{{asset("frontsearch/images/main-slider/slider2/pic1.png")}}" class="move-2" alt="">
			</div>
		</div>


		<section class="content-inner-2" style="background-image: url({{asset("frontsearch/images/background/bg2.png")}}; background-size: contain; background-position: center; background-repeat: no-repeat;">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-5 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">

						<div class="section-head style-2 mb-4">
							<!-- <div class="dlab-separator style-1"></div> -->
							<h2 class="title m-t10">Behind The Story Of Slack CakeSouk</h2>
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					
					</div>


					<div class="col-lg-7">
						<div class="icon-bx-wraper style-3 left m-r100 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
							<div class="icon-bx-sm radius"> 
								<a href="javascript:void(0);" class="icon-cell">
									<i class="flaticon-idea"></i>
								</a> 
							</div>
							<div class="wraper-effect"></div>
							<div class="icon-content">
								<h4 class="dlab-title m-b15">No Minimum Order</h4>
								<p>Order in for yourself or for the group, with no restrictions on order value</p>
							</div>
						</div>
						<div class="icon-bx-wraper style-3 left m-l100 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
							<div class="icon-bx-sm radius"> 
								<a href="javascript:void(0);" class="icon-cell">
									<i class="flaticon-coding"></i>
								</a> 
							</div>
							<div class="wraper-effect"></div>
							<div class="icon-content">
								<h4 class="dlab-title m-b15">Live Order Tracking</h4>
								<p>Know where your order is at all times, from the restaurant to your doorstep</p>
							</div>
						</div>
						<div class="icon-bx-wraper style-3 left m-r100 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
							<div class="icon-bx-sm radius"> 
								<a href="javascript:void(0);" class="icon-cell">
									<i class="flaticon-rocket"></i>
								</a> 
							</div>
							<div class="wraper-effect"></div>
							<div class="icon-content">
								<h4 class="dlab-title m-b15">Lightning-Fast Delivery</h4>
								<p>Experience Swiggy's superfast delivery for food delivered fresh & on time</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- Footer -->
    <footer class="site-footer style-2" id="footer" style="background-image: url({{asset("frontsearch/images/background/bg4.png")}}">
		<div class="footer-top">
            <div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="widget widget_about">
							<div class="footer-logo">
								<a href="index.html"><img src="{{asset("frontsearch/images/logo-white.png")}}" alt=""/></a> 
							</div>
							<div class="widget widget_getintuch">
								<ul>
									<li>
										<i class="fa fa-phone gradient"></i>
										<span>+91 123-456-7890<br/>+91 987-654-3210</span> 
									</li>
									<li>
										<i class="fa fa-envelope gradient"></i> 
										<span>info@example.com <br/>info@example.com</span>
									</li>
									<!-- <li>
										<i class="fa fa-map-marker gradient"></i>
										<span>Marmora Road Chi Minh City, Vietnam</span>
									</li> -->
								</ul>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-2 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="widget widget_services">
							<h5 class="footer-title">Our links</h5>
							<ul>
								<li><a href="javascript:void(0);">About Us</a></li>
								<li><a href="javascript:void(0);">Services</a></li>
								<li><a href="javascript:void(0);">Team</a></li>
							</ul>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-3 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
						<div class="widget widget_services">
							<h5 class="footer-title">Contact</h5>
							<ul>
								<li><a href="javascript:void(0);">Help & Support</a></li>
								<li><a href="javascript:void(0);">Partner with us</a></li>
								<li><a href="javascript:void(0);">Ride with us</a></li>
							</ul>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-3 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
						<div class="widget widget_services">
						   <h5 class="footer-title">Legal</h5>
							<ul>
								<li><a href="javascript:void(0);">Terms & Conditions</a></li>
								<li><a href="javascript:void(0);">Privacy Policy</a></li>
								<li><a href="javascript:void(0);">Cookie Policy</a></li>
								<li><a href="javascript:void(0);">Support </a></li>
							</ul>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom part -->
	</footer>
	
    <!-- Footer End -->
	<button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{asset("frontsearch/js/jquery.min.js")}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset("frontsearch/vendor/wow/wow.js")}}"></script><!-- WOW JS -->
<script src="{{asset("frontsearch/vendor/bootstrap/js/bootstrap.min.js")}}"></script><!-- BOOTSTRAP.MIN JS -->

<script src="{{asset("frontsearch/js/custom.js")}}"></script><!-- CUSTOM JS -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAATLVjBD3GenK9FusTZNpr1zj1HIQ2QcM&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
    <script type="text/javascript">
  function initializeAutocomplete(){
    var input = document.getElementById('locality');
    var options = {}

    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      var placeId = place.place_id;
      // to set city name, using the locality param
      var componentForm = {
        locality: 'short_name',
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          
        }
      }
      document.getElementById("latitude").value	   = lat;
      document.getElementById("longitude").value   = lng;
      
    });
  }
</script>
</body>
</html>