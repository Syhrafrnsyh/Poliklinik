<?php
include "src/config.php";
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Data Pasien</title>
		<?php include "src/head.php"; ?>
	</head>

	<body>

		<body class="single-page">
		<?php include "src/header.php"; ?>

		<?php include "src/session_check.php"; ?>
		
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Data Pasien</h1>

					<div class="breadcrumbs">
						<ul class="d-flex flex-wrap align-items-center p-0 m-0">
							<li><a href="#">Home</a></li>
							<li>Data Pasien</li>
						</ul>
					</div><!-- .breadcrumbs -->

				</div>
			</div>
		</div>

		<img class="header-img" src="images/about-bg.png" alt="">
		</header><!-- .site-header -->
		
			<div class="container">
			<h2>Pasien Appointment</h2>
			<div class="table-responsive">
				<table class="table">
				<thead>
					<tr>
						<th>Pasien</th>
						<th>Doctor</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Status</th>
						<th>Laporan</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "SELECT * FROM book_dokter ");
					while ($row = mysqli_fetch_array($sql)) {
						$dok = $row['id_dokter'];
						$sql2 = mysqli_query($con, "SELECT * FROM dokter WHERE id='$dok' ");
						$row2 = mysqli_fetch_array($sql2);
						$pasien = $row["id_pasien"];
						$sql3 = mysqli_query($con, "SELECT * FROM pasien WHERE id='$pasien' ");
						$row3 = mysqli_fetch_array($sql3);
						$sts = $row['status'];
					?>
						<tr>
							<th scope="row"><?= $row3['nama'] ?></th>
							<td><?= $row2['nama'] ?></td>
							<td><?= $row['tanggal_book'] ?></td>
							<td><?= $row['jam_book'] ?></td>
							<td><?= $row['status'] ?></td>
							<?php
							if ($sts == "Rejected") {
							?>
								<td>Rejected by Doctor</td>
								<td>
									<a href="deleteappointment.php?data=dokter&action=delete&id=<?= $row['id']; ?>">Delete Appointment</a>
								</td>

							<?php
							} else {
							?>
							
								<td>
								<a href="<?= $row['laporan'] ?>" target="_blank">Download</a></td>
								
								<td>
									<a href="deleteappointment.php?data=dokter&action=delete&id=<?= $row['id']; ?>">Delete Appointment</a>
								</td>
							<?php
							}
							?>
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
			<h2>Patient</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Photo</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM pasien");
						while ($row = mysqli_fetch_array($sql)) {
						$doc = $row["id"]; 
						?>
						<tr>
							<th scope="row"><?= $row["id"] ?></th>
							<td><?= $row["nama"] ?></td>
							<td><?= $row["email"] ?></td>
							<td>
							<img src="<?= $row["photo"] ?>" width='20%' alt="">
							</td>
							<td><a href="pasiendataedit.php?data=pasien&id=<?= $row['id']; ?>">Edit</a></td>
							<td><a href="pasiendatadelete.php?data=dokter&id=<?= $row['id']; ?>">Delete</a></td>
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
		<?php include "src/footer.php"; ?>
		<!--=========== End Footer SECTION ================-->

		<?php include "src/incfooter.php"; ?>
	</body>

</html>