    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>


    <!-- load bootstrap from a local -->

    {!! Html::style('assets/templates/gentelella/css/bootstrap.min.css') !!}

    {!! Html::style('assets/templates/gentelella/fonts/css/font-awesome.min.css') !!}
    {!! Html::style('assets/templates/gentelella/css/animate.min.css') !!}


    <!-- Custom styling plus plugins -->
    {!! Html::style('assets/templates/gentelella/css/custom.css') !!}
    {!! Html::style('assets/templates/gentelella/css/sn.css') !!}
    {!! Html::style('assets/templates/gentelella/css/maps/jquery-jvectormap-2.0.1.css') !!}
    {!! Html::style('assets/templates/gentelella/css/icheck/flat/green.css') !!}
    {!! Html::style('assets/templates/gentelella/css/floatexamples.css') !!}
    {!! Html::style('assets/templates/gentelella/css/datatables/tools/css/dataTables.tableTools.css') !!}

    <style>
        /*body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
*/

        .glyphicon-refresh-animate {
        -animation: spin .7s infinite linear;
        -webkit-animation: spin2 .7s infinite linear;
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg);}
            to { -webkit-transform: rotate(360deg);}
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg);}
            to { transform: scale(1) rotate(360deg);}
        }

        .loader {
           position: fixed;
           top: 0;
           right: 0;
           bottom: 0;
           left: 0;
           z-index: 1100;
           background-color: white;
           opacity: .6;
           padding-top: 20%;
        }
    </style>

		<?=!empty($v_url_css) ? $v_url_css : '' ;?>

	<script src="{{ URL::to('/') }}/assets/templates/gentelella/js/jquery.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/bootstrap.min.js"></script>
    <!-- <script src="{{ URL::to('/') }}/assets/js/bootstrap/js/bootstrap.min.js"></script> -->
    <!-- Angularjs -->
    <script src="{{ URL::to('/') }}/assets/js/angular-1.5.5/angular.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/js/angular-1.5.5/angular-route.min.js"></script>
    <!-- <script src="{{ URL::to('/') }}/assets/js/angular-1.5.5/tambahan/ui-bootstrap-tpls-1.3.3.min.js" ></script> -->
    <script src="{{ URL::to('/') }}/assets/js/angular-1.5.5/tambahan/angular-currency-mask.js" ></script>
    <script src="{{ URL::to('/') }}/assets/js/angular-1.5.5/tambahan/ngMask.js" ></script>
    <script src="{{ URL::to('/') }}/assets/js/angular-1.5.5/angular-messages.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/js/angular-1.5.5/dirPagination.js"></script>
    <!-- -- >

    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/nprogress.js"></script>
    <!-- gauge js -->
    <!--
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/gauge/gauge_demo.js"></script>
    -->
    <!-- chart js -->
    <!-- <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/chartjs/chart.min.js"></script> -->
    <!-- bootstrap progress js -->
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/moment.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/datepicker/daterangepicker.js"></script>

    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/custom.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/date.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/flot/jquery.flot.resize.js"></script>

    <!-- skycons -->
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/skycons/skycons.js"></script>

    <!-- Datatables -->
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/datatables/js/jquery.dataTables.js"></script>
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/datatables/tools/js/dataTables.tableTools.js"></script>

    <!-- form validation -->
    <script src="{{ URL::to('/') }}/assets/templates/gentelella/js/validator/validator.js"></script>


    <!-- PNotify -->
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/assets/templates/gentelella/js/notify/pnotify.nonblock.js"></script>
    


	    <?=!empty($v_url_js) ? $v_url_js : '' ;?>

