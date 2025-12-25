<?php
include "../config.php";
$q = mysqli_query($conn, "SELECT id, name FROM reg_provinces ORDER BY name");
$data = [];
while ($r = mysqli_fetch_assoc($q)) {
    $data[] = $r;
}
echo json_encode($data);
