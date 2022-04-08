<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Result Upload Dokter</title>
    <?php include('src/head.php') ?>
</head>

<body>

	<body class="single-page">
    <?php include('src/header.php') ?>

    <?php
    include('src/session_check.php');
    $id = $_GET['id'];
    $data = $_GET['data'];
    if (isset($_POST['btn'])) {
        if ($data == 'dokter') {
			$diagnosis = $_POST['diagnosis'];
			$res1 = mysqli_query($con, "UPDATE book_dokter SET diagnosis='$diagnosis' WHERE id='$id' ");
            if ($res1 == 1) {
                echo '
            <script>
              alert("Berhasil");
              window.location.href="appointments.php";
            </script>
            ';
            } else {
                echo '
            <script>
              alert("Gagal");
            </script>
            ';
            }
        }
    }
    ?>
	
		<div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Diagnosis</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Diagnosis</li>
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
                    <h2>Diagnosis</h2>

						<form class="appointment-form" method="post" enctype="multipart/form-data">
						<textarea name="diagnosis" rows="12" cols="80" placeholder="Diagnosis"></textarea>
						<button class="button" name="btn" type="submit">
						<i class="button__icon fa fa-share"></i><span>Diagnosis</span>
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
