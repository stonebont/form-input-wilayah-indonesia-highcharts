<?php
include "config.php";

$data = [];
$q = mysqli_query($conn,"
SELECT 
    prov.name AS provinsi,
    COUNT(p.id) AS total
FROM penduduk p
LEFT JOIN reg_provinces prov ON prov.id = p.province_id
GROUP BY p.province_id
ORDER BY total DESC
");

while ($r = mysqli_fetch_assoc($q)) {
    $data[] = [
        'name' => $r['provinsi'],
        'y'    => (int)$r['total']
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Grafik Penduduk per Provinsi</title>
<script src="https://code.highcharts.com/highcharts.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h4>Grafik Jumlah Penduduk per Provinsi</h4>
<a href="index.php" class="btn btn-secondary mb-3">← Kembali</a>

<div id="chartPenduduk" style="height:420px;"></div>

<script>
Highcharts.chart('chartPenduduk', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Penduduk per Provinsi'
    },
    xAxis: {
        type: 'category',
        title: {
            text: 'Provinsi'
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Penduduk'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y}</b> penduduk'
    },
    series: [{
        name: 'Penduduk',
        data: <?= json_encode($data, JSON_NUMERIC_CHECK); ?>
    }]
});
</script>

</body>
</html>
