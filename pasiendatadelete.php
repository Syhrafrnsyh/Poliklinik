<?php
include('src/config.php');
$id = $_GET['id'];
$data = $_GET['data'];
if ($data == 'pasien') {
  $res = mysqli_query($con, "DELETE FROM pasien WHERE id = '$id'");
} else if ($data == 'pelayanan') {
  $res = mysqli_query($con, "DELETE FROM pelayanan WHERE id = '$id'");
}
if ($res == 1) {
  echo '
    <script>
      alert("Hapus Berhasil");
    </script>
    ';
  header("location:pasiendata.php");
} else {
  echo '
    <script>
      alert("Hapus Gagal");
    </script>
    ';
  header("location:pasiendata.php");
}
