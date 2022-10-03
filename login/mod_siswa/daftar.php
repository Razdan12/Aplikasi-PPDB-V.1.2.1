<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami");
?>
<!-- Modal -->

<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Siswa</h1>
          <p>Data Siswa Aktif Saat ini</p>
        </div>
		
	
		
	  
        <ul class="app-breadcrumb breadcrumb side">
		
		
		<a class="btn btn-sm btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1"hidden>Action</a>
          <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-block btn-primary dropdown-toggle">Lihat Kelas</a>
                        <div class="dropdown-menu">
                          <?php
                            $query = mysqli_query($koneksi, "select * from jenjang where status='1'");
                            while ($kelas = mysqli_fetch_array($query)) {
                            ?>
							<a href="?pg=ubahkelas&id=<?= enkripsi($kelas['id_jenjang']) ?>" class="dropdown-item has-icon"><i class="fa fa-eye"></i> <?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?></a>
                           <?php } ?>
						   <a href="?pg=ubahkelas" class="dropdown-item has-icon"><i class="fa fa-eye"></i> Belum Masuk Kelas</a>
                         
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
									<small id="helpfile" class="form-text text-muted">File harus .xls <a href="template_excel/importsiswa.xls">Download Format</a></small>
									
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
<div class="modal fade" id="tampil" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tampil">
				
                    <div class="modal-header">
                        <h5 class="modal-title">Setting Tampilan Kolom</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    
					<div class="card" id="settings-card">
						
						<div class="card-body"
						
						<div class="form-group row align-items-center">
							
							<div class="col-sm-6 col-md-12">

								<div class="form-group col-md-12">
									
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="nis" name="nis" value="Y" <?php if ($tampil['nis'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="tk">NIS Lokal</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="nisn" name="nisn" value="Y" <?php if ($tampil['nisn'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="tk">NISN</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="nik" name="nik" value="Y" <?php if ($tampil['nik'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">NIK</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="no_kk" name="no_kk" value="Y" <?php if ($tampil['no_kk'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">No KK</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="no_kip" name="no_kip" value="Y" <?php if ($tampil['no_kip'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">No KIP</label>
									</div>
									
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="no_hp" name="no_hp" value="Y" <?php if ($tampil['no_hp'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">No. HP</label>
									</div>
									
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="nama_ayah" name="nama_ayah" value="Y" <?php if ($tampil['nama_ayah'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">Nama Ayah</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="status_ayah" name="status_ayah" value="Y" <?php if ($tampil['status_ayah'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">Status Ayah</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="nik_ayah" name="nik_ayah" value="Y" <?php if ($tampil['nik_ayah'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">NIK Ayah</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="pendidikan_ayah" name="pendidikan_ayah" value="Y" <?php if ($tampil['pendidikan_ayah'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">Pendidikan Ayah</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="penghasilan_ayah" name="penghasilan_ayah" value="Y" <?php if ($tampil['penghasilan_ayah'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">penghasilan Ayah</label>
									</div>
										<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="nama_ibu" name="nama_ibu" value="Y" <?php if ($tampil['nama_ibu'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">Nama Ibu</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="status_ibu" name="status_ibu" value="Y" <?php if ($tampil['status_ibu'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">Status Ibu</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="nik_ibu" name="nik_ibu" value="Y" <?php if ($tampil['nik_ibu'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">NIK Ibu</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="pendidikan_ibu" name="pendidikan_ibu" value="Y" <?php if ($tampil['pendidikan_ibu'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">Pendidikan Ibu</label>
									</div>
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="checkbox" id="penghasilan_ibu" name="penghasilan_ibu" value="Y" <?php if ($tampil['penghasilan_ibu'] == 'Y') echo 'checked' ?>>
										<label class="form-check-label" for="paud">penghasilan Ibu</label>
									</div>
									
								</div>
							</div>

						</div>
						<div class="card-footer bg-whitesmoke text-md-right">
						<button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
						</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
	
	$('#form-tampil').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'mod_setting/crud_setting.php?pg=tampil',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
		
			success: function(data) {

				swal({
						title: 'Terimakasih',
						text: 'Data Berhasil Di Perbaharui',
						type: 'success',
						
                        });
				setTimeout(function() {
					window.location.reload();
				}, 2000);


			}
		});
	});
</script>
		<div class="row">
        <div class="col-md-12">
		
		<form id="form-kelas" method="post">
           
          
			<div class="card-header bg-primary text-white" >
                <h4>Data Siswa Aktif </h4>
				<center>
                    <a class="btn btn-sm btn-info" href="mod_siswa/export_excel.php" role="button"> <i class="sidebar-item-icon fa fa-download"></i> Download</a>
					<button type="button" class="btn btn-sm btn-secondary m-b-5" data-toggle="modal" data-target="#importdata"><i class="sidebar-item-icon fa fa-upload"></i> Import
					</button>
					<button type="button" id="btnhapus" class="btn btn-sm btn-danger"><i class="fa fa-trash    "> Hapus </i></button>
					<button type="button" class="btn btn-sm btn-warning m-b-5" data-toggle="modal" data-target="#tampil"><i class="sidebar-item-icon fa fa-table"></i>Tabel </button> 
		
			   </center>
				</div>
				
			<div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                
                    <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="example" width="100%">
                        <thead >
                            <tr>
                                <th><input type='checkbox' id='ceksemua'></th>
								<th class="text-center">
                                    No
                                
                                <th width="25%">Nama Siswa</th>
                                <th>JK</th>
                                <th>Tempat_Lahir</th>
                                <th width="15%">Tanggal_Lahir</th>
                                <?php if ($tampil['nis'] == 'Y') { ?> <th>NIS Lokal</th><?php } ?>
                                <?php if ($tampil['nisn'] == 'Y') { ?> <th>No NISN</th><?php } ?>
                                <?php if ($tampil['nik'] == 'Y') { ?> <th>No Nik</th><?php } ?>
                                <?php if ($tampil['no_kk'] == 'Y') { ?> <th>No KK</th><?php } ?>
                                <?php if ($tampil['no_kip'] == 'Y') { ?> <th>No KIP</th><?php } ?>
                                <?php if ($tampil['no_hp'] == 'Y') { ?> <th>No HP</th><?php } ?>
                                <?php if ($tampil['nama_ayah'] == 'Y') { ?> <th>Nama Ayah</th><?php } ?>
                                 <?php if ($tampil['nama_ibu'] == 'Y') { ?> <th>Nama_Ibu</th><?php } ?>
								<th>Kelas</th>
                                
								<th>Photo</th>
                                <th>Action</th>
							
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query = mysqli_query($koneksi, "select * from siswa where status='1'");
                            
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
								$kalimat = $siswa['nis'];
                                $tampil_nis    =substr($kalimat, 0, 15);
                                $tgl_lahirsiswa = $siswa['tgl_lahir'];
								$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
                                $no++;
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="kode[]" class="kode" id="kode-<?= $no ?>" value="<?= $siswa['id_siswa'] ?>"></td>
									<td><?= $no; ?></td>
                                    <td class="str"><b><?= $siswa['nama_siswa'] ?></b></td>
                                    <td><?= $siswa['jk'] ?></td>
                                    <td><?= $siswa['tempat_lahir'] ?></td>
                                    <td> <?php echo tgl_indo("$tgl_lahirsiswa");?></td>
                                    <?php if ($tampil['nis'] == 'Y') { ?> <td class="str"><?= $tampil_nis; ?></td><?php } ?>
                                    <?php if ($tampil['nisn'] == 'Y') { ?> <td class="str"><?= $siswa['nisn'] ?></td><?php } ?>
                                    <?php if ($tampil['nik'] == 'Y') { ?> <td class="str"><?= $siswa['nik'] ?></td><?php } ?>
                                    <?php if ($tampil['no_kk'] == 'Y') { ?> <td class="str"><?= $siswa['no_kk'] ?></td><?php } ?>
                                    <?php if ($tampil['no_kip'] == 'Y') { ?> <td class="str"><?= $siswa['no_kip'] ?></td><?php } ?>
                                    <?php if ($tampil['no_hp'] == 'Y') { ?> <td class="str"><?= $siswa['no_hp'] ?></td><?php } ?>
                                    <?php if ($tampil['nama_ayah'] == 'Y') { ?> <td class="str"><?= $siswa['nama_ayah'] ?></td><?php } ?>
                                    <?php if ($tampil['nama_ibu'] == 'Y') { ?> <td><?= $siswa['nama_ibu'] ?></td><?php } ?>
                                    
                                    <?php if ($siswa['kelas'] == null) { ?>
											 <td> Null</td>
											<?php } else { ?>
											<td>
											<?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?></i>
												</td>
											<?php } ?>
                                   
                                    
                                    
                                    
                                    
                                    
							       <td><img src="../<?= $siswa['foto'] ?>" class="img-thumbnail" width="25"></td>
									
									<td>
										<a data-toggle="tooltip" data-placement="top" title="" data-original-title="ubah siswa" href="?pg=ubahsiswa&id=<?= enkripsi($siswa['id_siswa']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit    "></i></a>
																				<!-- Button trigger modal -->
										
                                       
										
										
									 
						<!-- Button trigger modal -->
										
										
							<?php }
										?>
						</tbody></table></div>
					</div>
					</div>
					</form>
			
				</div>
			</div></div>

<script>
    //CEKBOX DAN HAPUS  
    $('#ceksemua').change(function() {
        $(this).parents('#example:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });
    $(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.kode:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_daftar/crud_daftar.php?pg=hapusdaftarcheck",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.kode:checked").each(function() {
                            $(this).parent().parent().remove('.kode').animate({
                                opacity: "hide"
                            }, "slow");
						swal({
						title: 'Terimakasih',
						text: 'Data Berhasil Di Hapus',
						type: 'success',
						
                        });
						setTimeout(function() {
							window.location.reload();
						}, 1000);
                        })
                    }
                }
            });
            return false;
        })
    });
</script>
<script>
	$('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_siswa/crud_siswa.php?pg=import',
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
					title: 'info !!',
					text: data,
					type: 'info',
                    });
                setTimeout(function() {
                    window.location.reload();
                }, 2500);


            }
        });
		 return false;
    });
	
</script>
<script>
    var cleaveI = new Cleave('.nisn', {

        blocks: [10]

    });
    var cleaveI = new Cleave('.nohp', {
        blocks: [4, 4, 4, 5]
    });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_siswa/crud_daftar.php?pg=tambah',
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
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    
</script>


<script>
$('#form-konfirmasi').submit(function(e) {
            e.preventDefault();
        swal({
            title: 'Apa kamu yakin ?',
            text: 'Akan Menghapus data anda ?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_siswa/crud_siswa.php?pg=konfirmasi',
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        iziToast.success({
                            title: 'Terimakasih!',
                            message: 'Data Berhasil di Hapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        })

    });
    $('#aktif').click(function(){
      	swal({
      		title: "Are you sure?",
      		text: "You will not be able to recover this imaginary file!",
      		icon: 'warning',
			type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Yes, delete it!",
      		cancelButtonText: "No, cancel plx!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			swal("Deleted!", "Your imaginary file has been deleted.", "success");
      		} else {
      			swal("Cancelled", "Your imaginary file is safe :)", "error");
      		}
      	});
      });
	  
	  
	  
	  $('#example').on('click', '.aktif', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Anda akan Merubah Status Emis?',
            text: 'Status Siswa tidak Valid di emis!',
            icon: 'info',
			buttons: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_siswa/crud_siswa.php?pg=tidakaktif',
                    method: "POST",
                   data: 'id_siswa=' + id,
                    success: function(data) {
                        swal({
						title: 'Terimakasih',
						text: 'Status Siswa  Valid di emis!',
						icon: 'success',
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        })

    });
    $('#example').on('click', '.tidakaktif', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Anda akan Merubah Status Emis?',
            text: 'Status Siswa  Valid di emis!',
            icon: 'warning',
			buttons: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_siswa/crud_siswa.php?pg=aktif',
                    method: "POST",
                    data: 'id_siswa=' + id,
                    success: function(data) {
                        swal({
						title: 'Terimakasih',
						text: 'Status Siswa  Valid di emis!',
						icon: 'success',
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        })

    });
</script>