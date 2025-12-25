<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>CRUD Wilayah Indonesia</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h4>Data Penduduk</h4>
<a href="index.php" class="btn btn-primary mb-3">+ Tambah Data</a>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama</th>
<th>Provinsi</th>
<th>Kab/Kota</th>
<th>Kecamatan</th>
<th>Desa</th>
<th>Aksi</th>
</tr>

<?php
$no = 1;
$sql = "SELECT 
    p.id,
    p.nama,
    prov.name AS provinsi,
    kab.name AS kota,
    kec.name AS kecamatan,
    des.name AS desa
FROM penduduk p
LEFT JOIN reg_provinces prov ON prov.id = p.province_id
LEFT JOIN reg_regencies kab ON kab.id = p.regency_id
LEFT JOIN reg_districts kec ON kec.id = p.district_id
LEFT JOIN reg_villages des ON des.id = p.village_id;
";

$q = mysqli_query($conn, $sql);
if (!$q) die(mysqli_error($conn));

while ($row = mysqli_fetch_assoc($q)) {
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['provinsi'] ?></td>
<td><?= $row['kota'] ?></td>
<td><?= $row['kecamatan'] ?></td>
<td><?= $row['desa'] ?></td>
<td>
<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">Hapus</a>
</td>
</tr>
<?php } ?>
</table>
</body>
</html>
