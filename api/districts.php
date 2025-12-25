<?php
include "../config.php";
$regency_id = $_GET['regency_id'];
$q = mysqli_query($conn, "SELECT id, name FROM reg_districts WHERE regency_id='$regency_id'");
$data = [];
while ($r = mysqli_fetch_assoc($q)) {
    $data[] = $r;
}
echo json_encode($data);
