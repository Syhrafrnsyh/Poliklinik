<?php
include "src/config.php";
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Result</title>
		<?php include "src/head.php"; ?>
	</head>

	<body>

		<body class="single-page">
		<?php include "src/header.php"; ?>

		<?php include "src/session_check.php"; ?>
		
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Result</h1>

					<div class="breadcrumbs">
						<ul class="d-flex flex-wrap align-items-center p-0 m-0">
							<li><a href="#">Home</a></li>
							<li>Result</li>
						</ul>
					</div><!-- .breadcrumbs -->

				</div>
			</div>
		</div>

		<img class="header-img" src="images/about-bg.png" alt="">
		</header><!-- .site-header -->

		<div class="container">
			<h2>Pelayanan Appointment</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>						
							<th>Pelayanan</th>
							<th>Tanggal</th>
							<th>Jam</th>
							<th>Pasien</th>
							<th>Laporan</th>
							<th>Upload</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM book_pelayanan ");
						while ($row = mysqli_fetch_array($sql)) {
						$pelayanan = $row["id_pelayanan"];
						$sql2 = mysqli_query($con, "SELECT * FROM pelayanan WHERE id='$pelayanan' ");
						$row2 = mysqli_fetch_array($sql2);
						$pasien = $row["id_pasien"];
						$sql3 = mysqli_query($con, "SELECT * FROM pasien WHERE id='$pasien' ");
						$row3 = mysqli_fetch_array($sql3);
						?>
						<tr>
							<th scope="row"><?= $row2["nama_pelayanan"] ?></th>
							<td><?= $row["tanggal_pelayanan"] ?></td>
							<td><?= $row["jam_pelayanan"] ?></td>
							<td><?= $row3["nama"] ?></td>
							<td><?= $row["laporan"] ?></td>
							<td><a href="resultuploadpelayanan.php?data=pelayanan&id=<?= $row["id"] ?>">Upload</a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		</div>

		<div class="container">
			<h2>Dokter Appointment</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Dokter</th>
							<th>Pasien</th>
							<th>Tanggal</th>
							<th>Jam</th>
							<th>Laporan</th>
							<th>Upload</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM book_dokter");
						while ($row = mysqli_fetch_array($sql)) {
						$dok = $row["id_dokter"];
						$sql2 = mysqli_query($con, "SELECT * FROM dokter WHERE id='$dok' ");
						$row2 = mysqli_fetch_array($sql2);
						$pasien = $row["id_pasien"];
						$sql3 = mysqli_query($con, "SELECT * FROM pasien WHERE id='$pasien' ");
						$row3 = mysqli_fetch_array($sql3);
						?>
						<tr>
							<th scope="row"><?= $row2["nama"] ?></th>
							<td><?= $row3["nama"] ?></td>
							<td><?= $row["tanggal_book"] ?></td>
							<td><?= $row["jam_book"] ?></td>
							<td><?= $row["laporan"] ?></td>
							<td><a href="resultuploaddokter.php?data=dokter&id=<?= $row["id"] ?>">Upload</a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
		
		<?php include "src/footer.php"; ?>

		<?php include "src/incfooter.php"; ?>
	</body>

</html>