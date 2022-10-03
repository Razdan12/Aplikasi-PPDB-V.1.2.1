<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<!-- Modal -->

<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Alumni</h1>
          <p>Data Alumni <?= $setting['nama_sekolah'] ?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
        <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-block btn-primary dropdown-toggle">Data Alumni</a>
                        <div class="dropdown-menu">
                          <?php
                            $query = mysqli_query($koneksi, "select * from siswa where status='3' group by tahun_lulus");
                            while ($angkatan = mysqli_fetch_array($query)) {
                            ?>
							<a href="?pg=alumni&tahun_lulus=<?= $angkatan['tahun_lulus'] ?>" class="dropdown-item has-icon"><i class="fa fa-eye"></i> <?= $angkatan['tahun_lulus'] ?></a>
                           <?php } ?>
						 
                        </div>
               </div>
					 
					
					
					<!-- Modal -->
			<div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="form-konfirmasi">
						<div class="modal-header">
							<h5 class="modal-title">Hapus Data Alumni</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							Terdapat <b><?= rowcount($koneksi, 'siswa where status=3') ?></b> Jumlah  Alumni Akan Di Hapus.
							

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Hapus Semua</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form id="form-import">
							<div class="modal-header">
								<h5 class="modal-title">Import Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="file">Import File Excel</label>
									<input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
									<small id="helpfile" class="form-text text-muted">File harus .xls <a href="template_excel/importalumni.xls">Download Format</a></small>
									
								</div>
							   
								
						
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		
				</ul>
		 </div>
<script>
$('#form-konfirmasi').submit(function(e) {
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'mod_siswa/crud_siswa.php?pg=hapusalumni',
		data: $(this).serialize(),
		success: function(data) {

			swal({
					title: 'Sukses !!',
					text: 'Data  Berhasil Di Hapus',
					type: 'success',
                    });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
			$('#modal-edit<?= $no ?>').modal('hide');
			//$('#bodyreset').load(location.href + ' #bodyreset');
		}
	});
	return false;
});
</script>
<?php if (isset($_GET['tahun_lulus']) == '') { ?>

<div class="row">
		<div class="col-md-8">
		
		<div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                
                    <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="example"width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No
                                
                                <th>NISN</th>
                                <th>Nama Alumni</th>
                                <th>Jenis Kelamin</th>
                               
                                <th>Tahun Lulus</th>
                                <th>No Ijazah</th>
							
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query = mysqli_query($koneksi, "select * from siswa where status='3' order by tahun_lulus");
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    
									
                                    <td class="str"><?= $siswa['nisn'] ?></td>
                                   
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td><?php if ($siswa['jk'] == 'L') { ?> Laki Laki <?php } else { ?> Perempuan <?php } ?></td>
                                    
							        <td><?= $siswa['tahun_lulus'] ?></td>
									
                                    					
									 
									     
									 
									<td><?= $siswa['no_ijazahalumni'] ?></td>
                                       
							<?php }
										?>
						</tbody></table>
					</div>
				</div>
			</div>
		  
		</div>

        <div class="col-md-4 mb-3">
               <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../<?= $setting['logo'] ?>" alt="Admin" class="rounded-circle" width="140" >
                    <div class="mt-3">
					<button type="button" class="btn btn-sm btn-secondary m-b-5" data-toggle="modal" data-target="#importdata"><i class="sidebar-item-icon fa fa-upload"></i>
					</button>
                     <a class="btn btn-sm btn-primary" href="mod_siswa/export_alumni.php" role="button"> <i class="sidebar-item-icon fa fa-download"></i> </a>
					 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusdata"><i class="sidebar-item-icon fa fa-trash"></i> </button>
					 
					
					
                       
                    </div>
                  </div>
                </div>
              </div>
              
		<br>
		
          <div class="tile">
            
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo2"></canvas>
            </div>
          </div>
        
		
      </div>
        </div>
		<div class="row">
        <div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Progres Data Alumni</h3>
				<div class="embed-responsive embed-responsive-16by9">
				  <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
				</div>
			  </div>
		  
			</div></div>
<script>
	$('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_siswa/crud_siswa.php?pg=importalumni',
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

                $('#importdata').modal('hide');
                swal({
					title: 'Sukses !!',
					text: data,
					type: 'success',
                    });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);


            }
        });
    });
	
