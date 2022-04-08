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
        if ($data == 'pelayanan') {
            $nama = $_POST['nama_pelayanan'];
            $biaya = $_POST['biaya_pelayanan'];
            $res1 = mysqli_query($con, "UPDATE pelayanan SET nama_pelayanan = '$nama',biaya_pelayanan = '$biaya' WHERE id = '$id' ");
            if ($res1 == 1) {
                echo '
            <script>
              alert("Pelayanan Update Berhasil");
              window.location.href="stafdata.php";
            </script>
            ';
            } else {
                echo '
            <script>
              alert("Pelayanan Update Gagal");
            </script>
            ';
            }
        } else if ($data == 'dokter') {
            $nama = $_POST['nama'];
            $biaya = $_POST['biaya'];
            $res1 = mysqli_query($con, "UPDATE dokter SET nama = '$nama', biaya = '$biaya' WHERE id = '$id' ");
            if ($res1 == 1) {
                echo '
            <script>
              alert("Dokter Update Berhasil");
              window.location.href="stafdata.php";
            </script>
            ';
            } else {
                echo '
            <script>
              alert("Dokter Update Gagal");
            </script>
            ';
            }
        }
    }
    if ($data == 'pelayanan') {
        $res = mysqli_query($con, "SELECT * FROM pelayanan WHERE id = '$id' ");
        $row = mysqli_fetch_array($res);
    ?>
	
	<div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Edit Pelayanan</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Edit Pelayanan</li>
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
					<h2>Update Pelayanan</h2>
                    <form class="appointment-form" method="post">
					<input type="text" name="nama_pelayanan" value="<?= $row['nama_pelayanan'] ?>" required>
					<input type="number" name="biaya_pelayanan" value="<?= $row['biaya_pelayanan'] ?>" required>
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
     
    <?php
    } else if ($data == 'dokter') {
        $res = mysqli_query($con, "SELECT * FROM dokter WHERE id = '$id' ");
        $row = mysqli_fetch_array($res);
    ?>
	        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Edit Dokter</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Edit Dokter</li>
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
				
                    <h2>Update Dokter</h2>
                    <form class="appointment-form" method="post">
					<input type="text" name="nama" value="<?= $row['nama'] ?>" required>
					<input type="number" name="biaya" value="<?= $row['biaya'] ?>" required>
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
	
    <?php
    }
    ?>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
