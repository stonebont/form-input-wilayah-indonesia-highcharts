$(document).ready(function () {

  // 1. LOAD PROVINSI
  $.ajax({
    url: "api/provinces.php",
    dataType: "json",
    success: function (provinsi) {

      $("#provinsi").html('<option value="">Pilih Provinsi</option>');

      $.each(provinsi, function (i, p) {
        let sel = (p.id == selected.province) ? "selected" : "";
        $("#provinsi").append(
          `<option value="${p.id}" ${sel}>${p.name}</option>`
        );
      });

      // setelah provinsi siap → load kota
      loadKota();
    }
  });

  function loadKota() {
    $.ajax({
      url: "api/regencies.php",
      data: { province_id: selected.province },
      dataType: "json",
      success: function (kota) {

        $("#kota").html('<option value="">Pilih Kota</option>');

        $.each(kota, function (i, k) {
          let sel = (k.id == selected.regency) ? "selected" : "";
          $("#kota").append(
            `<option value="${k.id}" ${sel}>${k.name}</option>`
          );
        });

        // setelah kota siap → load kecamatan
        loadKecamatan();
      }
    });
  }

  function loadKecamatan() {
    $.ajax({
      url: "api/districts.php",
      data: { regency_id: selected.regency },
      dataType: "json",
      success: function (kecamatan) {

        $("#kecamatan").html('<option value="">Pilih Kecamatan</option>');

        $.each(kecamatan, function (i, k) {
          let sel = (k.id == selected.district) ? "selected" : "";
          $("#kecamatan").append(
            `<option value="${k.id}" ${sel}>${k.name}</option>`
          );
        });

        // setelah kecamatan siap → load desa
        loadDesa();
      }
    });
  }

  function loadDesa() {
    $.ajax({
      url: "api/villages.php",
      data: { district_id: selected.district },
      dataType: "json",
      success: function (desa) {

        $("#desa").html('<option value="">Pilih Desa</option>');

        $.each(desa, function (i, d) {
          let sel = (d.id == selected.village) ? "selected" : "";
          $("#desa").append(
            `<option value="${d.id}" ${sel}>${d.name}</option>`
          );
        });
      }
    });
  }

});
