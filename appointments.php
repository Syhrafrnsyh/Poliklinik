<?php
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Appointments</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <body class="single-page">
    <?php include('src/header.php') ?>

    <?php
    include('src/session_check.php');
    

    $id = $_SESSION['logged']['id'];
    if ($_SESSION['loggeds'] == "pasien") {
    ?>
	
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Appointment</h1>

					<div class="breadcrumbs">
						<ul class="d-flex flex-wrap align-items-center p-0 m-0">
							<li><a href="#">Home</a></li>
							<li>Appointment</li>
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
						<th>Date</th>
						<th>Time</th>
						<th>Download</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "SELECT * FROM book_pelayanan WHERE id_pasien='$id' ");
					while ($row = mysqli_fetch_array($sql)) {
						$pelayanan = $row['id_pelayanan'];
						$sql2 = mysqli_query($con, "SELECT * FROM pelayanan WHERE id='$pelayanan' ");
						$row2 = mysqli_fetch_array($sql2);
					?>
						<tr>
							<th scope="row"><?= $row2['nama_pelayanan'] ?></th>
							<td><?= $row['tanggal_pelayanan'] ?></td>
							<td><?= $row['jam_pelayanan'] ?></td>
							<td><a href="<?= $row['laporan'] ?>" target="_blank">Download</a></td>
							<td><a href="deleteappointment.php?data=pelayanan&action=delete&id=<?= $row['id']; ?>">Delete Appointment</a></td>
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
			<h2>Doctor Appointment</h2>
			<div class="table-responsive">
				<table class="table">
				<thead>
					<tr>
						<th>Doctor</th>
						<th>Date</th>
						<th>Time</th>
						<th>Status</th>
						<th>Download</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "SELECT * FROM book_dokter WHERE id_pasien='$id' ");
					while ($row = mysqli_fetch_array($sql)) {
						$dok = $row['id_dokter'];
						$sql2 = mysqli_query($con, "SELECT * FROM dokter WHERE id='$dok' ");
						$row2 = mysqli_fetch_array($sql2);
						$sts = $row['status'];
					?>
						<tr>
							<th scope="row"><?= $row2['nama'] ?></th>
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
								<a href="<?= $row['laporan'] ?>" target="_blank">Download</a>
								</td>
								
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
		
		

    <?php
    } else if ($_SESSION['loggeds'] == "dokter") {
        $id = $_SESSION['logged']['id'];
        $status = "Rejected";
		$status = "Accepted";
    ?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Appointment</h1>

					<div class="breadcrumbs">
						<ul class="d-flex flex-wrap align-items-center p-0 m-0">
							<li><a href="#">Home</a></li>
							<li>Appointment</li>
						</ul>
					</div><!-- .breadcrumbs -->

				</div>
			</div>
		</div>

		<img class="header-img" src="images/about-bg.png" alt="">
		</header><!-- .site-header -->

	<div class="container">
			<h2>Notif Appointment</h2>
			<div class="table-responsive">
				<table class="table">
				<thead>
					<tr>
						<th>Patient</th>
						<th>Date</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "SELECT * FROM book_dokter WHERE id_dokter='$id' and status!='$status' ");
					while ($row = mysqli_fetch_array($sql)) {
						$sts = $row['status'];
						$pasien = $row['id_pasien'];
						$sql2 = mysqli_query($con, "SELECT * FROM pasien WHERE id='$pasien' ");
						$row2 = mysqli_fetch_array($sql2);
					?>
						<tr>
							<th scope="row"><?= $row2['nama'] ?></th>
							<td><?= $row['tanggal_book'] ?></td>
							<td><?= $row['jam_book'] ?></td>
							<td><a href="deleteappointment.php?data=dokter&action=accept&id=<?= $row['id']; ?>">Accepted</a></td>
							<td><a href="deleteappointment.php?data=dokter&action=reject&id=<?= $row['id']; ?>">Rejected</a></td>
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
			<h2>Appointment</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>ID Book</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Lahir</th>
							<th>Kelamin</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>Tanggal</th>
							<th>Jam</th>
							<th>Status</th>
							<th>Diagnosis</th>
							<th>Dokter</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM book_dokter WHERE id_dokter='$id'");
						while ($row = mysqli_fetch_array($sql)) {
						$dok = $row["id_dokter"];
						$sql2 = mysqli_query($con, "SELECT * FROM dokter WHERE id='$dok' ");
						$row2 = mysqli_fetch_array($sql2);
						
						$pasien = $row["id_pasien"];
						$sql3 = mysqli_query($con, "SELECT * FROM pasien WHERE id='$pasien' ");
						$row3 = mysqli_fetch_array($sql3);
						?>
						<tr>
							<th scope="row"><?= $row["id"] ?></th>
							<td><?= $row3["id"] ?></td>
							<td><?= $row3["nama"] ?></td>
							<td><?= $row3["lahir"] ?></td>
							<td><?= $row3["kelamin"] ?></td>
							<td><?= $row3["alamat"] ?></td>
							<td><?= $row3["telepon"] ?></td>
							<td><?= $row["tanggal_book"] ?></td>
							<td><?= $row["jam_book"] ?></td>
							<td><?= $row["status"] ?></td>
							<td><?= $row["diagnosis"] ?></td>
							<td><?= $row2["nama"] ?></td>
						    <td><a href="diagnosis.php?data=dokter&id=<?= $row['id']; ?>">Diagnosis</a></td>
							<td>
							<a href="cetak.php?id=data=dokter&id=<?= $row['id']; ?>">
							<button type="button" class="btn btn-primary">
							Cetak
							</button>
							</a>
							</td>
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

	
    <?php
    }
    ?>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
