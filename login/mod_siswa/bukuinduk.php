<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami");
?>


<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Siswa</h1>
      <p>Data Siswa Aktif Saat ini</p>
    </div>
</div>

    
		<div class="row">
        <div class="col-md-12">
		
           
          <div class="tile bg-info">
		   <div class="row">
				<div class="col-md-9">
				 <h3 class="tile-title">Biodata Siswa</h3>
				
				</div>
				<div class="col-md-3">
				<iframe name='cetakdata' src='mod_siswa/data.php' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['cetakdata'].print()" class='btn  btn-flat btn-warning'><i class='fa fa-print'></i> Cetak Data</button>
				</div>
			</div>
		   </div>
			

    <div class="row">
        
		<div class="col-md-12">
		
<?php
                            $query = mysqli_query($koneksi, "select * from siswa where status='1'");
                            
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
								
                                $tgl_lahirsiswa = $siswa['tgl_lahir'];
								$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
                                $no++;
                            ?>					
		<div class="row gutters-sm">
              <div class="col-md-4 mb-3">
              <div class="card bg-info">
                
                  <div class="d-flex flex-column align-items-center text-center">
                      
                  <img src="../<?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-gutters" width="130">
                    
                  </div>
               <div class="d-flex flex-column align-items-center text-center ">
                      
                  <b><?= $siswa['nama_siswa'] ?></b>
                    
                  </div>
              </div>
              </div>
              <div class="col-md-8 mb-3">
              <div class="card mb-3">
                
                <div class="card-body pb-0">
               <ul class="list-group list-group-flush">
                 <table   id="sampleTable" width="100%" border="0">
                 <tr>
                    <td width="30%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>Nama</b> </td>
                    <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>:</b> </td>
                    <td width="77%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b><?= $siswa['nama_siswa'] ?></b> </td>
                </tr>
                <tr>
                    <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>Nis Lokal</b> </td>
                    <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                    <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nis'] ?> </td>
                </tr>
                <tr>
                    <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>NISN </b></td>
                    <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                    <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nisn'] ?> </td>
                </tr>
                <tr>
                    <td width="10%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>TTL</b> </td>
                    <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                    <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['tempat_lahir'] ?>,<?php echo tgl_indo("$tgl_lahirsiswa");?></td>
                </tr>
                <tr>
                    <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>Nama Ayah </b></td>
                    <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                    <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_ayah'] ?> </td>
                </tr>
                <tr>
                <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>Nama Ibu </b></td>
                <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_ibu'] ?> </td>
                </tr>
                <tr>
                <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <b>Asal Sekolah</b> </td>
                <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['asal_sekolah'] ?> </td>
                </tr>
                  </table>
                </ul>
              </div>

              </div>
            </div>
            </div>
<?php } ?>

</div>

              </div>
            </div>
            </div>
			
			