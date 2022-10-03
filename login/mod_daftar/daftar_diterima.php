<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="app-title">
        <div>
         <h1><i class="fa fa-th-list"></i> Data PPDB Diterima</h1>
          <p>Silahkan Centang Siswa yang mau dijadikan Siswa Aktif lalu klik Tombol <b>Pindahkan</b></p>
        </div>
          
        </div>
        
 </div>


	

	
  <div class="section-header">
<?php if (isset($_GET['id']) == '') { ?>

<div class="row">
        
		<div class="col-md-12">
		<form id="form-kelas" method="post">
          <div class="tile">
		  
				<div class="row">
				<div class="col-md-4">
				 <h3 class="tile-title">Data PPDB Diterima
				</div>
				<div class="col-md-2">
					<select class="form-control select2" style="width: 100%" name="kelas" hidden>
											<option value=""></option>
											
											<?php
											$query = mysqli_query($koneksi, "SELECT id_jenjang,nama_jenjang,kode FROM jenjang where status in('1')");
											while ($kelas = mysqli_fetch_array($query)) {
											?>
												<option value="<?= $kelas['id_jenjang'] ?>"><?= $kelas['kode'] ?> <?= $kelas['nama_jenjang'] ?></option>
											<?php } ?>
										</select>
				</div>
				<div class="col-md-2">
					<select class="form-control select2" style="width: 100%" name="no_daftar" hidden>
											<option value=""></option>
											
											
										</select>
					<select class="form-control select2" style="width: 100%" name="status" hidden>
											<option value="1"></option>
											
											
										</select>
					<select class="form-control select2" style="width: 100%" name="jenis" hidden>
											<option value=""></option>
											
											
										</select>
				</div>
				<div class="col-md-4">
					<button type="submit"  name="submit" class="btn btn-block btn-primary">Pindahkan Ke Siswa Aktif </button>
				</div>
				<div class="col-md-2">
				
			   </div>
				
				</div>
			
			<hr>
              <div class="table-responsive">
                
                    <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="example">
                        <thead>
                            <tr>
                                <th><input type='checkbox' id='ceksemua'></th>
								<th class="text-center">
                                    No
                                
                                <th>NISN</th>
                                
                                <th>Nama Siswa</th>
                                <th>JK</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Asal Sekolah</th>
								
                                
                                <th>Action</th>
							
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query = mysqli_query($koneksi, "select * FROM siswa WHERE status in('4') and jenis in('1') ");
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
								$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
								$tgl_lahirsiswa = $siswa['tgl_lahir'];
								
								
                                $no++;
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="kode[]" value="<?= $siswa['id_siswa'] ?>"></td>
									<td><?= $no; ?></td>
                                    <td class="str"><?= $siswa['nisn'] ?></td>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td><?= $siswa['jk'] ?></td>
                                    <td><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                                    <td><?= $siswa['asal_sekolah'] ?></td>
                                    
							        
									<td>
									
                                       
										 <a data-toggle="tooltip" data-placement="top" title="" data-original-title="ubah siswa" href="?pg=ubahdaftar&id=<?= enkripsi($siswa['id_siswa']) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit    "></i></a>
                                        <!-- Button trigger modal -->
										
                                        
							<?php }
										?>
						</tbody></table></div>
					</div>
				
			</form>
			<script>
						$('#ceksemua2').change(function() {
								$(this).parents('#example:eq(0)').
								find(':checkbox').attr('checked', this.checked);
							});
						$('#form-kelas').on('submit', function(e) {
								e.preventDefault();
								$.ajax({
									type: 'post',
									url: 'mod_siswa/crud_siswa.php?pg=luluskan1',
									data: $(this).serialize(),
									beforeSend: function() {
										$('form button').on("click", function(e) {
											e.preventDefault();
										});
									},
									success: function(data) {

									   
										swal({
											title: 'Terimakasih',
											text: 'SILAHKAN TUNGGU UPDATE APLIKASINYA HUB. 081331443831',
											type: 'success',
											
											});

										setTimeout(function() {
											window.location.reload();
										}, 4000);


									}
								});
							});
</script>
			</div>
			</div>


<?php } ?>
</div>	
<script>

						$('#ceksemua').change(function() {
								$(this).parents('#example:eq(0)').
								find(':checkbox').attr('checked', this.checked);
							});
						$('#form-hapus').on('submit', function(e) {
								e.preventDefault();
								$.ajax({
									type: 'post',
									url: 'mod_jenjang/crud_jenjang.php?pg=resetkelas',
									data: $(this).serialize(),
									beforeSend: function() {
										$('form button').on("click", function(e) {
											e.preventDefault();
										});
									},
									success: function(data) {

									   
										swal({
											title: 'Berhasil',
											text: 'Data Siswa Berhasil Dikosongkan',
											type: 'success',
										
											});

										setTimeout(function() {
											window.location.reload();
										}, 1000);


									}
								});
							});
</script>
												




