<?php
include "config.php";
$id = $_GET['id'];

$q = mysqli_query($conn,"SELECT * FROM penduduk WHERE id='$id'");
if(!$q) die(mysqli_error($conn));
$data = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Penduduk</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h4>Edit Penduduk</h4>

<form method="post" action="update.php">
<input type="hidden" name="id" value="<?= $data['id'] ?>">
<input name="nama" class="form-control mb-2" value="<?= $data['nama'] ?>" required>

<select id="provinsi" name="province_id" class="form-control mb-2" required></select>
<select id="kota" name="regency_id" class="form-control mb-2" required></select>
<select id="kecamatan" name="district_id" class="form-control mb-2" required></select>
<select id="desa" name="village_id" class="form-control mb-2" required></select>

<button class="btn btn-primary">Update</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<script>
const selected = {
  province : "<?= $data['province_id'] ?>",
  regency  : "<?= $data['regency_id'] ?>",
  district : "<?= $data['district_id'] ?>",
  village  : "<?= $data['village_id'] ?>"
};
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js_wilayah_edit.js"></script>
</body>
</html>
