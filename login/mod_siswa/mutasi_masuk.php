<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Mutasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>No Surat</label>
                        <input type="text" name="surat_masuk" class="form-control " ="">
                    </div>
					<div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tgl_mutasi" class="form-control " ="">
                    </div>
					<div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control " required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" required="">
                    </div>
					<div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required="">
                    </div>
					<div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control " ="">
                    </div>
					
					<div class="form-group">
                        <label for="jenis">Jenis Kelamin</label>
                        <select class='form-control' name='jk' >
						<option value=''>Pilih Jenis Kelamin</option>";
						<?php foreach ($jeniskelamin as $val => $key) { ?>
							<?php if ($siswa['jk'] == $val) { ?>
								<option value='<?= $val ?>' selected><?= $key ?> </option>
							<?php  } else { ?>
								<option value='<?= $val ?>'><?= $key ?> </option>
							<?php } ?>
						<?php } ?>
					</select>
                    </div>

                    <div class="form-group">
                        <label for="asal">Asal Sekolah</label>
                         <input type="text" name="asal_sekolah" class="form-control" required="">
                    </div>
					<div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control select2" style="width: 100%" name="kelas" required>
											<option value="">Pilih Kelas</option>
											
											<?php
											$query = mysqli_query($koneksi, "SELECT id_jenjang,nama_jenjang,kode FROM jenjang where status in('1')");
											
											while ($kelas = mysqli_fetch_array($query)) {
											?>
												<option value="<?= $kelas['id_jenjang'] ?>"><?= $kelas['kode'] ?> <?= $kelas['nama_jenjang'] ?></option>
											<?php } ?>
										</select>
                    </div>
					<div class="form-group">
                        <label for="jenis">Jenis Pendaftaran</label>
                        <select class="form-control" name="jenis" id="jenis">
                            <option value="2">Pindahan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat_siswa" class="form-control" required="">
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white" >
                <h4>Data Mutasi Masuk</h4>
               
					<button type="button" class="btn btn-icon icon-left btn-sm btn-info" data-toggle="modal" data-target="#tambahdata">
					<i class="fa fa-edit"></i> Tambah Data
					</button>
				
            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="example"width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>No Surat</th>
								<th>Nama Siswa</th>
                                <th>Asal Sekolah</th>
                                <th>Alamat Siswa</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from siswa where jenis ='2'");
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
							
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $siswa['surat_masuk'] ?></td>
									<td><?= $siswa['nama_siswa'] ?></td>
                                    <td><?= $siswa['asal_sekolah'] ?></td>
                                    <td><?= $siswa['alamat_siswa'] ?></td>
                                    
                                   
									
                                    <td>
                                        
                                       
									    <button onclick="frames['printdata<?= $no; ?>'].print()" class='btn btn-sm btn-flat btn-success'><i class='fa fa-print'></i> Cetak</button>
										<iframe name='printdata<?= $no; ?>' src='mod_siswa/surat_mutasi_masuk.php?id=<?= enkripsi($siswa['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe>
                                         <button data-id="<?= $siswa['id_siswa'] ?>" class="hapus btn-sm btn btn-danger"><i class="fa fa-trash    "></i></button>
										 
                                    </td>
                                </tr>
                                <script>
                                    $('#form-edit<?= $no ?>').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_siswa/crud_siswa.php?pg=status',
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
                            <?php }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_siswa/crud_siswa.php?pg=mutasimasuk',
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
    $('#example').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
       
      	swal({
      		title: "Are you sure?",
      		text: "You will not be able to recover this imaginary file!",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Yes, delete it!",
      		cancelButtonText: "No, cancel plx!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			$.ajax({
                    url: 'mod_siswa/crud_siswa.php?pg=hapus',
                    method: "POST",
                    data: 'id_siswa=' + id,
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
      		} else {
      			swal("Cancelled", "Your imaginary file is safe :)", "error");
      		}
      	});
      });
      
      
      
      
</script>