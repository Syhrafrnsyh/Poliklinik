<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staf Data</title>
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
					<h1>Staf Data</h1>

					<div class="breadcrumbs">
						<ul class="d-flex flex-wrap align-items-center p-0 m-0">
							<li><a href="#">Home</a></li>
							<li>Staf Data</li>
						</ul>
					</div><!-- .breadcrumbs -->

				</div>
			</div>
		</div>

		<img class="header-img" src="images/about-bg.png" alt="">
		</header><!-- .site-header -->
		
		<div class="container">
			<h2>Pelayanan </h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Pelayanan</th>
							<th>Biaya</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM pelayanan");
						while ($row = mysqli_fetch_array($sql)) {
							?>
							<tr>
								<th scope="row"><?= $row['nama_pelayanan'] ?></th>
								<td><?= $row['biaya_pelayanan'] ?></td>
								<td><a href="stafdataedit.php?data=pelayanan&id=<?= $row['id']; ?>">Edit</a></td>
								<td><a href="stafdatadelete.php?data=pelayanan&id=<?= $row['id']; ?>">Delete</a></td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				<br>
				<div class="call-btn button dark">
					<a class="d-flex justify-content-center align-items-center" data-hover="Add New" href="stafdataadd.php?data=pelayanan">
					Add New Pelayanan</a>
				</div>
				
				
			</div>
		</div>
		</div>
		<br>
		
		<div class="container">
			<h2>Dokter</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Dokter</th>
							<th>Biaya</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM dokter");
						while ($row = mysqli_fetch_array($sql)) {
							?>
							<tr>
								<th scope="row"><?= $row['nama'] ?></th>
								<td><?= $row['biaya'] ?></td>
								<td><a href="stafdataedit.php?data=dokter&id=<?= $row['id']; ?>">Edit</a></td>
								<td><a href="stafdatadelete.php?data=dokter&id=<?= $row['id']; ?>">Delete</a></td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				<br>
				<div class="call-btn button dark">
					<a class="d-flex justify-content-center align-items-center" data-hover="Add New" href="stafdataadd.php?data=dokter">
					Add New Dokter</a>
				</div>
						
			</div>
		</div>
		</div>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
