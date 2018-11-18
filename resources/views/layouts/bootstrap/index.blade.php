<?php $tecnoconfig  = config('tecno');?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
    <title>{{ $pageTitle}} | {{ $tecnoconfig['cnf_appname'] }} </title>
		<meta name="keywords" content="{{ (isset($pageMetakey)? $pageMetakey : '') }}" />
		<meta name="description" content="{{ (isset($pageMetadesc) ? $pageMetadesc : '') }}" />
		<meta name="Author" content="Mangopik [www.mangopik.com]" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<link rel="shortcut icon" href="<?php echo asset('favicon.ico');?>" type="image/x-icon"> 

		<!-- GOOGLE WEB FONTS  -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Montserrat:400,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">    

		<link href="<?php echo asset('frontend/bootstrap/css/bootstrap.css') ;?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('frontend/bootstrap/css/animate.css') ;?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('frontend/bootstrap/css/tecno.css') ;?>" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="<?php echo asset('frontend/bootstrap/js/jquery.min.js') ;?>" ></script>
		<script type="text/javascript" src="<?php echo asset('frontend/bootstrap/js/bootstrap.js') ;?>"></script>
    <script type="text/javascript" src="<?php echo asset('assets/plugins/bower_components/parsley.js') ;?>"></script>
    <script type="text/javascript" src="<?php echo asset('assets/plugins/bower_components/prettify.js') ;?>"></script>

    
    <script type="text/javascript" src="<?php echo asset('assets/plugins/bower_components/jquery.jCombo.min.js') ;?>"></script>
    
    
    
	</head>
<body>		



<nav class="navbar-default  navbar-fixed-top nav">

<div id="top-bar">
    <div class="container clearfix">
    <div class="row">
        <div class="hidden-xs col-md-6">
            <!-- Top Links
            ============================================= -->
            <div class="top-links">
                <ul class="sf-js-enabled clearfix" style="touch-action: pan-y;">
                    <li><a href="#"><span class="fa fa-clock-o"></span>Timings</a></li>
                    <li><a href="#"><span class="fa fa-phone"></span> +91-800-9876-221</a></li>
                    <li><a href="#" class="nott"><span class="fa fa-envelope"></span> company@name.com</a></li>
                </ul>
            </div><!-- .top-links end -->

        </div>

        <div class="col-md-6 text-right">
            Welcome <b> @if(Auth::check()) {{ session('fid') }} @else Guest @endif </b> .
        </div>
        <div style="clear: both;"></div>
    </div>
    </div>
</div>

<header>

  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo url('') ;?>">
        {{ config('tecno.cnf_appname') }}
       
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      
     

        @include('layouts.bootstrap.menu')   
        
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</header>  
</nav>

 @include($pages)

  
 
<footer>
    <div class="container">
      
    </div>

  <div class="footer-social">
    <div class="container text-center">
      <ul class="list-inline">
        <li class="social-github"><a href="#"><i class="fa fa-github"></i></a></li>
        <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li class="social-google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
      </ul>
    </div>
  </div>

  <div class="footer-main">
    <div class="container">
      <a href="/">Tecno 5</a> is a project created and maintained by <a href="http://mangopick.com"> Mangopik TM </a> at <a href="http://tecnobuilder.com">Tecno Builder Lab</a>.
      <br>
      Themes and templates licensed  MIT</a>, Tecno 5 Bootstrap website <a href="https://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.
      <br>
      Based on <a href="http://getbootstrap.com">Bootstrap</a>.
    </div>
  </div>

<script type="text/javascript">
  $(function(){
    window.prettyPrint && prettyPrint();
    $(window).on("scroll", function() {




       // $("nav").toggleClass("shrink", $(this).scrollTop() > 50);
        // $("nav").toggleClass("navbar-fixed-top", $(this).scrollTop() > 50);
       // $('.navbar-default').addClass('navbar-fixed-top')
    });    
  })
</script>
</footer>

</body>
</html>