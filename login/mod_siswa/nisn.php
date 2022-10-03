<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$data = fetch($koneksi, 'siswa', ['id_siswa' => dekripsi($_GET['id'])]);
$tgl_lahirsiswa = $data['tgl_lahir'];
$hariini = date('Y-m-d');
$tahun1 = date('Y');
$tahun2 = date('Y')+1;


?>


<HTML>
<HEAD>

</HEAD>
<BODY>


    <div class="page-portrait">
<div style="width: 750px;height: 243px;margin: 50px;background-image: url('../../../img/<?php echo "$tem[gambar]";?>');">

    <img src="gambar/depan.jpg" style="position: absolute;padding-left: 12px;padding-top: 5px;"  alt="Responsive image" width="300px">

    <img src="gambar/belakang.jpg" style="position: absolute;padding-left: 350px;padding-top: 5px;" class="img-responsive img" alt="Responsive image" width="300px">
	
	
	
	
          
    <p style="padding-left: 123px;padding-top: 95px; "></p>
   
        <table style="margin-top: -1px;padding-left: 440px; position: relative;font-family: arial;font-size: 11px;">
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td style="font-weight: bold;"><?= $data['nisn'] ?></td>
            </tr><tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $data['nama_siswa'] ?></td>
            </tr>
            </tr><tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?= $data['tempat_lahir'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?php echo tgl_indo("$tgl_lahirsiswa");?></td></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php if ($data['jk'] == 'L') { ?> Laki Laki <?php } else { ?> Perempuan <?php } ?>	</td></td>
            </tr>
        </table>


</div>



</div> 
</BODY>


</HTML>
