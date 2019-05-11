<?php 
   session_start();
   error_reporting(0);
?>
<!DOCTYPE html>
	<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
	<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
	<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
	<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
    <head>
        <title>View Products</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
                <meta name="description" content="Elastislide - A Responsive Image Carousel" />
                <meta name="keywords" content="carousel, jquery, responsive, fluid, elastic, resize, thumbnail, slider" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
                <link rel="stylesheet" type="text/css" href="ImageSlider/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="ImageSlider/css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="ImageSlider/css/custom.css" />
		<script src="ImageSlider/js/modernizr.custom.17475.js"></script>
                
                <!-- Custom styles for this template -->
                 <link href="assets/css/bootstrap.css" rel="stylesheet">
                <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
                <link href="assets/css/style.css" rel="stylesheet">
                <link href="assets/css/style-responsive.css" rel="stylesheet">
                
    </head>
    <body>
         <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box ">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="Seller.html" class="logo"><b>KFN</b></a>
            <!--logo end-->
            <div class="nav notify-row " id="top_menu">
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php"><i class="fa fa-user"></i> &nbsp;&nbsp;Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="profile.html"><img src="assets/img/ui-suhaas.jpg" class="img-circle" width="60"></a></p>
                    <h5 class="centered">Welcome Seller</h5>

                    <li class="mt">
                        <a class="active" href="Seller.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-binoculars"></i>
                            <span>Spec All</span>
                        </a>
                        <ul class="sub">
                            <li><a href="books.html"><i class="fa fa-book"></i>Books</a></li>
                            <li><a href="Transport.html"><i class="fa fa-bicycle"></i>Transport</a></li>
                            <li><a href="Comfort.html"><i class="fa fa-bed"></i>Comfort</a></li>
                            <li><a href="Wearables.html"><i class="fa fa-shopping-bag"></i>Wearables</a></li>
                            <li><a href="Electrical.html"><i class="fa fa-lightbulb-o"></i>Electrical</a></li>
                            <li><a href="Music.html"><i class="fa fa-music"></i>Music</a></li>
                            <li><a href="SoftProject.html"><i class="fa fa-code"></i>Soft Project</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sub">
                            <li><a href="">View Products</a></li>
                            <li><a href="">History</a></li>
                            <li><a href="">Launch</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Let's Launch !</h3>
          	<hr>
				<div class="row mt">
					<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Dear Seller ! Fill Out to Launch the product</h4>
                          <div class="container demo-4">
                             
				<div class="gallery col-lg-6">
					<!-- Elastislide Carousel -->
					<ul id="carousel" class="elastislide-list">
                                            <li data-preview="ImageSlider/2.jpeg"><a href="#"><img src="ImageSlider/1st .jpg" alt="image04" /></a></li>
						</ul>
					<!-- End Elastislide Carousel -->
					<div class="image-preview">
						<img id="preview" src="ImageSlider/images/large/4.jpg" />
					</div>
				</div> 
                               <?php include './iconfig.php';
                                  $phonenohis=$_SESSION['phoneno'];
                                  $mailidhis=$_SESSION['emailid'];
                                  $sql = $db->query("SELECT * FROM `products` WHERE pphoneno='$phonenohis' && pmailid='$mailidhis'");
                                  if(isset($sql) && count($sql)) :  foreach ($sql as $key => $row) : ?>  
                              <div class="gallery col-lg-6">
                                  <header class="clearfix">	
                                      <h1>Product Info <button class="btn btn-danger" type="button"><i class="fa fa-money" aria-hidden="true"></i>BID</button></h1>
                                      <p><strong>Name:</strong><?php echo $row['pname'];?> </p>
                                        <p><strong>Category:<?php echo $row['pcategory'];?> </p>
                                        <p><strong>Description:</strong><?php echo $row['pname'];?> </p>
                                        <p><strong>Discount:</strong><?php echo $row['pdp'];?> </p>
                                        <p><strong>Used For:</strong><?php echo $row['puseddays'];?> </p>
                                        <h1>Seller Info</h1>
                                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        Would be shown only after bidding is closed</div>
                                        
                         <?php endforeach; endif; ?>
				</header>
                                  
                              </div>
		</div>
                  </div>                   
          		</div><!-- col-lg-12-->      	
				</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2016 - KarunyaForNeed
                <a href="seller.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
         <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
    <script src="assets/js/zabuto_calendar.js"></script>
                <!--script for the image slider-->
		<script type="text/javascript" src="ImageSlider/js/jquerypp.custom.js"></script>
		<script type="text/javascript" src="ImageSlider/js/jquery.elastislide.js"></script>
                

  
		<script type="text/javascript">
			
			// example how to integrate with a previewer

			var current = 0,
				$preview = $( '#preview' ),
				$carouselEl = $( '#carousel' ),
				$carouselItems = $carouselEl.children(),
				carousel = $carouselEl.elastislide( {
					current : current,
					minItems : 4,
					onClick : function( el, pos, evt ) {

						changeImage( el, pos );
						evt.preventDefault();

					},
					onReady : function() {

						changeImage( $carouselItems.eq( current ), current );
						
					}
				} );

			function changeImage( el, pos ) {
				$preview.attr( 'src', el.data( 'preview' ) );
				$carouselItems.removeClass( 'current-img' );
				el.addClass( 'current-img' );
				carousel.setCurrent( pos );
			}
		</script>
    </body>
</html>
