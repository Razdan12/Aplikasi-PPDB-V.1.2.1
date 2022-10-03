<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-bank"></i>Siswa Kelas</h1>
          
        </div>
        
 </div>


	
<div class="modal fade" id="datakelas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Data Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      
	
						<?php
						$query = mysqli_query($koneksi, "SELECT id_jenjang,nama_jenjang,kode FROM jenjang where status in('1')");
						while ($kelas = mysqli_fetch_array($query)) {
						?>
						<li>
							<a href="?pg=ubahkelas&id=<?= enkripsi($kelas['id_jenjang']) ?>"  class="btn btn-block btn-primary"><?= $kelas['kode'] ?> <?= $kelas['nama_jenjang'] ?></a>
						</li>
						<?php } ?>
						<div class="col-md-2">
							<a href="?pg=ubahkelas"  class="btn btn-block btn-primary">Semua Siswa </a>
						</div>
						
						
               			
				
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
               
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
				 <h3 class="tile-title">Data Belum masuk kelas</h3>
				 <small>Untuk merubah Kelas siswa, Silahkan Ceklis Siswa yang bersangkutan Lalu pilih kelas Tujuan dan klik <b>Ubah Kelas</b> </small>
				</div>
				<div class="col-sm-4">
					<select class="form-control select2" style="width: 100%" name="kelas" required>
											<option value="">Pilih Kelas Tujuan</option>
											
											<?php
											$query = mysqli_query($koneksi, "SELECT id_jenjang,nama_jenjang,kode FROM jenjang where status in('1')");
											while ($kelas = mysqli_fetch_array($query)) {
											?>
												<option value="<?= $kelas['id_jenjang'] ?>"><?= $kelas['kode'] ?> <?= $kelas['nama_jenjang'] ?></option>
											<?php } ?>
										</select>
				</div>
				<div class="col-sm-2">
					<button type="submit"  name="submit" class="btn btn-block btn-primary">Ubah Kelas </button>
				</div>
				<div class="col-sm-2">
				<div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Lihat Kelas</a>
                        <div class="dropdown-menu">
							<a href="?pg=ubahkelas" class="dropdown-item has-icon"><i class="fa fa-eye"></i> Belum Masuk Kelas</a>
						   <a href="?pg=siswa" class="dropdown-item has-icon"><i class="fa fa-eye"></i> Semua Siswa</a>
                          <?php
                            $query = mysqli_query($koneksi, "select * from jenjang where status='1'");
                            while ($kelas = mysqli_fetch_array($query)) {
                            ?>
							<a href="?pg=ubahkelas&id=<?= enkripsi($kelas['id_jenjang']) ?>" class="dropdown-item has-icon"><i class="fa fa-eye"></i> <?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?></a>
                           <?php } ?>
						   
                         
                        </div>
               </div>
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
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
								<th>Kelas</th>
                                
                                <th>Action</th>
							
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query = mysqli_query($koneksi, "select * FROM siswa WHERE kelas in('') and status in('1')");
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
                                    <?php if ($siswa['kelas'] == 0) { ?>
											 <td> Null</td>
											<?php } else { ?>
											<td>
											<?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?></i>
												</td>
											<?php } ?>
							        
									<td>
									
                                       
										 <a data-toggle="tooltip" data-placement="top" title="" data-original-title="ubah siswa" href="?pg=ubahsiswa&id=<?= enkripsi($siswa['id_siswa']) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit    "></i></a>
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
									url: 'mod_jenjang/crud_jenjang.php?pg=kelasku',
									data: $(this).serialize(),
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
								return false;
							});
</script>
			</div>
			</div>

