<?php
/**
 * Created by PhpStorm.
 * User: franklyn
 * Date: 25/07/17
 * Time: 10:53 AM
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Flex - Responsive HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    Flex Template
    http://www.templatemo.com/tm-406-flex
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/templatemo_misc.css') }}" rel="stylesheet">
    <link href="{{ asset('css/templatemo_style.css') }}" rel="stylesheet">

    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

    @yield('content')

    <script src="{{ asset('js/vendor/jquery-1.11.0.min.js') }}"></script>
    <script>window.jQuery || document.write('<script src="j{{ asset('js/vendor/jquery-1.11.0.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/custom-template.js') }}"></script>

    <!-- Google Map -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{ asset('js/vendor/jquery.gmap3.min.js') }}"></script>

    <!-- Google Map Init-->
    <script type="text/javascript">
        jQuery(function($){
            $('#map_canvas').gmap3({
                marker:{
                    address: '37.769725, -122.462154'
                },
                map:{
                    options:{
                        zoom: 15,
                        scrollwheel: false,
                        streetViewControl : true
                    }
                }
            });

            /* Simulate hover on iPad
             * http://stackoverflow.com/questions/2851663/how-do-i-simulate-a-hover-with-a-touch-in-touch-enabled-browsers
             --------------------------------------------------------------------------------------------------------------*/
            $('body').bind('touchstart', function() {});
        });
    </script>
    <!-- templatemo 406 flex -->
</body>
</html>