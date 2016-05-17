<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/season-change.jpg" type="image/x-icon">
		<title>Tosin Careplus</title>

	    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	    <!-- <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,500,700' rel='stylesheet' type='text/css'> -->
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600' rel='stylesheet' type='text/css'>
	    
		
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
		
	</head>

	<body>
    <?php include('headsection.php'); ?>

		<section class="contact-title text-center">
			<div class="contact-wrapper">
				<div class="container">
					<div class= "row">
						<div>
							<h1 class="headline">Contact us</h1>
						</div>
					</div>
					<div class="row">
						<div class="sub-headline">
							<p>Have you gotten any Inquiries? We are not far away from you. </p>
						</div>
					</div>	
				</div>
			</div>
		</section>


		<section class="contact-content">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="google-map">
							<div id="map-canvas"></div>
						</div>
						<div class="quick-contact">
							<h3>Quick Contact</h3>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<p>
										<i class="fa fa-home"></i> 
										<span>Full Address:</span>
                                        15 Lucan Avenue, Lucan, Dublin 22, Ireland.
                                        support@tcareagency.ie


									</p>
								</div>
								<div class="col-md-6">
									<p>
										<i class="fa fa-phone"></i>
										<span>Cell No:</span>
                                        +353 1 839 8390
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>
										<i class="fa fa-fax"></i> 
										<span>Fax No:</span>
                                        +353 1 839 8392
									</p>
								</div>
								<div class="col-md-6">
									<p>
										<i class="fa fa-ambulance"></i>
										<span>Ambulance:</span>
										 +353 1 839 8391
									</p>
								</div>
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</section>


		<section id="footer">
			<div class="container">
			
				<section id="footer">
			<div class="container">
				
			
                <?php include('footer.php'); ?>
			</div>
		</section>
			</div>
		</section>


		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
		<script type="text/javascript" src="assets/js/wow.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		
		<script>
	      function initialize() {
	        var mapCanvas = document.getElementById('map-canvas');
	        var mapOptions = {
	          center: new google.maps.LatLng(24.900392, 91.853181),
	          zoom: 16,
	          mapTypeId: google.maps.MapTypeId.ROADMAP
	        }
	        var map = new google.maps.Map(mapCanvas, mapOptions)
	      }
	      google.maps.event.addDomListener(window, 'load', initialize);
	    </script>

		<script>
      		new WOW().init();
		</script>


	</body>
</html>
