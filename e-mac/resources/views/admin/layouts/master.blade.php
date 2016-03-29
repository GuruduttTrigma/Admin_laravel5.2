<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>E-Mac : Admin Panel</title>
	<link href="/e-mac/public/backend/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/bootstrap-theme.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/elegant-icons-style.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/owl.carousel.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/fullcalendar.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/widgets.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/style.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/style-responsive.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/xcharts.min.css" rel="stylesheet" />
	<link href="/e-mac/public/backend/css/jquery-ui-1.10.4.min.css" rel="stylesheet" />
  </head>
  <body> 
	<!-- container section start -->
	<section id="container" class="">    
		@include('admin.layouts.header')
		@include('admin.layouts.sidebar')
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">            
              <!--overview start-->
			  @yield('content')
              <!--overview end-->			  
			</section>
		</section>
      <!--main content end-->
	</section>
	<!-- container section start -->
    <!-- javascripts -->
	<link href="/e-mac/public/backend/css/bootstrap.min.css" rel="stylesheet" />
    <script src="/e-mac/public/backend/js/jquery.js"></script>
	<script src="/e-mac/public/backend/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/e-mac/public/backend/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/e-mac/public/backend/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="/e-mac/public/backend/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="/e-mac/public/backend/js/jquery.scrollTo.min.js"></script>
    <script src="/e-mac/public/backend/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="/e-mac/public/backend/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="/e-mac/public/backend/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/e-mac/public/backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/e-mac/public/backend/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="/e-mac/public/backend/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="/e-mac/public/backend/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="/e-mac/public/backend/js/calendar-custom.js"></script>
	<script src="/e-mac/public/backend/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="/e-mac/public/backend/js/jquery.customSelect.min.js" ></script>
	<script src="/e-mac/public/backend/assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="/e-mac/public/backend/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="/e-mac/public/backend/js/sparkline-chart.js"></script>
    <script src="/e-mac/public/backend/js/easy-pie-chart.js"></script>
	<script src="/e-mac/public/backend/js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="/e-mac/public/backend/js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="/e-mac/public/backend/js/xcharts.min.js"></script>
	<script src="/e-mac/public/backend/js/jquery.autosize.min.js"></script>
	<script src="/e-mac/public/backend/js/jquery.placeholder.min.js"></script>
	<script src="/e-mac/public/backend/js/gdp-data.js"></script>	
	<script src="/e-mac/public/backend/js/morris.min.js"></script>
	<script src="/e-mac/public/backend/js/sparklines.js"></script>	
	<script src="/e-mac/public/backend/js/charts.js"></script>
	<script src="/e-mac/public/backend/js/jquery.slimscroll.min.js"></script>
  <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
