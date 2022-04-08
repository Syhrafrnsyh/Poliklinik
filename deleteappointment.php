<?php
include('src/config.php');
$id = $_GET['id'];
$action = $_GET['action'];
$data = $_GET['data'];
if ($data == 'pelayanan') {
  $res = mysqli_query($con, "DELETE FROM book_pelayanan WHERE id = '$id'");
  if ($res == 1) {
    echo '
        <script>
          alert("Hapus Berhasil");
        </script>
        ';
    header("location:appointments.php");
  } else {
    echo '
        <script>
          alert("Hapus Gagal");
        </script>
        ';
    header("location:appointments.php");
  }
} else if ($data == 'dokter') {
  if ($action == 'delete') {
    $res = mysqli_query($con, "DELETE FROM book_dokter WHERE id = '$id' ");
    if ($res == 1) {
      echo '
            <script>
              alert("Hapus Berhasil");
            </script>
            ';
      header("location:appointments.php");
    } else {
      echo '
            <script>
              alert("Hapus Gagal");
            </script>
            ';
      header("location:appointments.php");
    }
  } else if ($action == 'reject') {
    $res = mysqli_query($con, "UPDATE book_dokter SET status = 'Rejected' WHERE id = '$id'");
    if ($res == 1) {
      echo '
            <script>
              alert("Hapus Berhasil");
            </script>
            ';
      header("location:appointments.php");
    } else {
      echo '
            <script>
              alert("Hapus Gagal");
            </script>
            ';
      header("location:appointments.php");
    }
  
  
  } else if ($action == 'accept') {
    $res = mysqli_query($con, "UPDATE book_dokter SET status = 'Accepted' WHERE id = '$id'");
    if ($res == 1) {
      echo '
            <script>
              alert("Hapus Berhasil");
            </script>
            ';
      header("location:appointments.php");
    } else {
      echo '
            <script>
              alert("Hapus Gagal");
            </script>
            ';
      header("location:appointments.php");
    }
  }
}
