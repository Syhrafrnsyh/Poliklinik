<?php include('src/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/header.php') ?>
    <?php include('src/slider.php') ?>

    <!--=========== BEGIN Top Feature SECTION ================-->
    <?php if (isset($_SESSION['logged']) == "" or $_SESSION['loggeds'] == "pasien") {
        if (isset($_POST['ok'])) {
            if (isset($_SESSION['logged']) == "") {
                echo '
                <script>
                  alert("Login");
                  window.location.href = "login.php";
                </script>
                ';
            } else {
                $id = $_SESSION['logged']['id'];
                $type = $_POST['type'];
                if ($type == 'pelayanan') {
                    $pelayanan = $_POST['pelayanan'];
                    $tanggal = $_POST['tanggal1'];
                    $jam = date('H:i:s', strtotime($_POST['jam1']));
                    $sql = mysqli_query($con, "INSERT INTO book_pelayanan 
					(`id_pelayanan`, `jam_pelayanan`, `tanggal_pelayanan`, `id_pasien`, `laporan`)
					VALUES ('$pelayanan','$jam','$tanggal','$id','')");
                    if ($sql) {
                        echo '
                        <script>
                        alert("Pelayanan Appointment Berhasil");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Pelayanan Appointment Gagal!");
                        </script>
                        ';
                    }
                
                }
            }
        }
		
		
		if (isset($_POST['dok'])) {
            if (isset($_SESSION['logged']) == "") {
                echo '
                <script>
                  alert("Login");
                  window.location.href = "login.php";
                </script>
                ';
            } else {
                $id = $_SESSION['logged']['id'];
                $type = $_POST['type'];
                if ($type == 'dokter') {
                    $dok = $_POST['doknama'];
                    $tanggal = $_POST['tanggal'];
                    $jam = date('H:i:s', strtotime($_POST['jam']));
                    $qry = mysqli_query($con, "INSERT INTO book_dokter 
					(`id_dokter`, `tanggal_book`, `jam_book`, `id_pasien`, `laporan`, `status`) 
					VALUES 
					('$dok','$tanggal','$jam','$id','','')");
                    if ($qry) {
                        echo '
                        <script>
                        alert("Dokter Appointment Berhasil");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Dokter Appointment Gagal!");
                        </script>
                        ';
                    }
                
                }
            }
        }
		
		
    ?>
	
	<div class="pagination-wrap position-absolute w-100">
                <div class="swiper-pagination d-flex flex-row flex-md-column"></div>
            </div><!-- .pagination-wrap -->
        </div><!-- .hero-slider -->
    </header><!-- .site-header -->

    <div class="homepage-boxes">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="opening-hours">
                        <h2 class="d-flex align-items-center">Opening Hours</h2>

                        <ul class="p-0 m-0">
                            <li>Monday - Thursday <span>8.00 - 19.00</span></li>
                            <li>Friday <span>8.00 - 18.30</span></li>
                            <li>Saturday <span>9.30 - 17.00</span></li>
                            <li>Sunday <span>9.30 - 15.00</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                    <div class="emergency-box">
                        <h2 class="d-flex align-items-center">Emergency</h2>

                        <div class="call-btn button gradient-bg">
                            <a class="d-flex justify-content-center align-items-center" href="#">
							<img src="images/emergency-call.png"> +34 586 778 8892</a>
                        </div>
						
                        <p>Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Donec males uada lorem maximus mauris sceler isque, at rutrum nulla.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 mt-5 mt-lg-0">
                    <div class="appointment-box">
                        <h2 class="d-flex align-items-center">Make an Appointment</h2>
						
                       <div class="call-btn button gradient-bg">
                            <a class="d-flex justify-content-center align-items-center" href="#" data-toggle="modal" data-target="#exampleModalLong">
							<img src="images/patient-department.png">Appoinment</a>
                        </div>
						<hr>
                        <p align="center">
						Now booking an appointment is just a click away so just click on the button below and 
						start booking appointments straight away.
						</p>
                        
                    </div>
                </div>
				
            </div>
        </div>
    </div>
	
<!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Appointment Pelayanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				
				<form class="appointment-form" method="post">
				<div class="form-row">  
					<div class="col-sm-6 col-md-6 col-xs-12">
						<label class="control-label">Tanggal<span class="required">*</span>
						</label>
						<input type="date" class="form-control" placeholder="mm/dd/yy" name="tanggal1" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
						<div class="invalid-feedback">  
							Please enter Tanggal.  
						</div>  
					</div>  
					<div class="col-sm-6 col-md-6 col-xs-12">  
						<label class="control-label">Jam<span class="required">*</span>
						</label>
						<input type="time" class="form-control" placeholder="hh:mm" name="jam1" required>
						<div class="invalid-feedback">  
							Please enter Jam.  
						</div>  
					</div>  
				</div> 
				
				<div class="form-row">  
					<div class="col-sm-6 col-md-6 col-xs-12">  
						<label class="control-label">Select Pelayanan <span class="required">*</span>
						</label>
						<?php $sql = mysqli_query($con, "SELECT * FROM pelayanan") ?>
						<select class="form-control" name="pelayanan" required>
							<?php while ($row = mysqli_fetch_array($sql)) { ?>
								<option value="<?= $row['id']; ?>"><?= $row['nama_pelayanan']; ?></option>
							<?php } ?>
						</select>						
						<div class="invalid-feedback">  
							Please enter Select.  
						</div>  
					</div>  
				</div> 
				
				<input type="hidden" name="type" value="pelayanan">
				<button class="button dark" name="ok" type="submit">
				<i class="button__icon fa fa-share"></i><span>Book Appointment</span>
				</button>
				</form>
								
            </div>
			
			<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dokter Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
			
			<div class="modal-body">
				
				<form class="appointment-form" method="post">
				<div class="form-row">  
					<div class="col-sm-6 col-md-6 col-xs-12">  
					<label class="control-label">Tanggal <span class="required">*</span>
					</label>
					<input type="date" class="form-control" placeholder="dd/mm/yy" name="tanggal" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
						<div class="invalid-feedback">  
							Please enter Tanggal.  
						</div>  
					</div>  
					<div class="col-sm-6 col-md-6 col-xs-12">  
					<label class="control-label">Jam <span class="required">*</span>
					</label>
					<input type="time" class="form-control" placeholder="hh:mm" name="jam" required>
						<div class="invalid-feedback">  
							Please enter Jam.  
						</div>  
					</div>  
				</div> 
				<div class="form-row">  
					<div class="col-sm-6 col-md-6 col-xs-12">  
						<label class="control-label">Select Dokter <span class="required">*</span>
						</label>
						<?php $sql1 = mysqli_query($con, "SELECT * FROM dokter"); ?>
						<select class="form-control" name="doknama" required>
							<?php while ($row1 = mysqli_fetch_array($sql1)) { ?>
								<option value="<?= $row1['id'] ?>"><?= $row1['nama'] ?></option>
							<?php } ?>
						</select>
						<div class="invalid-feedback">  
							Please enter Dokter.  
						</div>  
					</div>  
				</div> 
				
				<input type="hidden" name="type" value="dokter">
				<button class="button dark" name="dok" type="submit">
				<i class="button__icon fa fa-share"></i><span>Doctor Appointment</span>
				</button>
				</form>
								
            </div>
			
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
			
	</div>
	</div>
	</div>

    <?php } ?>
	

    <!--=========== END Top Feature SECTION ================-->
	<?php include('src/idx.php') ?>
    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
