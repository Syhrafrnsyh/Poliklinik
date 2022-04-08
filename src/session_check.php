<?php
if (!isset($_SESSION['logged']) || $_SESSION['logged'] == '') {
  echo '
    <script>
      alert("Login!");
      window.location.href = "index.php";
    </script>
    ';
}
