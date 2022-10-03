<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
$tahun = date('Y')-3;
$tahun1 = date('Y')-2;
$tahun2 = date('Y')-1;
$tahun3 = date('Y');
?>
<div class="app-title">
        <div>
         <h1><i class="fa fa-th-list"></i> Data Calon Alumni</h1>
          <p>Silahkan Centang Siswa yang mau diluluskan lalu klik Tombol <b>Luluskan</b></p>
        </div>
          
        </div>
   
	

	
  <div class="section-header">
<?php if (isset($_GET['id']) == '') { ?>

<div class="row">
        
		<div class="col-md-12">
		<form id="form-kelas" method="post">
          <div class="tile bg-info">
		  
				<div class="row ">
				<div class="col-md-10">
				 <h5 class="tile-title">Data Calon Alumni Tahun <?= $tahun3?> </h5>
				
				</div>
				
				
				
				<div class="col-md-2">
				<div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pilih Kelas</a>
                        <div class="dropdown-menu">
							
                          <?php
                            $query = mysqli_query($koneksi, "select * from jenjang where kode in(6,9,12)");
                            while ($kelas = mysqli_fetch_array($query)) {
                            ?>
							<a href="?pg=luluskan&id=<?= enkripsi($kelas['id_jenjang']) ?>" class="dropdown-item has-icon"><i class="fa fa-eye"></i> <?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?></a>
                           <?php } ?>
						   
                         
                        </div>
               </div>
			   </div>
				
				</div>
			</div>
			
			<hr>
			<div class="tile ">
              <div class="table-responsive">
                
                    <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="sampleTable">
                        <thead>
                            <tr>
                                <th><input type='checkbox' id='ceksemua'></th>
								<th class="text-center">
                                    No
                                
                                <th>NISN</th>
                                
                                <th>Nama Siswa</th>
                                <th>JK</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
								<th>Kelas</th>
                                
                                <th>Action</th>
							
                            </tr>
                        </thead>
                        <tbody>
                           
                                <tr>
                                    <td colspan="9" width="100%" valign="center"> Maaf !!  Silahkan Pilih Jenjang Terlebih dahulu</td>
								</tr>
                                   
										
                                        
							
						</tbody></table></div>
					</div>
				
			</form>
			<script>
						$('#ceksemua2').change(function() {
								$(this).parents('#sampleTable:eq(0)').
								find(':checkbox').attr('checked', this.checked);
							});
						$('#form-kelas').on('submit', function(e) {
								e.preventDefault();
								$.ajax({
									type: 'post',
									url: 'mod_siswa/crud_siswa.php?pg=luluskan',
									data: $(this).serialize(),
									beforeSend: function() {
										$('form button').on("click", function(e) {
											e.preventDefault();
										});
									},
									success: function(data) {

									   
										swal({
											title: 'Terimakasih',
											text: 'Kelas Siswa Berhasil Di Rubah',
											type: 'success',
										
											});

										setTimeout(function() {
											window.location.reload();
										}, 1000);


									}
								});
							});
</script>
			</div>
			</div>

<?php } else { ?>
<?php $jenjang = fetch($koneksi, 'jenjang', ['id_jenjang' => dekripsi($_GET['id'])]) ?>
<div class="row">
        
		<div class="col-md-12">
		<form id="form-kelas" method="post">
          <div class="tile bg-info">
		  
				<div class="row">
				<div class="col-md-5">
				 <h3 class="tile-title">Data Kelas (<?= $jenjang['kode'] ?>-<?= $jenjang['nama_jenjang'] ?>)</h3>
				 
				</div>
				<div class="col-md-2">
					<select class="form-control select2" style="width: 100%" name="kelas" hidden>
											<option value="">Pilih Kelas</option>
											
											
										</select>
				</div>
				<div class="col-md-3">
				<select class="form-control select2" style="width: 100%" name="status" hidden>
											<option value="3"></option>
											
											
										</select>
					<select class="form-control select2" style="width: 100%" name="tahun_lulus" required>
											<option value="">Pilih Tahun Lulus</option>
											<option value="<?= $tahun?>"><?= $tahun?></option>
											<option value="<?= $tahun1?>"><?= $tahun1?></option>
											<option value="<?= $tahun2?>"><?= $tahun2?></option>
											<option value="<?= $tahun3?>"><?= $tahun3?></option>
											
											
										</select>
				</div>
				<div class="col-md-2">
					<button type="submit"  name="submit" class="btn btn-block btn-primary">Luluskan </button>
					
				</div>
								
				</div>
			
				</div>
			
			<hr>
			<div class="tile ">
              <div class="table-responsive">
                
                    <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="sampleTable">
                        <thead>
                            <tr>
                                <th><input type='checkbox' id='ceksemua'></th>
								<th class="text-center">
                                    No
                                
                                <th>NISN</th>
                                
                                <th>Nama Siswa</th>
                                <th>JK</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
								<th>Kelas</th>
                                
							
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query = mysqli_query($koneksi, "select * from siswa where kelas='$jenjang[id_jenjang]'");
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
								$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
                                $no++;
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="kode[]" value="<?= $siswa['id_siswa'] ?>"></td>
									<td><?= $no; ?></td>
                                    <td class="str"><?= $siswa['nisn'] ?></td>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td><?= $siswa['jk'] ?></td>
                                    <td><?= $siswa['tempat_lahir'] ?></td>
                                    <td class="date"><?= $siswa['tgl_lahir'] ?></td>
                                    <?php if ($siswa['kelas'] == null) { ?>
											 <td> Null</td>
											<?php } else { ?>
											<td>
											<?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?></i>
												</td>
											<?php } ?>
							       
									
										
                                        
							<?php }
										?>
						</tbody></table></div>
					</div>
				
			</form>
			<script>
						$('#ceksemua2').change(function() {
								$(this).parents('#sampleTable:eq(0)').
								find(':checkbox').attr('checked', this.checked);
							});
						$('#form-kelas').on('submit', function(e) {
								e.preventDefault();
								$.ajax({
									type: 'post',
									url: 'mod_siswa/crud_siswa.php?pg=luluskan',
									data: $(this).serialize(),
									beforeSend: function() {
										$('form button').on("click", function(e) {
											e.preventDefault();
										});
									},
									success: function(data) {

									   
										swal({
											title: 'Terimakasih',
											text: 'Kelas Siswa Berhasil Di Luluskan',
											type: 'success',
											buttons: false,
											});

										setTimeout(function() {
											window.location.reload();
										}, 1000);


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
								$(this).parents('#sampleTable:eq(0)').
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
											buttons: false,
											});

										setTimeout(function() {
											window.location.reload();
										}, 1000);


									}
								});
							});
</script>
												




