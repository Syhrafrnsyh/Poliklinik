<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <body class="single-page">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    $namadepan = $namabelakang = $email = $lahir = $kelamin = $alamat = $telepon = $password = $biaya = $kategori = '';
    if (isset($_POST['dok'])) {
		$namadepan = $_POST['namadepan'];
        $namabelakang = $_POST['namabelakang'];
        $nama = $namadepan . " " . $namabelakang;
        $email = $_POST['email'];
        $lahir = $_POST['lahir'];
        $kelamin = $_POST['kelamin'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
		$password = $_POST['password'];
		$biaya = $_POST['biaya'];
		$kategori = $_POST['kategori'];
        if ($password == $password) {
            $sql1 = mysqli_query($con, "SELECT * FROM dokter WHERE email = '$email'") or die(mysqli_error($con));
            $sql2 = mysqli_num_rows($sql1);
            if ($sql2 == 0) {
                $sql3 = mysqli_query($con, "INSERT INTO dokter 
				(nama, email, lahir, kelamin, alamat, telepon, password, biaya, kategori) 
				VALUES 
				('$nama','$email','$lahir','$kelamin','$alamat','$telepon','$password','$biaya','$kategori')");

				echo '
                <script>
                alert("Dokter Berhasil");
                window.location.href = "stafdataadd.php";
                </script>';
            } else {
                echo '
                <script>
                alert("Dokter Email Sudah Terdaftar");
                </script>';
            }
        } else {
            echo '
            <script>
              alert("Dokter Password Tidak Sesuai");
            </script>';
        }
    }
	
	$pnama = $pbiaya = '';
	if (isset($_POST['pelayanan'])) {
		$res;
		$pnama = $_POST['pnama'];
		$pbiaya = $_POST['pbiaya'];
		if ($pnama == $pnama) {
            $res1 = mysqli_query($con, "SELECT * FROM pelayanan WHERE nama_pelayanan = '$pnama'") or die(mysqli_error($con));
            $res2 = mysqli_num_rows($res1);
            if ($res2 == 0) {
                $res3 = mysqli_query($con, "INSERT INTO pelayanan 
				(nama_pelayanan,biaya_pelayanan) VALUES ('$pnama','$pbiaya')");
				echo '
					<script>
					alert("Pelayanan Berhasil");
					window.location.href = "stafdata.php";
					</script>
					';
			} else {
				echo '
					<script>
					alert("Pelayanan Gagal");
					</script>
					';
			}
		} else {
            echo '
            <script>
              alert("Tidak Sesuai");
            </script>';
        }
    }
    
    ?>
	
		
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Add Staf Data</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Add Staf Data</li>
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
				
                    <h2>Pelayanan</h2>
                    <form class="appointment-form" method="post">
					<input type="text" placeholder="Nama" name="pnama" value="<?= $pnama ?>" required>
					<input type="number" placeholder="Biaya" name="pbiaya" value="<?= $pbiaya ?>" required>
					<input type="submit" name="pelayanan" value="Add Pelayanan" class="button gradient-bg">
                    </form>
				</div>
           
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h2>Dokter</h2>
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
					<input type="number" placeholder="Biaya" name="biaya" value="<?= $biaya ?>" required>
					<input type="text" placeholder="Kategori" name="kategori" value="<?= $kategori ?>" required>
					<input type="submit" name="dok" value="Add Dokter" class="button gradient-bg">
                    </form>
                </div>
            </div>
        </div>
    </div>
	

    <?php include('src/footer.php') ?>

    <?php include('src/incfooter.php') ?>
</body>

</html>
