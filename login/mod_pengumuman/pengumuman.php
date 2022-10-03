<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<section class="section">
          



          
<div class="section-header">

   

    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pengumuman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Pengumuman</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis" value="1" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Internal</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis" value="2" class="selectgroup-input">
                                    <span class="selectgroup-button">Eksternal</span>
                                </label>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Isi Pengumuman</label>
                            <textarea name="pengumuman" class="summernote" required></textarea>
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


	
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data pengumuman</h4>
				 <div class="card-header-action">
                    
					<button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata" >
                        <i class="fa fa-edit"></i> Tambah Data
                    </button>
                    
				&nbsp;
					
					<a class="btn btn-info" href="#" role="button"><i class="fa fa-download"></i></a>
					<a class="btn btn-info" href="#" role="button"><i class="fa fa-print"></i> </a>
					
					
	</div>
	
	
            </div>
			
            <div class="card-body">
                <div class="table-responsive">
                     <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="sampleTable">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Judul Penguman</th>
                                <th>Pengumuman</th>
                                <th>Jenis</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from pengumuman");
                            $no = 0;
                            while ($pengumuman = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $pengumuman['judul'] ?></td>
                                    <td><?= $pengumuman['pengumuman'] ?></td>
                                    <td>
                                        <?php if ($pengumuman['jenis'] == 1) { ?>
                                            <span class="badge badge-success">internal</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">eksternal</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button data-id="<?= $pengumuman['id_pengumuman'] ?>" class="hapus btn btn-danger">Hapus</button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="<?= $pengumuman['id_pengumuman'] ?>" name="id_pengumuman" class="form-control" required="">
                                                            <div class="form-group">
                                                                <label>Judul Pengumuman</label>
                                                                <input type="text" name="judul" value="<?= $pengumuman['judul'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Jenis Pengumuman</label>
                                                                <div class="selectgroup w-100">
                                                                    <label class="selectgroup-item">
                                                                        <input type="radio" name="jenis" value="1" class="selectgroup-input" checked="">
                                                                        <span class="selectgroup-button">Internal</span>
                                                                    </label>
                                                                    <label class="selectgroup-item">
                                                                        <input type="radio" name="jenis" value="2" class="selectgroup-input">
                                                                        <span class="selectgroup-button">Eksternal</span>
                                                                    </label>

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Isi Pengumuman</label>
                                                                 <textarea name="pengumuman" class="summernote"><?= $pengumuman['pengumuman'] ?></textarea>
																
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
                                    </td>
                                </tr>
                                <script>
                                    $('#form-edit<?= $no ?>').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_pengumuman/crud_pengumuman.php?pg=ubah',
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
									$(document).ready(function() {
									$('.summernote').summernote();
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
</section>
 
<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_pengumuman/crud_pengumuman.php?pg=tambah',
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
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    $('#sampleTable').on('click', '.hapus', function() {
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
                   url: 'mod_pengumuman/crud_pengumuman.php?pg=hapus',
                    method: "POST",
                    data: 'id_pengumuman=' + id,
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
      $(document).ready(function() {
        $('.summernote').summernote();
    });
      
      
</script>