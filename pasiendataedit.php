<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
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
        if ($data == 'pasien') {
            $nama = $_POST['nama'];
			$email = $_POST['email'];
			$lahir = $_POST['lahir'];
			$kelamin = $_POST['kelamin'];
			$alamat = $_POST['alamat'];
			$telepon = $_POST['telepon'];
			$password = $_POST['password'];
			//(`id`, `nama`, `email`, `lahir`, `kelamin`, `alamat`, `telepon`, `password`, `photo`) 
            $res1 = mysqli_query($con, "UPDATE pasien SET nama= '$nama',email= '$email',
			lahir= '$lahir',kelamin= '$kelamin',alamat= '$alamat',telepon= '$telepon',
			password= '$password' WHERE id = '$id' ");
            if ($res1 == 1) {
                echo '
            <script>
              alert("Pasien Update Berhasil");
              window.location.href="pasiendata.php";
            </script>
            ';
            } else {
                echo '
            <script>
              alert("Pasien Update Gagal");
            </script>
            ';
            }
        } 
    }
    if ($data == 'pasien') {
        $res = mysqli_query($con, "SELECT * FROM pasien WHERE id = '$id' ");
        $row = mysqli_fetch_array($res);
    ?>
	
	<div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Edit Pasien</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Edit Pasien</li>
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
					<h2>Update Pasien</h2>
                    <form class="appointment-form" method="post">
					<input type="text" name="nama" value="<?= $row['nama'] ?>" required>
					<input type="email" name="email" value="<?= $row['email'] ?>" required>
					<input type="text" name="lahir" value="<?= $row['lahir'] ?>" required>
					<input type="text" name="kelamin" value="<?= $row['kelamin'] ?>" required>
					<input type="text" name="alamat" value="<?= $row['alamat'] ?>" required>
					<input type="text" name="telepon" value="<?= $row['telepon'] ?>" required>
					<input type="text" name="password" value="<?= $row['password'] ?>" required>
					<button class="button gradient-bg" name="btn" type="submit">
					<i class="button__icon fa fa-share"></i><span>Update</span>
					</button>
                    </form>
				</div>

                </div>
            </div>
        </div>
    </div>
	
    <!--=========== END REGISTRATION SECTION ================-->
     
  
    <!--=========== END REGISTRATION SECTION ================-->
	
    <?php
    }
    ?>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
