
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Selamat Datang <b><?= $user['nama_user'] ?></b> Di Aplikasi PPDB Online </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

		
	

	
		
 


<div class="row">
		
				
		<div class="col-md-3 col-lg-3">
          <a href="?pg=daftar" style="text-decoration: none;">
			<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
				<div class="info">
				<h4>Pendaftar</h4>
				<p><b><?= rowcount($koneksi, 'siswa', ['jenis' => 1]) ?></b></p>
				</div>
			</div>
			</a>
        </div>
        <div class="col-md-6 col-lg-3">
			<a href="?pg=diterima" style="text-decoration: none;">
			  <div class="widget-small info coloured-icon"><i class="icon fa fa fa-users fa-3x"></i>
				<div class="info">
				  <h4>Terima</h4>
				  <p><b><?= rowcount($koneksi, 'siswa', ['jenis' => 1,'status' => 4]) ?></b></p>
				</div>
			  </div>
			</a>
        </div>
        <div class="col-md-6 col-lg-3">
			<a href="?pg=pending" style="text-decoration: none;">
			  <div class="widget-small warning coloured-icon"><i class="icon fa fa fa-users fa-3x"></i>
				<div class="info">
				  <h4>Pending</h4>
				  <p><b><?= rowcount($koneksi, 'siswa',  ['jenis' => 1,'status' => 0]) ?></b></p>
				</div>
			  </div>
			</a>
        </div>
        <div class="col-md-6 col-lg-3">
			<a href="?pg=bayar" style="text-decoration: none;">
			  <div class="widget-small danger coloured-icon"><i class="icon fa fa-clone fa-3x"></i>
				<div class="info">
				  <h4>Bayar</h4>
				  <p><b><?= rowcount($koneksi, 'bayar') ?></b></p>
				</div>
			  </div>
			</a>
        </div>
      </div>



	 
         <div class="row">
<div class="col-md-8">
<div class="card">
  
  <div class="card-body">
    <ul class="nav nav-tabs" id="myTab5" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5" role="tab" aria-controls="home" aria-selected="true">
          <i class="fa fa-home"></i> Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">
          <i class="fa fa-id-card"></i> Alamat Lembaga</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact" aria-selected="false">
          <i class="fa fa-phone"></i> Contact</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" id="kepala-tab5" data-toggle="tab" href="#kepala5" role="tab" aria-controls="kepala" aria-selected="false">
          <i class="fa fa-user"></i> Data Kepala</a>
      </li>
    </ul>
	<hr>
    <div class="tab-content" id="myTabContent5">
      <div class="tab-pane fade show active" id="home5" role="tabpanel" aria-labelledby="home-tab5">
        <form id="form-setting1">
            <div class="card" id="settings-card">
                
                     <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">NSM</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="nsm" class="form-control" value="<?= $setting['nsm'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">NPSN </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="npsn" class="form-control" value="<?= $setting['npsn'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Sekolah</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="nama" class="form-control" value="<?= $setting['nama_sekolah'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Jenjang Sekolah</label>
                        <div class="col-sm-6 col-md-9">
                            
                            <select name="jenjang"  class="form-control input-sm input-select"value="<?= $setting['jenjang'] ?>" >
								  <option value="<?= $setting['jenjang'] ?>" >
										<?php if ($setting['jenjang'] == 1) { ?>
											<span class="badge badge-success">MA/SMA/SMK</span>
										<?php } elseif ($setting['jenjang'] == 2) { ?>
											<span class="badge badge-danger">SMP/MTS </span>
										<?php } else { ?>
											<span class="badge badge-warning">SD/MI</span>
										<?php } ?>
								  </option>
								 <option value="1" >MA/SMA/SMK</option>
                                <option value="2" >SMP/MTS</option>
								<option value="3" >SD/MI</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Status Sekolah</label>
                        <div class="col-sm-6 col-md-9">
                            
                            <select name="status"  class="form-control input-sm input-select"value="<?= $setting['status'] ?>" required>
                                <option value="<?= $setting['status'] ?>" ><?= $setting['status'] ?></option>
								<option value="Negeri" >Negeri</option>
                                <option value="Swasta" >Swasta</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                    <button class="btn btn-secondary" type="button">Reset</button>
                </div>
           
        </form>
		 </div>
		  
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-setting1').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=profile',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                swal({
					title: 'Sukses !!',
					text: 'Data  Berhasil disimpan',
					type: 'success',
                    });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);


            }
        });
    });
</script>
      <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
        <form id="form-setting2">
            <div class="card" id="settings-card">
                
                     <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Alamat Lengkap</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="alamat" class="form-control" value="<?= $setting['alamat'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Provinsi </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="provinsi" class="form-control" value="<?= $setting['provinsi'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kabupaten</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="kab" class="form-control" value="<?= $setting['kab'] ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Kecamatan</label>
                        <div class="col-sm-6 col-md-9">
                            
                            <input type="text" name="kec" class="form-control" value="<?= $setting['kec'] ?>" required>
                                
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                    <button class="btn btn-secondary" type="button">Reset</button>
                </div>
            
        </form>
		</form>
		 </div>
		  
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-setting2').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=alamat',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                 swal({
					title: 'Sukses !!',
					text: 'Data  Berhasil disimpan',
					type: 'success',
                    });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);


            }
        });
    });
