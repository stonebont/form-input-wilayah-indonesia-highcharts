<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- google verification-->
    <meta name="google-site-verification" content="qI5St_q3OEwwsy5oJXpkIIzk8uAAAA0jbQQ6Ufik9rY" />
<!-- DataTables versi 2.3.4 CSS mandatory and Boostrap 5 styling-->
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css">
<!-- Adsense Google-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4333000472376281" crossorigin="anonymous"></script>
    <title>Data Source : DOM</title>
    </head>
    <body>
    <div class="container-fluid">
        <table id="example" class="table striped table-hover ">
            <thead>
	            <tr>
					<th>id</th>
            	    <th>nama</th>
            		<th>provinsi</th>
            		<th>kota</th>
            		<th>kecamatan</th>
            		<th>desa</th>
            		
	            </tr>
	        </thead>
            <?php
        	include 'koneksi.php';
        	$data = mysqli_query($koneksi,"SELECT 
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
LEFT JOIN reg_villages des ON des.id = p.village_id;");
        	while($row = mysqli_fetch_array($data)) {
    		echo "<tr>
    		<td>".$row['id']."</td>
    		<td>".$row['nama']."</td>
    		<td>".$row['provinsi']."</td>
    		<td>".$row['kota']."</td>
    		<td>".$row['kecamatan']."</td>
    		<td>".$row['desa']."</td>
    		 </tr>"; } ?>
        </table>
    </div>

<!-- jquery 3.7.1 Mandatory and Bootstap 5 styling -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>
    
<script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable({
            
        });
    });
</script>
    </body>
    
</html>