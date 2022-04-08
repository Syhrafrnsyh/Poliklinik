<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
    <?php include('src/head.php') ?>
</head>

<body>

	<body class="single-page">
    <?php include('src/header.php') ?>

    <?php
    include('src/session_check.php');
	$id = $_SESSION['logged']['id'];
    if (isset($_POST['ok'])) {
        $id = $_SESSION['logged']['id'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        if ($_SESSION['loggeds'] == "pasien") {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $res = mysqli_query($con, "UPDATE pasien SET nama = '$nama',email = '$email',alamat = '$alamat',telepon = '$telepon' WHERE id = '$id' ");
            $qry1 = mysqli_query($con, "SELECT * FROM pasien WHERE email='$email'");
            $qry2 = mysqli_num_rows($qry1);
            $row = mysqli_fetch_array($qry1);
            $_SESSION['logged'] = $row;
        } else if ($_SESSION['loggeds'] == "admin") {
            $res = mysqli_query($con, "UPDATE admin SET email = '$email',telepon = '$telepon' WHERE id = '$id' ");
            $qry3 = mysqli_query($con, "SELECT * FROM admin WHERE email='$email'");
            $qry4 = mysqli_num_rows($qry3);
            $row = mysqli_fetch_array($qry3);
            $_SESSION['logged'] = $row;
        } else if ($_SESSION['loggeds'] == "dokter") {
            $alamat = $_POST['alamat'];
            $res = mysqli_query($con, "UPDATE dokter SET alamat = '$alamat',email = '$email',telepon = '$telepon' WHERE id = '$id' ");
            $qry5 = mysqli_query($con, "SELECT * FROM dokter WHERE email='$email'");
            $qry6 = mysqli_num_rows($qry5);
            $row = mysqli_fetch_array($qry5);
            $_SESSION['logged'] = $row;
        }
        if ($res == 1) {
            echo '
        <script>
          alert("Details Updated");
        </script>
        ';
        } else {
            echo '
        <script>
          alert("Details not Updated");
        </script>
        ';
        }
    }
    if (isset($_POST['okpass'])) {
		$id = $_SESSION['logged']['id'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if ($password == $repassword) {
            if ($_SESSION['loggeds'] == "pasien") {
                $res = mysqli_query($con, "UPDATE pasien SET password='$password' WHERE id='$id' ");
            } else if ($_SESSION['loggeds'] == "admin") {
                $res = mysqli_query($con, "UPDATE admin SET password='$password' WHERE id='$id' ");
            } else if ($_SESSION['loggeds'] == "dokter") {
                $res = mysqli_query($con, "UPDATE dokter SET password='$password' WHERE id='$id' ");
            }
            if ($res == 1) {
                echo '
            <script>
              alert("Password Updated Successfully!");
            </script>
            ';
            } else {
                echo '
            <script>
              alert("Password not Updated");
            </script>
            ';
            }
        } else {
            echo '
        <script>
          alert("Passwords Doesn\'t match.");
        </script>
        ';
        }
    }

    ?>
		<div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Edit Profile</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Edit Profile</li>
                        </ul>
                    </div><!-- .breadcrumbs -->

                </div>
            </div>
        </div>

        <img class="header-img" src="images/about-bg.png" alt="">
    </header><!-- .site-header -->
	
	<!--=========== BEGIN SIGNIN SECTION ================-->
	
	<?php if ($_SESSION['loggeds'] == "pasien" || $_SESSION['loggeds'] == "dokter") { ?>
	
	<div class="subscribe-banner">
        <div class="container">
            <div class="row">
			
				<div class="col-12 col-lg-8 offset-lg-2">
					<div class="medical-team-wrap">
							<!--
							<img src="images/team-2.jpg" alt="">
							<img src="gambar/team-2.jpg" id="preview" class="img-thumbnail">
							<form action="simpan.php" method="post" enctype="multipart/form-data">
							-->
						<form class="appointment-form" method="post" enctype="multipart/form-data" action="uploadphoto.php">
							<?php if ($_SESSION['logged']['photo'] != NULL) { ?>
							<img src="<?= $_SESSION['logged']['photo'] ?>" id="preview" class="img-thumbnail" alt="">
							<?php } ?>
							<h4>Image Profile</h4>
							<input type="file" name="img">
							<button type="submit" name="dpok" class="button">
							<i class="button__icon fa fa-share"></i><span>Upload</span>
							</button>
						</form>
					</div>
				</div>
				<?php } ?>
				<div class="col-12 col-lg-8 offset-lg-2">
                    <h2>Change Profile</h2>
					<form class="appointment-form" method="post">
						<?php if ($_SESSION['loggeds'] == "pasien") { ?>
						<input type="text" value="<?php echo $_SESSION['logged']['nama'] ?>" name="nama" required>
						<input type="email" value="<?php echo $_SESSION['logged']['email'] ?>" name="email" required>
						<input type="text" value="<?php echo $_SESSION['logged']['alamat'] ?>" name="alamat" required>
						<input type="number" value="<?php echo $_SESSION['logged']['telepon'] ?>" name="telepon" required>
						<?php } else if ($_SESSION['loggeds'] == "admin") { ?>
						<input type="email" value="<?php echo $_SESSION['logged']['email'] ?>" name="email" required>
						<input type="number" value="<?php echo $_SESSION['logged']['telepon'] ?>" name="telepon" required>
						<?php } else if ($_SESSION['loggeds'] == "dokter") { ?>
						<input type="email" value="<?php echo $_SESSION['logged']['email'] ?>" name="email" required>
						<input type="text" value="<?php echo $_SESSION['logged']['alamat'] ?>" name="alamat" required>
						<input type="number" value="<?php echo $_SESSION['logged']['telepon'] ?>" name="telepon" required>
						<?php } ?>
						<button class="button" name="ok" type="submit">
						<i class="button__icon fa fa-share"></i><span>Update</span>
						</button>
                    </form>		
                </div>
				
				<div class="col-12 col-lg-8 offset-lg-2">
                    <h2>Change Password</h2>
					<form class="appointment-form" method="post">
					<input type="password" placeholder="Password" name="password" required>
					<input type="password" placeholder="Retype Password" name="repassword" required>
					<button class="button" name="okpass" type="submit">
					<i class="button__icon fa fa-share"></i><span>Update Password</span>
					</button>
                    </form>		
                </div>
				
            </div>
        </div>
    </div>


    <!--=========== END SIGNIN SECTION ================-->	
	
    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
