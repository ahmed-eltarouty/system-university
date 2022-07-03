<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Benha University System</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Studies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
    <link rel="stylesheet" type="text/css"
          href="{{asset('css/bootstrap.css')}}">
	<!-- Bootstrap-Core-CSS -->
	<link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">
	<!-- banner slider -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext"
	 rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>


	<!-- header 2 -->
	<!-- navigation -->
	<div class="main-top">
		<div class="container d-lg-flex">
            <div class="row">
                <!-- logo -->
                <h1 class="logo-style-res float-left ">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logo.png" alt="Benha Uni" class="img-fluid logo-img mt-1" style="width: 3em">University <span style="bottom:6px;right:20%"> system</span>
                    </a>
                </h1>
                <!-- //logo -->
            </div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- //header 2 -->

	<!-- banner -->
	<div class="banner_w3lspvt ">
		<div class="csslider infinity" id="slider1">
			<input type="radio" name="slides" checked="checked" id="slides_1" />
			<ul class="banner banner1">
				<li class="banner-top1">
					<div class="container">
						<div class="banner-info_w3ls " >
							<h5 class="text-li ml-5 " >Welcome to</h5>
							<h3 class="text-wh font-weight-bold mt-3 mb-5 text-dark">Benha University <br> System </h3>
							<p class="ml-5 text-dark"> Get started now </p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- //banner -->

	<!-- banner bottom grids -->
	<section class="about-bottom" id="services">
		<div class="container pb-lg-4">
			<div class="row bg-colors text-center">
				<div class="col-md-4 service-subgrids">
                    <a href="{{route('login')}}">
                        <div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
                            <h4 class="text-wh font-weight-bold mb-3">Student Login</h4>
                            <p class="text-li"> register your subjects  </p>
                        </div>
                    </a>
					<span class="fa fa-users" aria-hidden="true"></span>
				</div>
				<div class="col-md-4 service-subgrids bg-li">
                    <a href="{{route('supervisor.login')}}">
                        <div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
                            <h4 class="text-bl font-weight-bold mb-3">Supervisor Login</h4>
                            <p class="text-secondary">Check your students </p>
                        </div>
                    </a>
					<span class="fa fa-linode" aria-hidden="true"></span>
				</div>
				<div class="col-md-4 service-subgrids">
                    <a href="{{route('admin.login')}}">
                        <div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
                            <h4 class="text-wh font-weight-bold mb-3">Admin Login</h4>
                            <p class="text-li"> For Admins only </p>
                        </div>
                    </a>
					<span class="fa fa-book" aria-hidden="true"></span>
				</div>
			</div>

		</div>
	</section>
	<!-- //banner bottom grids -->


</body>

</html>
