<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <body class="single-page">
    <?php include('src/header.php') ?>

    <?php
    $email = $password = '';
    if (isset($_POST['save'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql1 = mysqli_query($con, "SELECT * FROM pasien WHERE email='$email' and password='$password'") or die(mysqli_error($con));
        $sql2 = mysqli_num_rows($sql1);
        if ($sql2) {
            $row = mysqli_fetch_array($sql1);
            $_SESSION['logged'] = $row;
            $_SESSION['loggeds'] = "pasien";
            echo '
        <script>
          alert("Login Berhasil");
          window.location.href = "index.php";
        </script>
        ';
        } else {
            $sql3 = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' and password='$password'");
            $sql4 = mysqli_num_rows($sql3);
            if ($sql4) {
                $row = mysqli_fetch_array($sql3);
                $_SESSION['logged'] = $row;
                $_SESSION['loggeds'] = "admin";
                echo '
            <script>
              alert("Login Berhasil");
              window.location.href = "index.php";
            </script>
            ';
            } else {
                $sql5 = mysqli_query($con, "SELECT * FROM dokter WHERE email='$email' and password='$password'");
                $sql6 = mysqli_num_rows($sql5);
                if ($sql6) {
                    $row = mysqli_fetch_array($sql5);
                    $_SESSION['logged'] = $row;
                    $_SESSION['loggeds'] = "dokter";
                    echo '
                <script>
                  alert("Login Berhasil");
                  window.location.href = "index.php";
                </script>
                ';
                } else {
                    echo '
                <script>
                  alert("Email atau Password Salah");
                </script>
                ';
                }
            }
        }
    }
    
    ?>
	
	        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Login</h1>

                    <div class="breadcrumbs">
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                            <li><a href="#">Home</a></li>
                            <li>Login</li>
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
                    <h2>Login</h2>

						<form class="appointment-form" method="post">
						<input type="email" placeholder="Email address" name="email" value="<?= $email ?>" required>
						<input type="password" placeholder="Password" name="password" value="<?= $password ?>" required>
						<button class="button" name="save" type="submit">
                        <i class="button__icon fa fa-share"></i><span>Sign In</span>
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
