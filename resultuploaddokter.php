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
        $server_path = '';
        if ($data == 'dokter') {
            $server_path = "LaporanDokterResult";
        } else if ($data == 'pelayanan') {
            $server_path = "LaporanPelayananResult";
        }
        #normal data type varible
        $file_name = $_POST['file_name'];
        #file type
        $file_o_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_type = $_FILES['img']['type'];
        if ($file_size > 1572864) {
            echo '
        <script>
        alert("Ukuran File Kebesaran!!!");
        window.location.href = "upload.php";
        </script>
        ';
        }
        /*echo "file type is ".$file_type.'<br>';
    echo "file size is ".$file_size.'<br>';
    echo "file orig name is ".$file_o_name.'<br>';*/
        if ($file_type == "application/pdf") {
            #after the file gets validated now lets upload
            #lets create a server path before uploading

            if (!file_exists($server_path)) {
                mkdir($server_path);
            }
            #after creating a folder we have to create a proper definate path
            //microtime();
            $server_path = $server_path . "/" . rand(1000, 9999) . "_" . $file_o_name;
            #now upload
            $upload = move_uploaded_file($_FILES['img']['tmp_name'], $server_path) or die($_FILES['img']['error']);
            if ($upload) {
                $saveData = mysqli_query($con, "UPDATE book_dokter SET laporan='$server_path' WHERE id='$id' ") or die(mysqli_error($con));
				if ($saveData) {
                    echo '
                <script>
                  alert("Upload Berhasil");
                  window.location.href = "result.php";
                </script>
                ';
                }
            }
        } else {
            echo '
        <script>
        alert("File type format pdf only");
        window.location.href = "result.php";
        </script>
        ';
        }
    }
    ?>
	
		<div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Result Upload Dokter</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Result Upload Dokter</li>
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
                    <h2>Upload Result Dokter</h2>

						<form class="appointment-form" method="post" enctype="multipart/form-data">
                        <input type="text" name="file_name" required>
                        <input type="file" name="img" required>
						<button class="button" name="btn" type="submit">
						<i class="button__icon fa fa-share"></i><span>Upload</span>
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
