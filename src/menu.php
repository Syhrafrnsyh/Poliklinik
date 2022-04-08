<?php
session_start();
if (isset($_SESSION['logged']) == "") {
?>

<!--
    <li><a href="features.php">Features</a></li>
    <li><a href="aboutUs.php">About Us</a></li>
    <li><a href="service.php">Service</a></li>
    <li><a href="gallery.php">Gallery</a></li>
-->
	<li><a href="index.php">Home</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
    <li class="call-btn button gradient-bg mt-3 mt-md-0">
    <a class="d-flex justify-content-center align-items-center" href="https://wa.me/15551234567"><img src="images/emergency-call.png">15551234567 </a>
    </li>

<?php
} else if ($_SESSION['loggeds'] == "pasien") {
?>
    <li><a href="index.php">Home</a></li>
    
	<!--
	<li><a href="service.php">Service</a></li>
	-->
	
    <li class="dropdown">
        <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Profile <span class="fa fa-angle-down"></span></a>
        <ul class="dropdown-menu" role="menu">

            <li><a href="profileview.php">Profile Veiw</a></li>
            <li><a href="profileedit.php">Profile Edit</a></li>
            <li><a href="appointments.php">Appointments</a></li>
			
        </ul>
    </li>
    <li><a href="logout.php">Log out</a></li>
    
<?php
} else if ($_SESSION['loggeds'] == "admin") {
?>
    <li><a href="index.php">Home</a></li>
	<li><a href="pasiendata.php">Data Pasien</a></li>
    <li><a href="stafdata.php">Data Staf</a></li>
    <li><a href="result.php">Result</a></li>
	<li><a href="diagnosispelayanan.php">Diagnosis Pelayanan</a></li>
	 
    <li><a href="statistik.php">Statistik</a></li>
    <li><a href="profileedit.php">Profile Edit</a></li>
    <li><a href="logout.php">Log out</a></li>
<?php
} else if ($_SESSION['loggeds'] == "dokter") {
?>
    <li><a href="index.php">Home</a></li>
    <li><a href="appointments.php">Appointments</a></li>
	<li><a href="diagnosis.php">Diagnosis</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profile <span class="fa fa-angle-down"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="profileview.php">Profile Veiw</a></li>
            <li><a href="profileedit.php">Profile Edit</a></li>
        </ul>
    </li>
    <li><a href="logout.php">Log out</a></li>
<?php
}

