<?php
include "config.php";

mysqli_query($conn,"UPDATE penduduk SET
nama='$_POST[nama]',
province_id='$_POST[province_id]',
regency_id='$_POST[regency_id]',
district_id='$_POST[district_id]',
village_id='$_POST[village_id]'
WHERE id='$_POST[id]'");

header("location:index2.php");
