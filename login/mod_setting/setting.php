<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<section class='content'>
														<div class="row">
        <div class="col-md-6">
          <div class="tile">
             <div class="tile-body">
              	<form id="form-setting">
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Pengaturan UMUM</h3>
										
									</div><!-- /.box-header -->
									<div class='box-body'>
										
										<div class='form-group'>
											<label>Naungan Lembaga</label>
											<input type='text' name='lembaga' value="<?= $setting['lembaga'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<label>Nama Sekolah</label>
											<input type='text' name='nama_sekolah' value="<?= $setting['nama_sekolah'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>NSM/NSS Sekolah</label>
													<input type='text' name='nsm' value="<?= $setting['nsm'] ?>" class='form-control' required='true' />
												</div>
												<div class='col-md-6'>
													<label>NPSN Sekolah</label>
													<input type='text' name='npsn' value="<?= $setting['npsn'] ?>" class='form-control' required='true' />
												</div>
											</div>
										</div>
										
										<div class='form-group'>
											<div class='row'>
												<div class="col-sm-6 col-md-6">
													<label>Logo</label>
													<input type='file' name='logo' class='form-control' />
												</div>
												<div class="col-sm-6 col-md-6">
													&nbsp;<br />
													 <img src="../<?= $setting['logo'] ?>" class="img-thumbnail" width="100">
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-12'>
													<label>Kop Sekolah</label>
													<input type='file' name='kop' class='form-control' />
												</div>
												<div class="col-sm-6 col-md-12">
													&nbsp;<br />
													 <img src="../<?= $setting['kop'] ?>" class="img-thumbnail" width="800">
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-12'>
													<label>Logo PPDB</label>
													<input type='file' name='logo_ppdb' class='form-control' />
												</div>
												<div class="col-sm-6 col-md-12">
													&nbsp;<br />
													 <img src="../<?= $setting['logo_ppdb'] ?>" class="img-thumbnail" width="800">
												</div>
											</div>
										</div>
										
							</div><!-- /.box-body -->
								</div><!-- /.box -->
								<div class="tile-footer">
							  <button class="btn btn-primary" type='submit' id="save-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
							</div>
							</form>
						</div>
						
			</div>
					<script>
						$('.custom-file-input').on('change', function() {
							let fileName = $(this).val().split('\\').pop();
							$(this).next('.custom-file-label').addClass("selected").html(fileName);
						});
						$('#form-setting').on('submit', function(e) {
							e.preventDefault();
							$.ajax({
								type: 'post',
								url: 'mod_setting/crud_setting.php?pg=ubah',
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
									title: 'Terimakasih',
									text: 'Data Berhasil Disimpan!',
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
						<div class="col-md-6">
				  <div class="tile">
					 <div class="tile-body">
							<form id="form-setting">
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Pengaturan PPDB</h3>
										
									</div><!-- /.box-header -->
									<hr>
									<div class='box-body'>
										<div class="row">
										  
										 
									 <div class="col-lg-12">
										  <div class="widget-small info coloured-icon"><i class="icon fa fa-edit"></i>
											<div class="info">
											<h4>Info PPDB</h4>
											<p>Setting pengaturan info PPDB Anda disini.</p>
											<a href="?pg=pengumuman" class="card-cta">Change Setting <i class="fa fa-chevron-right"></i></a>
										  </div>
										</div>
									  </div>
									   
									 
										
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</form>
						</div>
					
					</div>
												
											
						<div class='col-md-12'>
							<form id="form-live">
								<div class='box box-solid'>
								    
								    <div class='box-header with-border'>
										<h3 class='box-title'>Jadwal PPDB</h3>
										
									</div>
										<div class='form-group'>
											<label>Tanggal Buka</label>
											<input type='date' name='tgl_pengumuman' value="<?= $setting['tgl_pengumuman'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<label>Tanggal Tutup </label>
											<input type='date' name='tgl_tutup' value="<?= $setting['tgl_tutup'] ?>" class='form-control' required='true' />
										</div>
								    
								    
									<div class='box-header with-border'>
										<h3 class='box-title'>Pengaturan Live Chat</h3>
										
									</div><!-- /.box-header -->
									<div class='box-body'>
									 
											<div class='form-group'>
											<label>Text Klik Chat Daftar</label>
											<textarea class="form-control" name="klikchat"><?= $setting['klikchat'] ?></textarea>
										</div>
										<div class='form-group'>
											<label>Text Live Chat</label>
											<textarea class="form-control" name="livechat"><?= $setting['livechat'] ?></textarea>
										</div>
										<div class='form-group'>
											<label>No WA Live Chat</label>
											<input type="text" name="nolivechat" class="form-control" value="<?= $setting['nolivechat'] ?>" required>
										</div>
										
										
				
									</div><!-- /.box-body -->
								</div><!-- /.box -->
								<div class="tile-footer">
							  <button class="btn btn-primary" type='submit' id="save-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
							</div>
							</form>
						</div>
						</div>	
						
						<script>
    $('#form-live').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=live',
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
					title: 'Terimakasih',
					text: 'Data Berhasil Disimpan!',
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
<script>
						 $('#form-live').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=jadwal',
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
									title: 'Terimakasih',
									text: 'Data Berhasil Disimpan!',
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