<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <body class="single-page">
    <?php include('src/header.php') ?>

    <?php
    $namadepan = $namabelakang = $email = $lahir = $kelamin = $alamat = $telepon = $password = $repassword = '';
    if (isset($_POST['ok'])) {
		$namadepan = $_POST['namadepan'];
        $namabelakang = $_POST['namabelakang'];
        $nama = $namadepan . " " . $namabelakang;
        $email = $_POST['email'];
        $lahir = $_POST['lahir'];
        $kelamin = $_POST['kelamin'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
		$password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if ($password == $repassword) {
            $qry1 = mysqli_query($con, "SELECT * FROM pasien WHERE email = '$email'") or die(mysqli_error($con));
            $qry2 = mysqli_num_rows($qry1);
            if ($qry2 == 0) {
                $qry3 = mysqli_query($con, "INSERT INTO pasien 
				(nama, email, lahir, kelamin, alamat, telepon, password) 
				VALUES 
				('$nama','$email','$lahir','$kelamin','$alamat','$telepon','$password')") or die(mysqli_error($con));
                echo '
                <script>
                alert("Register Berhasil");
                window.location.href = "login.php";
                </script>';
            } else {
                echo '
                <script>
                alert("Email Sudah Terdaftar");
                </script>';
            }
        } else {
            echo '
            <script>
              alert("Password Tidak Sesuai");
            </script>';
        }
    }
	
    
    ?>
	<!-- echo youAreHere(""); -->
		
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Register</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div><!-- .breadcrumbs -->

                </div>
            </div>
        </div>

        <img class="header-img" src="images/about-bg.png" alt="">
    </header><!-- .site-header -->


    <!--=========== BEGIN REGISTRATION SECTION ================-->
	
	<div class="subscribe-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h2>Register</h2>
                    <form class="appointment-form" method="post">
					<input type="text" placeholder="Nama Depan" name="namadepan" value="<?= $namadepan ?>" required pattern="[A-Za-z-0-9]+">
					<input type="text" placeholder="Nama Belakang" name="namabelakang" value="<?= $namabelakang ?>" required pattern="[A-Za-z-0-9]+">
					<input type="email" placeholder="Email" name="email" value="<?= $email ?>" required>
					<input type="date" placeholder="dd/MM/yyyy" max="<?= date("Y-m-d") ?>" name="lahir" value="<?= $lahir ?>" required>
					<input type="gnd" name="kelamin" list="browsers" placeholder="Kelamin"/>
					<datalist id="browsers">
					<option value="<?= $kelamin ?>"><?= $kelamin ?></option>
					<option value="Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
					</datalist>
					<input type="text" placeholder="Alamat" name="alamat" value="<?= $alamat ?>" required></textarea>
					<input type="number" placeholder="Telepon" name="telepon" value="<?= $telepon ?>" required>
					<input type="password" placeholder="Password" name="password" value="<?= $password ?>" required>
					<input type="password" placeholder="Retype Password" name="repassword" value="<?= $repassword ?>" required>
					<button class="button gradient-bg" name="ok" type="submit">
					<i class="button__icon fa fa-share"></i><span>Register</span>
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
