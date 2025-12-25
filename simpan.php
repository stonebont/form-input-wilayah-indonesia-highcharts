<?php
include "config.php";

$nama = $_POST['nama'];
$province = $_POST['province_id'];
$regency  = $_POST['regency_id'];
$district = $_POST['district_id'];
$village  = $_POST['village_id'];

mysqli_query($conn, "INSERT INTO penduduk
(nama, province_id, regency_id, district_id, village_id)
VALUES
('$nama','$province','$regency','$district','$village')");

header("Location: index2.php");
