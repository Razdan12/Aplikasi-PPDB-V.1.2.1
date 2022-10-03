<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php $user = fetch($koneksi, 'user', ['id_user' => dekripsi($_GET['id'])]); ?>	
<section class='content'>
<div class="app-title">
          <h1><i class="fa fa-th-list"></i> Data Guru</h1>
        
        </div>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
             <div class="row gutters-sm">
			 			 <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
				  					 <img src="../default.png" alt="Foto Siswa" class="rounded-circle" width="150">
					                     <div class="mt-3">
                      <!-- ngIf: datakelasSelect.jurusan_nama=='' -->
                      <!-- ngIf: datakelasSelect.jurusan_nama!=='' --><h4 ng-if="datakelasSelect.jurusan_nama!==''" ng-bind="datakelasSelect.tingkat_nama +'.'+datakelasSelect.jurusan_nama+'.'+ datakelasSelect.kelas_nama" class="ng-binding ng-scope">
					  				 <button class="btn btn-success"><?= $user['nama_user'] ?></button>
								
				 
				</h4><!-- end ngIf: datakelasSelect.jurusan_nama!=='' -->
                        
                      <p class="text-muted font-size-sm font-weight-bold ng-binding" ng-bind="''+datakelasSelect.walas_nama+''"><?= $user['username'] ?></p>
					  
                    </div>
                  </div>
                </div>
              </div>
              </div>
			  <div class="col-md-8 mb-3">
              
			  <div class="card">
				 <div class="card-body">
				<form id="form-ubahpass">
					<input type="hidden" value="<?= $user['id_user'] ?>" name="id_user" class="form-control" ="">
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="text-info"><b>Nama Lengkap</b></i>
									</div>
								</div>
								<input class="form-control" type="text" name="nama_user" value="<?= $user['nama_user'] ?>" ="" />
							</div>
						</div>
						

						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="text-info"><b>NUPTK/PEG-ID</b></i>
									</div>
								</div>
								<input class="form-control" onkeypress="return hanyaAngka(this);" type="text" name="username" value="<?= $user['username'] ?>" ="" />
							</div>
						</div>

						

						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text ">
										<i class="text-info"><strong>NIK</strong></i>
									</div>
								</div>
								<input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" type="text" name="nik" value="<?= $user['nik'] ?>" ="" />
							</div>
						</div>

						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text ">
										<i class="text-info"><strong>Tempat Lahir</strong></i>
									</div>
								</div>
								<input class="form-control" type="text" name="tempat_lahir" value="<?= $user['tempat_lahir'] ?>" ="" />
							</div>
						</div>

						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text ">
										<i class="text-info"><strong>Tanggal Lahir</strong></i>
									</div>
								</div>
								<input class="form-control" type="date" name="tgl_lahir" value="<?= $user['tgl_lahir'] ?>" ="" />
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="text-info"><strong>Jenis Kelamin</strong></div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="customRadioInline1" name="jenkel" class="custom-control-input" value="L" <?php if ($user['jenkel'] == 'L') echo 'checked' ?>>
								<label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="customRadioInline2" name="jenkel" class="custom-control-input" value="P" <?php if ($user['jenkel'] == 'P') echo 'checked' ?>>
								<label class="custom-control-label" for="customRadioInline2">Perempuan</label>
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="text-info"><b>Pendidikan</b></i>
									</div>
								</div>
								<select class='form-control' name='pendidikan' >
									<option value=''>Pilih Pendidikan</option>";
									<?php foreach ($pendidikan as $val) { ?>
										<?php if ($user['pendidikan'] == $val) { ?>
											<option value='<?= $val ?>' selected><?= $val ?> </option>
										<?php  } else { ?>
											<option value='<?= $val ?>'><?= $val ?> </option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
							<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary"><i class="fa fa-save    "></i>Simpan Data</button>
						</div>
					</div>
					
					
				</form>
			</div>
			</div>

            </div>
            </div>
		 </div>
        </div>		

	


	
<!-- simpan Data -->
					<script>
				
				$(document).ready(function() {
					$('#form-ubahpass').submit(function(e) {
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'mod_user/crud_user.php?pg=ubah',
							data: $(this).serialize(),
							beforeSend: function() {
								$('#btnsimpan').prop('disabled', true);
							},
							success: function(data) {
								$('#btnsimpan').prop('disabled', false);
								swal({
									title: 'Sukses !!',
									text: 'Data Berhasil disimpan',
									type: 'success',
									});
									setTimeout(function() {
								window.location.reload();
							}, 1000);
							}
						});
						return false;
					});
				});
			</script>						
	
<!-- DATA Guru -->	
	
