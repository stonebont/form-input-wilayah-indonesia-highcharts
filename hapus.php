<?php
include "config.php";
mysqli_query($conn,"DELETE FROM penduduk WHERE id='$_GET[id]'");
header("location:index2.php");
