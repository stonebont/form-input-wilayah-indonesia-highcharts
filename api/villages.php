<?php
include "../config.php";
$district_id = $_GET['district_id'];
$q = mysqli_query($conn, "SELECT id, name FROM reg_villages WHERE district_id='$district_id'");
$data = [];
while ($r = mysqli_fetch_assoc($q)) {
    $data[] = $r;
}
echo json_encode($data);
