<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Estrategias Inmobiliarias S.A.S.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->

    <!-- Favicons -->

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('asset/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('asset/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('asset/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('asset/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('asset/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('asset/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('asset/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('asset/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('asset/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('asset/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('asset/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- Template CSS Files -->
    <link href="{{ asset('asset/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/front/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/front/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/front/css/skins/blue.css')}}" rel="stylesheet">

    <!-- Revolution Slider CSS Files -->
    <link href="{{ asset('asset/front/css/settings.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/front/css/layers.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/front/css/navigation.css')}}" rel="stylesheet">


    <!-- Template JS Files -->
    {!! Html::script('asset/front/js/modernizr.js', array('type' => 'text/javascript')) !!}

</head>

<body class="skew">
    <!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="logopreloader">
            <img src="http://via.placeholder.com/159x28" alt="logo">
        </div>
        <div class="loader" id="loader"></div>
    </div>
    <!-- Preloader Ends -->
    <!-- Page Wrapper Starts -->
    <div class="wrapper">
        <!-- Header Starts -->
        <header class="header">
            <div class="header-inner">
                <!-- Navbar Starts -->
                <nav class="navbar">
                    <!-- Logo Starts -->
                    <div class="logo">
                        <a data-toggle="collapse" data-target=".navbar-collapse.show" class="navbar-brand" href="index-vimeo.html">
                            <!-- Logo White Starts -->
                            <img id="logo-light" class="logo-light" src="http://via.placeholder.com/159x28" alt="logo-light" />
                            <!-- Logo White Ends -->
                            <!-- Logo Black Starts -->
                            <img id="logo-dark" class="logo-dark" src="http://via.placeholder.com/159x28" alt="logo-dark" />
                            <!-- Logo Black Ends -->
                        </a>
                    </div>
                    <!-- Logo Ends -->
					<!-- Toggle Icon for Mobile Starts -->
					<button class="navbar-toggle navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span id="icon-toggler">
						  <span></span>
						  <span></span>
						  <span></span>
						  <span></span>
						</span>
					</button>
					<!-- Toggle Icon for Mobile Ends -->
					<div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
						<!-- Main Menu Starts -->
						<ul class="nav navbar-nav" id="main-navigation">
							<li class="active"><a href="index-vimeo.html"><i class="fa fa-home"></i> Home</a></li>
							<li><a href="about.html"><i class="fa fa-user"></i> Quienes Somos</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-image"></i> portafolio <i class="fa fa-angle-down icon-angle"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="portfolio-2-columns.html">Portfolio 2 Columns</a></li>
									<li><a href="portfolio-3-columns.html">Portfolio 3 Columns</a></li>
									<li><a href="portfolio-4-columns.html">Portfolio 4 Columns</a></li>
									<li><a href="image-project.html">Image Project</a></li>
									<li><a href="slider-project.html">Slider Project</a></li>
									<li><a href="gallery-project.html">Gallery Project</a></li>
									<li><a href="video-project.html">Video project</a></li>
									<li><a href="youtube-project.html">youtube Project</a></li>
									<li><a href="vimeo-project.html">Vimeo Project</a></li>
								</ul>
							</li>


							<li><a href="contact.html"><i class="fa fa-envelope"></i> Contáctenos</a></li>
                            <li><a href="/inicio"><i class="fa fa-envelope"></i> Iniciar Sesión</a></li>

							<!-- Search Icon Ends -->
						</ul>
						<!-- Main Menu Ends -->
					</div>
					<!-- Search Input Starts -->
					<div class="site-search hidden-xs">
						<div class="search-container">
							<input id="search-input" type="text" placeholder="type your keyword and hit enter ...">
							<span class="close">×</span>
						</div>
					</div>
					<!-- Search Input Ends -->
                    <!-- Navigation Menu Ends -->
                </nav>
                <!-- Navbar Ends -->
            </div>
        </header>
        <!-- Header Ends -->
        <!-- Main Slider Section Starts -->
        <section class="mainslider" id="mainslider">
            <!-- Slider Hero Starts -->
            <div class="rev_slider_wrapper fullwidthbanner-container dark-slider" data-alias="vimeo-hero" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
                <div id="rev_slider_vimeo" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-index="rs-266" data-transition="zoomout" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="3000" data-thumb="../../assets/images/vimeobg-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Intro" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="http://via.placeholder.com/1920x1280" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- BACKGROUND VIDEO LAYER -->
                            <div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute" data-vimeoid="63103861" data-videoattributes="title=0&amp;byline=0&amp;portrait=0&amp;api=1" data-videowidth="100%" data-videoheight="100%" data-videocontrols="none" data-videostartat="00:00" data-videoendat="00:48" data-videoloop="loop" data-forceCover="1" data-aspectratio="4:3" data-autoplay="true" data-autoplayonlyfirsttime="false" data-nextslideatend="true"></div>
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap;">ESTRATEGIAS INMOBILIARIAS
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; white-space: nowrap;">M I C H U
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption NotGeneric-Icon   tp-resizeme rs-parallaxlevel-0" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-style_hover="cursor:default;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;"><i class="pe-7s-refresh"></i>
                            </div>
                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['150','150','150','150']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);" data-transform_in="y:100px;sX:1;sY:1;opacity:0;s:2000;e:Power3.easeInOut;" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;" data-start="750" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off" style="z-index: 11; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="#about" class="custom-button slider-button scroll-to-target">learn more about us</a></div>
                        </li>
                    </ul>
                    <div class="tp-static-layers"></div>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->
            <!-- Slider Hero Ends -->
        </section>
        <!-- Main Slider Section Ends -->
        <!-- About Section Starts -->
        <section id="about" class="about">
            <!-- Container Starts -->
            <div class="container">
                <!-- Main Heading Starts -->
                <div class="text-center top-text">
                    <h1><span>Quienes</span> Somos</h1>
                    <h4>Who We Are</h4>
                </div>
                <!-- Main Heading Ends -->
                <!-- Divider Starts -->
                <div class="divider text-center">
                    <span class="outer-line"></span>
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <span class="outer-line"></span>
                </div>
                <!-- Divider Ends -->
                <!-- About Content Starts -->
                <div class="row about-content">
                    <div class="col-sm-12 col-md-6 col-lg-6 about-left-side">
                        <h3 class="title-about">WE ARE <strong>AMIRA</strong></h3>
                        <hr>
                        <p>We are a leading company sit amet, consectetur adipisicing elit. Minus obcaecati pariatur officiis molestias eveniet harum laudantium obcaecati pariatur officiis molestias eveniet harum laudantium sed optio iste. </p>
                        <!-- Tabs Heading Starts -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                            <li><a data-toggle="tab" href="#menu2">Our advantages</a></li>
                            <li><a data-toggle="tab" href="#menu3">Our guarantees</a></li>
                        </ul>
                        <!-- Tabs Heading Ends -->
                        <!-- Tabs Content Starts -->
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <p>Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                            </div>
                        </div>
                        <!-- Tabs Content Ends -->
                        <a class="custom-button" href="about.html">Learn more about us</a>
                    </div>
                    <div class="col-md-6 col-lg-6 about-right-side">
                        <div class="full-image-container hovered">
                            <img class="img-responsive hidden-xs" src="http://via.placeholder.com/1024x681" alt="">
                            <div class="full-image-overlay">
                                <h3>Why <strong>Choose Us</strong></h3>
                                <ul class="list-why-choose-us">
                                    <li>Clean Code & Design</li>
                                    <li>Responsive Layout</li>
                                    <li>Powerful Documentation</li>
                                    <li>Browser Compatibility</li>
                                    <li>Easy Customization</li>
                                    <li>& Much More ...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content Ends -->
            </div>
            <!-- Container Ends -->
        </section>
        <!-- About Section Ends -->
        <!-- Video Section Starts -->
        <section class="videopromotion">
            <div class="section-overlay">
                <!-- Container Starts -->
                <div class="container">
                    <!-- Main Heading Starts -->
                    <div class="text-center top-text">
                        <h1><span>Video</span> Promo</h1>
                        <h4>Made with love for you</h4>
                    </div>
                    <!-- Main Heading Ends -->
                    <div class="video-content">
                        <p class="text-center">See Amira like you've never seen it before! Watch our new promo video,<br> and discover just what an Amira membership can do for you!</p>
                        <!-- Video Play Starts -->
                        <div class="magnific-popup-gallery">
                            <div class="btn-wrapper text-center"><a class="image-wrap mfp-youtube" href="https://www.youtube.com/watch?v=0gv7OC9L2s8"></a></div>
                        </div>
                        <!-- Video Play Ends -->
                    </div>
                </div>
                <!-- Container Ends -->
            </div>
        </section>
        <!-- Video Section Ends -->
        <!-- Services Section Starts -->
        <section class="services">
            <!-- Container Starts -->
            <div class="container">
                <!-- Main Heading Starts -->
                <div class="text-center top-text">
                    <h1><span>Our</span> Services</h1>
                    <h4>What We Doing</h4>
                </div>
                <!-- Main Heading Starts -->
                <!-- Divider Starts -->
                <div class="divider text-center">
                    <span class="outer-line"></span>
                    <span class="fa fa-cogs" aria-hidden="true"></span>
                    <span class="outer-line"></span>
                </div>
                <!-- Divider Ends -->
                <!-- Services Starts -->
                <div class="row services-box">
                    <!-- Service Item Starts -->
                    <div class="col-lg-4 col-md-6 col-sm-12 services-box-item">
                        <!-- Service Item Cover Starts -->
                        <span class="services-box-item-cover fa fa-leaf" data-headline="Creative Solutions"></span>
                        <!-- Service Item Cover Ends -->
                        <!-- Service Item Content Starts -->
                        <div class="services-box-item-content fa fa-leaf">
                            <h2>Creative Solutions</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                        </div>
                        <!-- Service Item Content Ends -->
                    </div>
                    <!-- Service Item Ends -->

                    <!-- Service Item Starts -->
                    <div class="col-lg-4 col-md-6 col-sm-12 services-box-item">
                        <!-- Service Item Cover Starts -->
                        <span class="services-box-item-cover fa fa-anchor" data-headline="Featured Services"></span>
                        <!-- Service Item Cover Ends -->
                        <!-- Service Item Content Starts -->
                        <div class="services-box-item-content fa fa-anchor">
                            <h2>Featured Services</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                        </div>
                        <!-- Service Item Content Ends -->
                    </div>
                    <!-- Service Item Ends -->

                    <!-- Service Item Starts -->
                    <div class="col-lg-4 col-md-6 col-sm-12 services-box-item">
                        <!-- Service Item Cover Starts -->
                        <span class="services-box-item-cover fa fa-comments-o" data-headline="Custom Design"></span>
                        <!-- Service Item Cover Ends -->
                        <!-- Service Item Content Starts -->
                        <div class="services-box-item-content fa fa-comments-o">
                            <h2>Custom Design</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                        </div>
                        <!-- Service Item Content Ends -->
                    </div>
                    <!-- Service Item Ends -->

                    <!-- Service Item Starts -->
                    <div class="col-lg-4 col-md-6 col-sm-12 services-box-item">
                        <!-- Service Item Cover Starts -->
                        <span class="services-box-item-cover fa fa-support" data-headline="Technical Support"></span>
                        <!-- Service Item Cover Ends -->
                        <div class="services-box-item-content fa fa-support">
                            <h2>Technical Support</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                        </div>
                    </div>
                    <!-- Service Item Ends -->

                    <!-- Service Item Starts -->
                    <div class="col-lg-4 col-md-6 col-sm-12 services-box-item">
                        <!-- Service Item Cover Starts -->
                        <span class="services-box-item-cover fa fa-cogs" data-headline="Responsive Design"></span>
                        <!-- Service Item Cover Ends -->
                        <!-- Service Item Content Starts -->
                        <div class="services-box-item-content fa fa-cogs">
                            <h2>Responsive Design</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                        </div>
                        <!-- Service Item Content Ends -->
                    </div>
                    <!-- Service Item Ends -->

                    <!-- Service Item Starts -->
                    <div class="col-lg-4 col-md-6 col-sm-12 services-box-item">
                        <!-- Service Item Cover Starts -->
                        <span class="services-box-item-cover fa fa-file-pdf-o" data-headline="Well Documented"></span>
                        <!-- Service Item Cover Ends -->
                        <!-- Service Item Content Starts -->
                        <div class="services-box-item-content fa fa-file-pdf-o">
                            <h2>Well Documented</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                        </div>
                        <!-- Service Item Content Ends -->
                    </div>
                    <!-- Service Item Ends -->

                </div>
                <!-- Services Ends -->
            </div>
        </section>
        <!-- Services Section Ends -->
        <!-- Testimonials Section Starts -->
        <section class="testimonials">
            <div class="section-overlay">
                <!-- Container Starts -->
                <div class="container">
                    <!-- Main Heading Starts -->
                    <div class="text-center top-text">
                        <h1><span>Happy</span> Customers</h1>
                        <h4>Testimonials</h4>
                    </div>
                    <!-- Main Heading Starts -->
                    <!-- Blockquotes Starts -->
                    <div id="quote-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper For Sliders Starts -->
                        <!-- Indicators Starts -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Indicators Ends -->
                        <div class="carousel-inner">
                            <!-- Quote #1 Starts -->
                            <div class="item active">
                                <blockquote>
                                    <img class="img-circle img-responsive" src="http://via.placeholder.com/112x112" alt="client">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu nt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptat</p>
                                    <h5>Miss Elina Pool</h5>
                                    <h6>Developer - Adobe</h6>
                                </blockquote>
                            </div>
                            <!-- Quote #1 Ends -->
                            <!-- Quote #2 Starts -->
                            <div class="item">
                                <blockquote>
                                    <img class="img-circle img-responsive" src="http://via.placeholder.com/112x112" alt="client">
                                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                                    <h5>Mr. Antoine Varane</h5>
                                    <h6>Manager - Twitter</h6>
                                </blockquote>
                            </div>
                            <!-- Quote #2 Ends -->
                            <!-- Quote #3 Starts -->
                            <div class="item">
                                <blockquote>
                                    <img class="img-circle img-responsive" src="http://via.placeholder.com/112x112" alt="client">
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                    <h5>Miss Lucy Walker</h5>
                                    <h6>Manager - Envato</h6>
                                </blockquote>
                            </div>
                            <!-- Quote #3 Ends -->
                        </div>
                        <!-- Wrapper For Sliders Ends -->
                    </div>
                    <!-- Blockquotes Ends -->
                </div>
                <!-- Container Ends -->
            </div>
        </section>
        <!-- Testimonials Section Ends -->
        <!-- Portfolio Section Starts -->
        <section class="portfolio">
            <!-- Container Starts -->
            <div class="container">
                <!-- Main Heading Starts -->
                <div class="text-center top-text">
                    <h1><span>Our</span> Portfolio</h1>
                    <h4>Our latest Works</h4>
                </div>
                <!-- Main Heading Starts -->
                <!-- Divider Starts -->
                <div class="divider text-center">
                    <span class="outer-line"></span>
                    <span class="fa fa-image" aria-hidden="true"></span>
                    <span class="outer-line"></span>
                </div>
                <!-- Divider Ends -->
                <!-- Filter Wrapper Starts -->
                <nav>
                    <ul class="simplefilter nav nav-pills">
                        <!-- Filter Wrapper Items Starts -->
                        <li class="active" data-filter="all"><i class="fa fa-reorder"></i> All Projects</li>
                        <li data-filter="1">Images</li>
                        <li data-filter="2">Videos</li>
                        <li data-filter="3">External Links</li>
                        <!-- Filter Wrapper Items Ends -->
                    </ul>
                </nav>
                <!-- Filter Wrapper Ends -->
                <div>
                    <div class="filtr-container">
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="1">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap" href="http://via.placeholder.com/700x470" data-gal="magnific-pop-up[image]" title="Image project"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Image Project" /><span class="zoom-icon"></span></a>
                                </figure>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="image-project.html">
                                        <h3>Single Image</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="image-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="2">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap mfp-youtube" href="https://www.youtube.com/watch?v=0gv7OC9L2s8"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Gallery project" /><span class="zoom-icon video-icon"></span></a>
                                </figure>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="youtube-project.html">
                                        <h3>Youtube Video</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="youtube-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="1">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap" href="http://via.placeholder.com/700x470" data-gal="magnific-pop-up[gallery]" title="Gallery project"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Gallery project" /><span class="zoom-icon gallery-icon"></span></a>
                                </figure>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="gallery-project.html">
                                        <h3>Gallery Photos</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="gallery-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="3">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap" href="image-project.html" title="portfolio"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="portfolio" /><span class="zoom-icon external-icon"></span></a>
                                </figure>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="image-project.html">
                                        <h3>External Link</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="image-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="1">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap" href="http://via.placeholder.com/700x470" data-gal="magnific-pop-up[image]" title="Image project"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Image Project" /><span class="zoom-icon"></span></a>
                                </figure>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="image-project.html">
                                        <h3>Single Image</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="image-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="2">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap mfp-youtube" href="https://www.youtube.com/watch?v=O_C5CN1L3Xo"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Gallery project" /><span class="zoom-icon video-icon"></span></a>
                                </figure>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="youtube-project.html">
                                        <h3>Youtube Video</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="youtube-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="1">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap" href="http://via.placeholder.com/700x470" data-gal="magnific-pop-up[image]" title="Image project"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Image Project" /><span class="zoom-icon"></span></a>
                                </figure>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="image-project.html">
                                        <h3>Single Image</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="image-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="2">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap mfp-vimeo" href="https://vimeo.com/23534361"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Gallery project" /><span class="zoom-icon video-icon"></span></a>
                                </figure>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="vimeo-project.html">
                                        <h3>Vimeo Video</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="vimeo-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                        <!-- Project Starts -->
                        <div class="col-xs-12 col-sm-4 col-md-4 filtr-item" data-category="1">
                            <div class="magnific-popup-gallery">
                                <!-- Thumbnail Starts -->
                                <figure class="thumbnail thumbnail__portfolio">
                                    <a class="image-wrap" href="http://via.placeholder.com/700x470" data-gal="magnific-pop-up[gallery]" title="Slider project"><img class="img-responsive" src="http://via.placeholder.com/700x470" alt="Slider project" /><span class="zoom-icon gallery-icon"></span></a>
                                </figure>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <a href="http://via.placeholder.com/700x470" title="Gallery project" data-gal="magnific-pop-up[gallery]" style="display:none;"></a>
                                <!-- Thumbnail Ends -->
                                <!-- Caption Starts -->
                                <div class="caption">
                                    <a class="title-link" href="slider-project.html">
                                        <h3>slider project</h3>
                                    </a>
                                    <p>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    <a class="custom-button" href="slider-project.html">Read More</a>
                                </div>
                                <!-- Caption Ends -->
                            </div>
                        </div>
                        <!-- Project Ends -->
                    </div>
                </div>
            </div>
            <!-- Container Ends -->
        </section>
        <!-- Portfolio Section Ends -->
        <!-- Facts Section Starts -->
        <section class="facts">
            <div class="section-overlay">
                <!-- Container Starts -->
                <div class="container">
                    <!-- Main Heading Starts -->
                    <div class="text-center top-text">
                        <h1><span>Cool</span> Facts</h1>
                        <h4>our numbers</h4>
                    </div>
                    <!-- Main Heading Starts -->
                    <!-- Fact Badges Starts -->
                    <div class="fact-badges">
                        <div class="row">
                            <!-- Fact Badge Item Starts -->
                            <div class="col-md-3 col-sm-6">
                                <i class="fa fa-briefcase"></i>
                                <h2>
                                    <span><strong class="badges-counter">76</strong>+</span>
                                </h2>
                                <h4>Projects</h4>
                            </div>
                            <!-- Fact Badge Item Ends -->
                            <!-- Fact Badge Item Starts -->
                            <div class="col-md-3 col-sm-6">
                                <i class="fa fa-clock-o"></i>
                                <h2>
                                    <span><strong class="badges-counter">90</strong>+</span>
                                </h2>
                                <h4>Hours Work</h4>
                            </div>
                            <!-- Fact Badge Item Ends -->
                            <!-- Fact Badge Item Starts -->
                            <div class="col-md-3 col-sm-6">
                                <i class="fa fa-home"></i>
                                <h2>
                                    <span><strong class="badges-counter">18</strong>+</span>
                                </h2>
                                <h4>Offices</h4>
                            </div>
                            <!-- Fact Badge Item Ends -->
                            <!-- Fact Badge Item Starts -->
                            <div class="col-md-3 col-sm-6">
                                <i class="fa fa-user"></i>
                                <h2>
                                    <span><strong class="badges-counter">67</strong>+</span>
                                </h2>
                                <h4>Clients</h4>
                            </div>
                            <!-- Fact Badge Item Ends -->
                        </div>
                    </div>
                    <!-- Fact Badges Ends -->
                </div>
                <!-- Container Ends -->
            </div>
        </section>
        <!-- facts Section Ends -->
        <!-- Pricing Starts -->
        <section class="pricing">
            <div class="container">
                <!-- Main Heading Starts -->
                <div class="text-center top-text">
                    <h1><span>affordable</span> packages</h1>
                    <h4>our prices</h4>
                </div>
                <!-- Main Heading Starts -->
                <!-- Divider Starts -->
                <div class="divider text-center">
                    <span class="outer-line"></span>
                    <span class="fa fa-dollar" aria-hidden="true"></span>
                    <span class="outer-line"></span>
                </div>
                <!-- Divider Ends -->
                <!-- Section Content Starts -->
                <div class="row pricing-tables-content">
                    <div class="pricing-container">
                        <!-- Pricing Switcher Starts -->
                        <div class="pricing-switcher">
                            <p>
                                <input type="radio" name="switch" value="monthly" id="monthly-1" checked>
                                <label for="monthly-1">MONTHLY</label>
                                <input type="radio" name="switch" value="yearly" id="yearly-1">
                                <label for="yearly-1">YEARLY</label>
                                <span class="switch"></span>
                            </p>
                        </div>
                        <!-- Pricing Switcher Ends -->
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert">
                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <ul class="pricing-wrapper">
                                    <!-- Monthly Pricing Table #1 Starts -->
                                    <li data-type="monthly" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>bronze</h2>
                                            <div class="price-content">
                                                <span class="currency">$</span>
                                                <span class="value">100</span>
                                                <span class="duration">mo</span>
                                            </div>
                                        </header>
                                        <div class="pricing-body">
                                            <ul class="pricing-features">
                                                <li><em>1 GB</em> disk space</li>
                                                <li><em>2</em> email accounts</li>
                                                <li><em>unlimited</em> subomains</li>
                                            </ul>
                                        </div>
                                        <footer class="pricing-footer">
                                            <a class="custom-button" href="#">add to cart</a>
                                        </footer>
                                    </li>
                                    <!-- Monthly Pricing Table #1 Ends -->
                                    <!-- Yearly Pricing Table #1 Starts -->
                                    <li data-type="yearly" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>bronze</h2>
                                            <div class="price-content">
                                                <span class="currency">$</span>
                                                <span class="value">360</span>
                                                <span class="duration">yr</span>
                                            </div>
                                        </header>
                                        <div class="pricing-body">
                                            <ul class="pricing-features">
                                                <li><em>10 GB</em> disk space</li>
                                                <li><em>100</em> email accounts</li>
                                                <li><em>unlimited</em> subomains</li>
                                            </ul>
                                        </div>
                                        <footer class="pricing-footer">
                                            <a class="custom-button" href="#">add to cart</a>
                                        </footer>
                                    </li>
                                    <!-- Yearly Pricing Table #1 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <ul class="pricing-wrapper">
                                    <!-- Monthly Pricing Table #2 Starts -->
                                    <li data-type="monthly" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>silver</h2>
                                            <div class="price-content">
                                                <span class="currency">$</span>
                                                <span class="value">300</span>
                                                <span class="duration">mo</span>
                                            </div>
                                        </header>
                                        <div class="pricing-body">
                                            <ul class="pricing-features">
                                                <li><em>3 GB</em> disk space</li>
                                                <li><em>5</em> email accounts</li>
                                                <li><em>unlimited</em> subomains</li>
                                            </ul>
                                        </div>
                                        <footer class="pricing-footer">
                                            <a class="custom-button" href="#">add to cart</a>
                                        </footer>
                                    </li>
                                    <!-- Monthly Pricing Table #2 Ends -->
                                    <!-- Yearly Pricing Table #2 Starts -->
                                    <li data-type="yearly" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>silver</h2>
                                            <div class="price-content">
                                                <span class="currency">$</span>
                                                <span class="value">599</span>
                                                <span class="duration">yr</span>
                                            </div>
                                        </header>
                                        <div class="pricing-body">
                                            <ul class="pricing-features">
                                                <li><em>100 GB</em> disk space</li>
                                                <li><em>unlimited</em> email accounts</li>
                                                <li><em>unlimited</em> subomains</li>
                                            </ul>
                                        </div>
                                        <footer class="pricing-footer">
                                            <a class="custom-button" href="#">add to cart</a>
                                        </footer>
                                    </li>
                                    <!-- Yearly Pricing Table #2 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <ul class="pricing-wrapper">
                                    <!-- Monthly Pricing Table #3 Starts -->
                                    <li data-type="monthly" class="is-visible">
                                        <div class="badge-popular">
                                            <span class="popular">POPULAR</span>
                                        </div>
                                        <header class="pricing-header">
                                            <h2>gold</h2>
                                            <div class="price-content">
                                                <span class="currency">$</span>
                                                <span class="value">500</span>
                                                <span class="duration">mo</span>
                                            </div>
                                        </header>
                                        <div class="pricing-body">
                                            <ul class="pricing-features">
                                                <li><em>5 GB</em> disk space</li>
                                                <li><em>10</em> email accounts</li>
                                                <li><em>unlimited</em> subomains</li>
                                            </ul>
                                        </div>
                                        <footer class="pricing-footer">
                                            <a class="custom-button" href="#">add to cart</a>
                                        </footer>
                                    </li>
                                    <!-- Monthly Pricing Table #3 Ends -->
                                    <!-- Yearly Pricing Table #3 Starts -->
                                    <li data-type="yearly" class="is-hidden">
                                        <div class="badge-popular">
                                            <span class="popular">POPULAR</span>
                                        </div>
                                        <header class="pricing-header">
                                            <h2>gold</h2>
                                            <div class="price-content">
                                                <span class="currency">$</span>
                                                <span class="value">899</span>
                                                <span class="duration">yr</span>
                                            </div>
                                        </header>
                                        <div class="pricing-body">
                                            <ul class="pricing-features">
                                                <li><em>unlimited</em> disk space</li>
                                                <li><em>unlimited</em> email accounts</li>
                                                <li><em>unlimited</em> subomains</li>
                                            </ul>
                                        </div>
                                        <footer class="pricing-footer">
                                            <a class="custom-button" href="#">add to cart</a>
                                        </footer>
                                    </li>
                                    <!-- Yearly Pricing Table #3 Ends -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        <!-- Newsletter Section Starts -->
        <section class="newsletter">
            <div class="section-overlay">
                <!-- Container Starts -->
                <div class="container">
                    <!-- Main Heading Starts -->
                    <div class="text-center top-text">
                        <h1><span>our</span> newsletter</h1>
                        <h4>Keep in touch</h4>
                    </div>
                    <!-- Main Heading Ends -->
                    <div class="newsletter-content">
                        <p class="text-center">Sign up to our newsletter subscription and be the first to know about<br> Important news <span> & </span> Amazing offers <span> & </span>Discounts</p>
                        <!-- Newsletter Form Starts -->
                        <form class="form-inputs">
                            <!-- Newsletter Form Input Field Starts -->
                            <div class="col-md-12 form-group custom-form-group">
                                <span class="input custom-input">
									<input placeholder="Enter Your Email" class="input-field custom-input-field" type="text" />
									<label class="input-label custom-input-label" >
										<i class="fa fa-envelope-open-o icon icon-field"></i>
									</label>
								</span>
                            </div>
                            <!-- Newsletter Form Input Field Ends -->
                            <!-- Newsletter Form Submit Button Starts -->
                            <button id="submit" name="submit" type="submit" class="custom-button" title="Send">Subscribe Now</button>
                            <!-- Newsletter Form Submit Button Ends -->
                        </form>
                        <!-- Newsletter Form Ends -->
                    </div>
                </div>
                <!-- Container Ends -->
            </div>
        </section>
        <!-- Newsletter Section Ends -->
        <!-- Blog Section Starts -->
        <section class="blog">
            <!-- Container Starts -->
            <div class="container">
                <!-- Main Heading Starts -->
                <div class="text-center top-text">
                    <h1><span>Blog</span> Posts</h1>
                    <h4>Latest Articles</h4>
                </div>
                <!-- Main Heading Starts -->
                <!-- Divider Starts -->
                <div class="divider text-center">
                    <span class="outer-line"></span>
                    <span class="fa fa-comments" aria-hidden="true"></span>
                    <span class="outer-line"></span>
                </div>
                <!-- Divider Ends -->
                <div class="row latest-posts-content">
                    <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a class="img-thumb" href="blog-post.html"><img class="img-responsive" src="http://via.placeholder.com/720x477" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">how to be a good freelancer ?</a>
                                </h4>
                                <div class="post-text">
                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>
                                </div>
                            </div>
                            <!-- Post Date Starts -->
                            <div class="post-date">
                                <span>18</span>
                                <span>AUG</span>
                            </div>
                            <!-- Post Date Ends -->
                            <a class="custom-button" href="blog-post.html">Read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a class="img-thumb" href="blog-post.html"><img class="img-responsive" src="http://via.placeholder.com/720x477" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">Collaboration with Envato</a>
                                </h4>
                                <div class="post-text">
                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>
                                </div>
                            </div>
                            <!-- Post Date Starts -->
                            <div class="post-date">
                                <span>23</span>
                                <span>JUN</span>
                            </div>
                            <!-- Post Date Ends -->
                            <a class="custom-button" href="blog-post.html">Read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a class="img-thumb" href="blog-post.html"><img class="img-responsive" src="http://via.placeholder.com/720x477" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">why themeforest is best ?</a>
                                </h4>
                                <div class="post-text">
                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>
                                </div>
                            </div>
                            <!-- Post Date Starts -->
                            <div class="post-date">
                                <span>01</span>
                                <span>JAN</span>
                            </div>
                            <!-- Post Date Ends -->
                            <a class="custom-button" href="blog-post.html">Read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                </div>
                <!-- Latest Blog Posts Ends -->
            </div>
        </section>
        <!-- Blog Section Ends -->
        <!-- Call To Action Section Starts -->
        <section class="call-to-action">
            <div class="section-overlay">
                <!-- Container Starts -->
                <div class="container">
                    <!-- Main Heading Starts -->
                    <div class="text-center top-text">
                        <h1><span>create</span> account</h1>
                        <h4>get started absolutely free</h4>
                    </div>
                    <!-- Main Heading Starts -->
                    <!-- Call To Action Starts -->
                    <div class="call-to-action-content">
                        <ul>
                            <li>No Credit Card Required</li>
                            <li>100% Match Deposit Bonus</li>
                            <li>Monthly Free Files</li>
                            <li>Daily Newsletter</li>
                        </ul>
                        <a class="custom-button" href="register.html">register now</a>
                    </div>
                    <!-- Call To Action Ends -->
                </div>
                <!-- Container Ends -->
            </div>
        </section>
        <!-- facts Section Ends -->
        <!-- Logos Section Starts -->
        <section class="logos">
            <div class="container">
                <ul class="bxslider" id="bxslider">
                    <!-- Logos Items Starts -->
                    <li><img src="http://via.placeholder.com/150x29" alt="3docean"></li>
                    <li><img src="http://via.placeholder.com/150x29" alt="activeden"></li>
                    <li><img src="http://via.placeholder.com/150x29" alt="audiojungle"></li>
                    <li><img src="http://via.placeholder.com/150x29" alt="codecanyon"></li>
                    <li><img src="http://via.placeholder.com/150x29" alt="graphicriver"></li>
                    <li><img src="http://via.placeholder.com/150x29" alt="photodune"></li>
                    <li><img src="http://via.placeholder.com/150x29" alt="themeforest"></li>
                    <!-- Logos Items Ends -->
                </ul>
            </div>
        </section>
        <!-- Logos Section Ends -->
        <!-- Footer Section Starts -->
        <footer class="footer top-logos">
            <!-- Footer Top Area Starts -->
            <div class="container top-footer">
                <div class="row">
                    <!-- Footer Widget Starts -->
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <h4>Amira</h4>
                        <div class="menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="pricing.html">pricing</a></li>
								<li><a href="portfolio-3-columns.html">portfolio</a></li>
                                <li><a href="blog-right-sidebar.html">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <h4>Support</h4>
                        <div class="menu">
                            <ul>
								<li><a href="contact.html">Contact</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="terms-of-services.html">Terms of Services</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="login.html">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <h4>Contact US</h4>
                        <div class="menu">
                            <ul>
                                <li><span><i class="fa fa-envelope-open"></i> contact@website.com</span></li>
                                <li><span><i class="fa fa-phone"></i> 00216 21 184 010</span></li>
                                <li><span><i class="fa fa-map-marker"></i> London, England</span></li>
                                <li><span><i class="fa fa-clock-o"></i> mon-sat 08am &#x21FE; 05pm</span></li>
                                <li><span><i class="fa fa-skype"></i> amira.skype</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-xs-6 col-sm-12 col-md-4">
                        <!-- Facts Starts -->
                        <div class="facts-footer">
                            <div>
                                <h5>77,991</h5>
                                <span>projects</span>
                            </div>
                            <div>
                                <h5>80,217</h5>
                                <span>hours work</span>
                            </div>
                            <div>
                                <h5>1,253</h5>
                                <span>offices</span>
                            </div>
                            <div>
                                <h5>17,361</h5>
                                <span>clients</span>
                            </div>
                        </div>
                        <!-- Facts Ends -->
                        <hr>
                        <!-- Social Media Links Starts -->
                        <div class="social-icons">
                            <ul class="social">
                                <li>
                                    <a class="twitter" href="#" title="twitter"></a>
                                </li>
                                <li>
                                    <a class="facebook" href="#" title="facebook"></a>
                                </li>
                                <li>
                                    <a class="google" href="#" title="google"></a>
                                </li>
                                <li>
                                    <a class="linkedin" href="#" title="linkedin"></a>
                                </li>
                                <li>
                                    <a class="youtube" href="#" title="youtube"></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Social Media Links Ends -->
                    </div>
                    <!-- Footer Widget Ends -->
                </div>
                <!-- Footer Bottom Area Starts -->
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Copyright Text Starts -->
                            <p class="text-center">Copyright © 2022 Estrategias Inmobiliarias | Design by  <a href="http://www.green-digital.co" target="_blank">Green Digital</a></p>
                            <!-- Copyright Text Ends -->
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom Area Ends -->
            </div>
            <!-- Footer Top Area Ends -->

        </footer>
        <!-- Footer Section Ends -->
        <!-- Back To Top Starts -->
        <div id="back-top-wrapper">
            <p id="back-top">
                <a href="#top"><span></span></a>
            </p>
        </div>
        <!-- Back To Top Ends -->
    </div>
    <!-- Wrapper Ends -->

    <!-- Template JS Files -->

    {!! Html::script('asset/front/js/jquery-2.2.4.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/jquery.easing.1.3.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/bootstrap.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/jquery.bxslider.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/jquery.filterizr.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/jquery.magnific-popup.min.js', array('type' => 'text/javascript')) !!}

    <!-- Revolution Slider Main JS Files -->
    {!! Html::script('asset/front/js/plugins/revolution/js/jquery.themepunch.tools.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/jquery.themepunch.revolution.min.js', array('type' => 'text/javascript')) !!}

    <!-- Revolution Slider Extensions -->

    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.actions.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.migration.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js', array('type' => 'text/javascript')) !!}
    {!! Html::script('asset/front/js/plugins/revolution/js/extensions/revolution.extension.video.min.js', array('type' => 'text/javascript')) !!}

    <!-- Main JS Initialization File -->

    {!! Html::script('asset/front/js/custom.js', array('type' => 'text/javascript')) !!}

</body>

</html>
