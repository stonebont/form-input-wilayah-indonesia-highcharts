<?php
include "../config.php";
$province_id = $_GET['province_id'];
$q = mysqli_query($conn, "SELECT id, name FROM reg_regencies WHERE province_id='$province_id'");
$data = [];
while ($r = mysqli_fetch_assoc($q)) {
    $data[] = $r;
}
echo json_encode($data);