</script>
      
      <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">
               <form id="form-setting3">
            <div class="card" id="settings-card">
                
                     <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">No Telpon</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="no_telp" class="form-control" value="<?= $setting['no_telp'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="email" class="form-control" value="<?= $setting['email'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Website</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="web" class="form-control" value="<?= $setting['web'] ?>" required>
                        </div>
                    </div>
                    
                    
                    
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                    <button class="btn btn-secondary" type="button">Reset</button>
                </div>
            
        </form>
		</form>
		 </div>
		  
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-setting3').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=kontak',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                 swal({
					title: 'Sukses !!',
					text: 'Data  Berhasil disimpan',
					type: 'success',
                    });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);


            }
        });
    });
</script>
<div class="tab-pane fade" id="kepala5" role="tabpanel" aria-labelledby="kepala-tab5">
               <form id="form-setting4">
            <div class="card" id="settings-card">
                
                     <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kepala Madrasah/Sekolah</label>
                        <div class="col-sm-6 col-md-9">
                           <input type="text" name="kepala" class="form-control" value="<?= $setting['kepala'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nip </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="nip" class="form-control" value="<?= $setting['nip'] ?>" required>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                    <button class="btn btn-secondary" type="button">Reset</button>
                </div>
            
        </form>
		</form>
		 </div>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-setting4').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=kepala',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                 swal({
					title: 'Sukses !!',
					text: 'Data  Berhasil disimpan',
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
  </div>
  
  
</div>

        <div class="col-md-4 mb-3"
        <form id="hapus">
               <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../<?= $setting['logo'] ?>" alt="logo"  width="140" >
                    <div class="mt-3">
                     <a target="" href="?pg=profil_lembaga" type="button" class="btn btn-sm  btn-success"><i class="fa fa-user   "></i></a> 
					 <a target="" href="?pg=setting" type="button" class="btn btn-sm  btn-warning"><i class="fa fa-cog   "></i></a> 
					 <button data-id="" class="hapus btn btn-sm btn-danger"><i class="fa fa-sign-in fa-lg fa-fw   "></i></button>
                                        <!-- Button trigger modal -->
					 
					
					
                       
                    </div>
                  </div>
                </div>
              </div>
              </form>
		<br>
		
          <div class="tile">
            
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo3"></canvas>
            </div>
          </div>
        
		
      </div>
        </div>
<?php if ($setting['ppdb'] == 1) { ?>
					 
					 
<script>
$('#hapus').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
       
      	swal({
      		title: "Peringatan!!",
      		text: "Kamu akan keluar dari halaman ini",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Ya. Lanjutkan!",
      		cancelButtonText: "Tidak..Batalkan!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			$.ajax({
                    url: 'logout2.php',
                    method: "POST",
                    success: function(data) {
                        swal({
        					title: 'Sukses !!',
        					text: 'Logout Berhasil',
        					type: 'success',
                            });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
      		} else {
      			swal("Batal !!", "Yakin Anda akan Batalkan :)", "error");
      		}
      	});
      });
</script>
<?php } else { ?>
<script>
$('#hapus').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
       
      	swal({
      		title: "Peringatan!!",
      		text: "Kamu akan keluar dari halaman ini",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Ya. Lanjutkan!",
      		cancelButtonText: "Tidak..Batalkan!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			$.ajax({
                    url: 'logout.php',
                    method: "POST",
                    success: function(data) {
                        swal({
        					title: 'Sukses !!',
        					text: 'Logout Berhasil',
        					type: 'success',
                            });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
      		} else {
      			swal("Batal !!", "Yakin Anda akan Batalkan :)", "error");
      		}
      	});
      });
</script>					 
					  <?php } ?>      
   
		
<div class="row">
<div class="col-md-12">
   <div class="card">
	<div class="card-header text-white" style="background-color: #005f6b">
	   <h4>Data Statistik Asal Sekolah Pendaftar</h4>
		
	</div>
	<div class="card-body">
		<div class="table-responsive">
			 <table style="font-size: 12px" class="table table-striped table-sm" id="example">
				<thead>
					<tr>
					
						
						<th>NAMA SEKOLAH</th>
						<th class="text-center">Jumlah Siswa</th>
					</tr>
				</thead>
				<tbody class="ui-sortable">
					<?php 
						$query = mysqli_query($koneksi, "select * from siswa where jenis in(1) group by asal_sekolah");
						$no = 0;
					while ($sekolah = mysqli_fetch_array($query)) {
						$no++;
						$hitung = rowcount($koneksi, 'siswa', ['asal_sekolah' => $sekolah['asal_sekolah']]);
						
					?>
						 <?php if ($sekolah['asal_sekolah'] == null) { ?>
											 
											<?php } else { ?>
						<tr>
							
							
							<td><?= $sekolah['asal_sekolah'] ?></td>

							<td class="text-center">
								<div class="badge badge-success"><?= $hitung ?></div>
							</td>
						</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
</div> 
</div>
</div>	
        




        
     

