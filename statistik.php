<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Statistik</title>
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
					<h1>Statistik</h1>

					<div class="breadcrumbs">
						<ul class="d-flex flex-wrap align-items-center p-0 m-0">
							<li><a href="#">Home</a></li>
							<li>Statistik</li>
						</ul>
					</div><!-- .breadcrumbs -->

				</div>
			</div>
		</div>

		<img class="header-img" src="images/about-bg.png" alt="">
		</header><!-- .site-header -->
		
		<div class="container">
			<h2>Pelayanan</h2>
			<div class="table-responsive">
				<table class="table">
				<thead>
					<tr>
						<th>Pelayanan</th>
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "SELECT * FROM pelayanan");
					while ($row = mysqli_fetch_array($sql)) {
						$pelayanan = $row['id'];
						$count = mysqli_query($con, "SELECT COUNT(id_pelayanan) FROM book_pelayanan WHERE id_pelayanan='$pelayanan' ");
						$row2 = mysqli_fetch_array($count)
					?>
						<tr>
							<th scope="row"><?= $row['nama_pelayanan']; ?></th>
							<td><?= $row2[0] ?></td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
		</div>


    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
