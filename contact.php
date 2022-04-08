
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <body class="single-page">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Contact</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div><!-- .breadcrumbs -->

                </div>
            </div>
        </div>

        <img class="header-img" src="images/contact-bg.png" alt="">
    </header>
	<!-- .site-header -->
	    <div class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Get in Touch</h2>
                </div>

                <div class="col-12  col-md-4">
                    <input type="text" placeholder="Name">
                </div><!-- col-4 -->

                <div class="col-12 col-md-4">
                    <input type="email" placeholder="E-mail">
                </div><!-- col-6 -->

                <div class="col-12 col-md-4">
                    <input type="text" placeholder="Subject">
                </div>

                <div class="col-12">
                    <textarea name="name" rows="12" cols="80" placeholder="Message"></textarea>
                </div>

                <div class="col-12">
                    <input type="submit" name="" value="Send Message" class="button gradient-bg">
                </div>
            </div><!-- row -->
        </div>
    </div><!-- contact-form -->
	
    <!--=========== BEGIN Google Map SECTION ================-->
	
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-page-map">
                    <iframe id="gmap_canvas" 
					src="https://maps.google.com/maps?q=Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed" 
					frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
					</iframe>
                </div><!-- map -->
            </div>
        </div>
    </div>
	<br>
    <!--=========== END Google Map SECTION ================-->
		
		
		
    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