<?php } else { ?>
<?php $jenjang = fetch($koneksi, 'jenjang', ['id_jenjang' => dekripsi($_GET['id'])]) ?>
<div class="row">
        
		<div class="col-md-12">
		
		
		<div class="row gutters-sm">
              <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://rdm.ma.nwkaltara.web.id/assets/images/kelas.png" alt="Admin" class="rounded-circle" width="130">
                    <div class="mt-3">
                      <!-- ngIf: datakelasSelect.jurusan_nama=='' -->
                      <!-- ngIf: datakelasSelect.jurusan_nama!=='' --><h4 ng-if="datakelasSelect.jurusan_nama!==''" ng-bind="datakelasSelect.tingkat_nama +'.'+datakelasSelect.jurusan_nama+'.'+ datakelasSelect.kelas_nama" class="ng-binding ng-scope"><?= $jenjang['kode'] ?>-<?= $jenjang['nama_jenjang'] ?></h4><!-- end ngIf: datakelasSelect.jurusan_nama!=='' -->
                      <iframe name='cetakdata' src='mod_siswa/data.php?id=<?= enkripsi($jenjang['id_jenjang']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['cetakdata'].print()" class='btn  btn-flat btn-success'><i class='fa fa-print'></i></button>		  
			   
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-md-8 mb-3">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title mb-0">Rincian Kelas</h5>
                    </div>
                    </div>
                  </div>
				  
							
                <div class="card-body pb-0">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path></svg>
                    Jumlah Siswa
                    </h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.mapel_nama"><?= rowcount($koneksi, 'siswa', ['kelas' => $jenjang['id_jenjang'],'status'=>1,]) ?> Siswa</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    Laki Laki</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.jum_siswa"><?= rowcount($koneksi, 'siswa', ['kelas' => $jenjang['id_jenjang'],'jk'=>'l',]) ?> Siswa</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path fill="none" d="M16.254,3.399h-0.695V3.052c0-0.576-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042v0.347H6.526V3.052c0-0.576-0.467-1.042-1.042-1.042S4.441,2.476,4.441,3.052v0.347H3.747c-0.768,0-1.39,0.622-1.39,1.39v11.813c0,0.768,0.622,1.39,1.39,1.39h12.507c0.768,0,1.391-0.622,1.391-1.39V4.789C17.645,4.021,17.021,3.399,16.254,3.399z M14.17,3.052c0-0.192,0.154-0.348,0.348-0.348c0.191,0,0.348,0.156,0.348,0.348v0.347H14.17V3.052z M5.136,3.052c0-0.192,0.156-0.348,0.348-0.348S5.831,2.86,5.831,3.052v0.347H5.136V3.052z M16.949,16.602c0,0.384-0.311,0.694-0.695,0.694H3.747c-0.384,0-0.695-0.311-0.695-0.694V7.568h13.897V16.602z M16.949,6.874H3.052V4.789c0-0.383,0.311-0.695,0.695-0.695h12.507c0.385,0,0.695,0.312,0.695,0.695V6.874z M5.484,11.737c0.576,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043s-1.042,0.467-1.042,1.043C4.441,11.271,4.908,11.737,5.484,11.737z M5.484,10.348c0.192,0,0.347,0.155,0.347,0.348c0,0.191-0.155,0.348-0.347,0.348s-0.348-0.156-0.348-0.348C5.136,10.503,5.292,10.348,5.484,10.348z M14.518,11.737c0.574,0,1.041-0.467,1.041-1.042c0-0.576-0.467-1.043-1.041-1.043c-0.576,0-1.043,0.467-1.043,1.043C13.475,11.271,13.941,11.737,14.518,11.737z M14.518,10.348c0.191,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.156-0.348-0.348C14.17,10.503,14.324,10.348,14.518,10.348z M14.518,15.212c0.574,0,1.041-0.467,1.041-1.043c0-0.575-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042C13.475,14.745,13.941,15.212,14.518,15.212z M14.518,13.822c0.191,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.155-0.348-0.348C14.17,13.978,14.324,13.822,14.518,13.822z M10,15.212c0.575,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042c-0.576,0-1.042,0.467-1.042,1.042C8.958,14.745,9.425,15.212,10,15.212z M10,13.822c0.192,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348s-0.348-0.155-0.348-0.348C9.653,13.978,9.809,13.822,10,13.822z M5.484,15.212c0.576,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042s-1.042,0.467-1.042,1.042C4.441,14.745,4.908,15.212,5.484,15.212z M5.484,13.822c0.192,0,0.347,0.155,0.347,0.347c0,0.192-0.155,0.348-0.347,0.348s-0.348-0.155-0.348-0.348C5.136,13.978,5.292,13.822,5.484,13.822z M10,11.737c0.575,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043c-0.576,0-1.042,0.467-1.042,1.043C8.958,11.271,9.425,11.737,10,11.737z M10,10.348c0.192,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348s-0.348-0.156-0.348-0.348C9.653,10.503,9.809,10.348,10,10.348z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    Perempuan</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.tahunajaran_id+'/'+((datakelasSelect.tahunajaran_id*1)+1)"><?= rowcount($koneksi, 'siswa', ['kelas' => $jenjang['id_jenjang'],'jk'=>'p',]) ?> Siswa</span>
                  </li>
                  

                </ul>
              </div>

              </div>
            </div>
            </div>
		<form id="form-kelas" method="post">
          <div class="tile">
		  
				<div class="row">
				<div class="col-md-4">
				 <h3 class="tile-title">Data Kelas (<?= $jenjang['kode'] ?>-<?= $jenjang['nama_jenjang'] ?>)</h3>
				 <small>Untuk merubah Kelas siswa, Silahkan Ceklis Siswa yang bersangkutan Lalu pilih kelas Tujuan dan klik <b>Ubah Kelas</b> </small>
				</div>
				<div class="col-md-4">
					<select class="form-control select2" style="width: 100%" name="kelas" required>
											<option value="">Pilih Kelas Tujuan</option>
											
											<?php
											$query = mysqli_query($koneksi, "SELECT id_jenjang,nama_jenjang,kode FROM jenjang where status in('1')");
											while ($kelas = mysqli_fetch_array($query)) {
											?>
												<option value="<?= $kelas['id_jenjang'] ?>"><?= $kelas['kode'] ?> <?= $kelas['nama_jenjang'] ?></option>
											<?php } ?>
										</select>
				</div>
				<div class="col-md-2">
					<button type="submit"  name="submit" class="btn btn-block btn-primary">Ubah Kelas </button>
					
				</div>
				<div class="col-md-2">
				
				 <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Lihat Kelas</a>
                        <div class="dropdown-menu">
                          <a href="?pg=ubahkelas" class="dropdown-item has-icon"><i class="fa fa-eye"></i> Belum Masuk Kelas</a>
						   <a href="?pg=siswa" class="dropdown-item has-icon"><i class="fa fa-eye"></i> Semua Siswa</a>
						   <?php
                            $query = mysqli_query($koneksi, "select * from jenjang where status='1'");
                            while ($kelas = mysqli_fetch_array($query)) {
                            ?>
							<a href="?pg=ubahkelas&id=<?= enkripsi($kelas['id_jenjang']) ?>" class="dropdown-item has-icon"><i class="fa fa-eye"></i> <?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?></a>
                           <?php } ?>
						  
                         
                        </div>
               </div>
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
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
								<th>Kelas</th>
                                
                                <th>Action</th>
							
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
							       
									<td>
									
                                       
										 <a data-toggle="tooltip" data-placement="top" title="" data-original-title="ubah siswa" href="?pg=ubahsiswa&id=<?= enkripsi($siswa['id_siswa']) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit    "></i></a>
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
									url: 'mod_jenjang/crud_jenjang.php?pg=kelasku',
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
								return false;
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
												

