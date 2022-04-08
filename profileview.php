
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Profile</title>
    <?php include('src/head.php') ?>
</head>

<body>

   <body class="single-page">
    <?php include('src/header.php') ?>

    <?php
    include('src/session_check.php');
    
    ?>
	
		<div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Profile</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Profile</li>
                        </ul>
                    </div><!-- .breadcrumbs -->

                </div>
            </div>
        </div>

        <img class="header-img" src="images/about-bg.png" alt="">
    </header><!-- .site-header -->
	
		<!--=========== BEGIN SIGNIN SECTION ================-->
	<div class="subscribe-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h2>Profile</h2>
					<form class="appointment-form" action="profileedit.php" method="post">
                    <div class="medical-team-wrap">
						<?php if ($_SESSION['logged']['photo'] != NULL) { ?>
						<img src="<?= $_SESSION['logged']['photo'] ?>" alt="">
						<?php } ?>
                    </div>
		                <input type="text" value="<?= $_SESSION['logged']['nama'] ?>" readonly>
						<input type="email" value="<?= $_SESSION['logged']['email'] ?>" readonly>
						<input type="email" value="<?= $_SESSION['logged']['lahir'] ?>" readonly>
						<input type="email" value="<?= $_SESSION['logged']['kelamin'] ?>" readonly>
						<input type="text" value="<?= $_SESSION['logged']['alamat'] ?>" readonly>
						<input type="number" value="<?= $_SESSION['logged']['telepon'] ?>" readonly>
						<button class="button" type="submit">
						<i class="button__icon fa fa-share"></i><span>Update Profile</span>
						</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('src/footer.php') ?>
    <?php include('src/incfooter.php') ?>
	
</body>
</html>
