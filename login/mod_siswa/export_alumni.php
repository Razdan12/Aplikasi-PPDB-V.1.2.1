<?php
require("../../config/database.php");
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=DATA_ALUMNI.xls");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
?>
<style>
    .str {
        mso-number-format: \@;
    }
</style>

<center>
    <h3>DATA ALUMNI</h3>
</center>
<table border="1">
    <thead>
        <tr>
            <th class="text-left">
                No
            </th>
            <th>Nama Siswa</th>
            <th>NISN</th>
            <th>NIK</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>No Belangko Ijazah</th>
            <th>Tahun Lulus</th>
           
            
           



        </tr>
    </thead>
    <tbody>
        <?php
		$query = mysqli_query($koneksi, "select * from siswa where status='3'");
		$no = 0;
		while ($siswa = mysqli_fetch_array($query)) {
			
			$no++;
        ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $siswa['nama_siswa'] ?></td>
                <td class="str"><?= $siswa['nisn'] ?></td>
                <td class="str"><?= $siswa['nik'] ?></td>
                <td><?= $siswa['tempat_lahir'] ?></td>
                <td class="date"><?= $siswa['tgl_lahir'] ?></td>
                <td><?= $siswa['jk'] ?></td>
                <td><?= $siswa['no_ijazahalumni'] ?></td>
                <td><?= $siswa['tahun_lulus'] ?></td>
               


            </tr>

        <?php }
        ?>


    </tbody>
</table>