</script>
		
		
<?php } else { ?>
<?php $siswa = fetch($koneksi, 'siswa', ['tahun_lulus' => ($_GET['tahun_lulus'])]);
?>

		<div class="row">
        <div class="col-md-12">
          <div class="tile bg-warning">
		  <div class="row">
				<div class="col-md-8">
				 <h3 class="tile-title">Data Alumni  Tahun <?= $siswa['tahun_lulus'] ?> </h3>
				 
				</div>
				<div class="col-md-1">
				<iframe name='cetakalumni' src='mod_siswa/cetak_alumni.php?tahun=<?= $siswa['tahun_lulus'] ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['cetakalumni'].print()" class='btn  btn-primary'><i class='fa fa-print'></i></button>
				</div>
				<div class="col-md-3">
					
					<div class="dropdown">
						<a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Tahun Lulus</a>
						<div class="dropdown-menu">
						  
						 <?php $query = mysqli_query($koneksi, "select * from siswa  where status ='3' group by tahun_lulus  ");
												 $no = 0;
												while ($tahun_lulus = mysqli_fetch_array($query)) {
													$no++;
													
													
												?>
							<a href="?pg=alumni&tahun_lulus=<?= $tahun_lulus['tahun_lulus'] ?>" class="dropdown-item has-icon"><i class="fa fa-eye"></i> <?= $tahun_lulus['tahun_lulus'] ?></a>
						   <?php } ?>
						  
						 
						</div>
			   </div>
				</div>
								
				</div>
			</div>
			
            <div class="tile">
              <div class="table-responsive">
                
                    <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="example"width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No
                                
                                <th>NISN</th>
                                <th>Nama Alumni</th>
                                <th>JK</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Tahun Lulus</th>
								
                                <th>No Belangko Ijazah</th>
                                <th>Action</th>
							
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                             $query = mysqli_query($koneksi, "select * from siswa where status ='3' and tahun_lulus='$siswa[tahun_lulus]'");
							 
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
                                $tgl_lahirsiswa = $siswa['tgl_lahir'];
                                $no++;
                                
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    
									
                                    <td class="str"><?= $siswa['nisn'] ?></td>
                                   
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td><?= $siswa['jk'] ?></td>
                                    <td><?= $siswa['tempat_lahir'] ?>, <?php echo tgl_indo("$tgl_lahirsiswa");?></td>
                                   
							        <td><?= $siswa['tahun_lulus'] ?></td>
									<td><?= $siswa['no_ijazahalumni'] ?></td>
									
									
                                    					
									 
									     
									 
									<td>
									<a data-toggle="tooltip" data-placement="top" title="" data-original-title="ubah siswa" href="?pg=ubahsiswa&id=<?= enkripsi($siswa['id_siswa']) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit    "></i></a>
																				<!-- Button trigger modal -->
									 <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            <i class="fa fa-edit    "></i> 
                                        </button>
									 <!-- Modal -->
									<div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form id="form-edit<?= $no ?>">
													<div class="modal-header">
														<h5 class="modal-title">Edit Data</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" required="">
														<div class="form-group">
															<label>Nama ALumni</label>
															<input type="text" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" class="form-control" readonly="">
															
														</div>
														<div class="form-group">
															<label>No Ijazah</label>
															<input type="text" name="no_ijazahalumni" value="<?= $siswa['no_ijazahalumni'] ?>" class="form-control" ="">
															
														</div>
														
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Save</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<script>
                                    $('#form-edit<?= $no ?>').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_siswa/crud_siswa.php?pg=no_ijazah',
                                            data: $(this).serialize(),
                                            success: function(data) {

                                                swal({
                                					title: 'Sukses !!',
                                					text: 'Data  Berhasil disimpan',
                                					type: 'success',
                                                    });
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 1000);
                                                $('#modal-edit<?= $no ?>').modal('hide');
                                                //$('#bodyreset').load(location.href + ' #bodyreset');
                                            }
                                        });
                                        return false;
                                    });
                                </script>
										<button data-id="<?= $siswa['id_siswa'] ?>" class="hapus btn-sm btn btn-danger"><i class="fa fa-trash    "></i></button>
										<script>
										$('#example').on('click', '.hapus', function() {
                                        var id = $(this).data('id');
                                        console.log(id);
                                       
                                      	swal({
                                      		title: "Are you sure?",
                                      		text: "Kamu akan membatalkan Status Alumni!",
                                      		type: "warning",
                                      		showCancelButton: true,
                                      		confirmButtonText: "Ya, Batalkan!",
                                      		cancelButtonText: "No, cancel !",
                                      		closeOnConfirm: false,
                                      		closeOnCancel: false
                                      	}, function(isConfirm) {
                                      		if (isConfirm) {
                                      			$.ajax({
                                                    	url: 'mod_siswa/crud_siswa.php?pg=batallulus',
                                                    method: "POST",
                                                    data: 'id_siswa=' + id,
                                                    success: function(data) {
                                                        swal({
                                        					title: 'Sukses !!',
                                        					text: 'Data  Berhasil dibatalkan',
                                        					type: 'success',
                                                            });
                                                        setTimeout(function() {
                                                            window.location.reload();
                                                        }, 1000);
                                                    }
                                                });
                                      		} else {
                                      			swal("Cancelled", "Your imaginary file is safe :)", "error");
                                      		}
                                      	});
                                      });
                                      
                                      
                                      
                                      
									</script>
									</td>
                                       
							<?php }
										?>
						</tbody></table></div>
					</div>
				
			</div></div>


<?php } ?>
