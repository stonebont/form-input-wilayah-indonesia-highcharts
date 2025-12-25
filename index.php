<!DOCTYPE html>
<html>
<head>
    <title>Form Wilayah Indonesia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h4>Form Input Penduduk</h4>
<a href="chart.php" class="btn btn-success mb-3">📊 Grafik Penduduk</a>
<a href="datatables.php".php" class="btn btn-success mb-3">⏹️ DataTables</a>
<form method="post" action="simpan.php">
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Provinsi</label>
        <select id="provinsi" name="province_id" class="form-control" required></select>
    </div>

    <div class="mb-2">
        <label>Kabupaten / Kota</label>
        <select id="kota" name="regency_id" class="form-control" required></select>
    </div>

    <div class="mb-2">
        <label>Kecamatan</label>
        <select id="kecamatan" name="district_id" class="form-control" required></select>
    </div>

    <div class="mb-2">
        <label>Desa</label>
        <select id="desa" name="village_id" class="form-control" required></select>
    </div>

    <button class="btn btn-primary">Simpan</button>
	
</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(function(){

    // Load Provinsi
    $.getJSON("api/provinces.php", function(data){
        $("#provinsi").append('<option value="">Pilih Provinsi</option>');
        $.each(data, function(i, item){
            $("#provinsi").append(`<option value="${item.id}">${item.name}</option>`);
        });
    });

    $("#provinsi").change(function(){
        $("#kota").html('');
        $.getJSON("api/regencies.php?province_id="+this.value, function(data){
            $("#kota").append('<option>Pilih Kota</option>');
            $.each(data, function(i, item){
                $("#kota").append(`<option value="${item.id}">${item.name}</option>`);
            });
        });
    });

    $("#kota").change(function(){
        $("#kecamatan").html('');
        $.getJSON("api/districts.php?regency_id="+this.value, function(data){
            $("#kecamatan").append('<option>Pilih Kecamatan</option>');
            $.each(data, function(i, item){
                $("#kecamatan").append(`<option value="${item.id}">${item.name}</option>`);
            });
        });
    });

    $("#kecamatan").change(function(){
        $("#desa").html('');
        $.getJSON("api/villages.php?district_id="+this.value, function(data){
            $("#desa").append('<option>Pilih Desa</option>');
            $.each(data, function(i, item){
                $("#desa").append(`<option value="${item.id}">${item.name}</option>`);
            });
        });
    });

});
</script>
</body>
</html>
