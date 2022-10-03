<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Kelas</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <button type="button" class="btn btn-icon icon-left btn-sm btn-primary" data-toggle="modal" data-target="#tambahdata">
			<i class="fa fa-edit"></i> Tambah Data
		</button>
        </ul>
      </div>
	  
	  
	

<div class="row">
<div class="col-md-8">
   <div class="card">
	<div class="card-header bg-primary text-white" >
	   <h4>Data Kelas</h4>
		
	</div>
	<div class="card-body">
		<div class="table-responsive">
			 <table style="font-size: 12px" class="table table-striped table-sm" id="example">
				<thead>
                            <tr>
                                <th class="text-center">
                                    No Urut
                                </th>
                                <th>Tingkat</th>
                                <th>Nama Rombel</th>
                               
								<th>Status</th>
                                <th>Hapus</th>
								<th>Edit</th>
                            </tr>
                        </thead>
											<tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from jenjang");
                            $no = 0;
                            while ($jenjang = mysqli_fetch_array($query)) {
													$hitung = rowcount($koneksi, 'siswa', ['kelas' => $jenjang['kode']]);
                                $no++;
                            ?>
							
							
							
							 
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $jenjang['kode'] ?></td>
                                    <td> <?= $jenjang['nama_jenjang'] ?></td>
									
                                    <td>
                                        <?php if ($jenjang['status'] == 1) { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Non Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                         
										<button data-id="<?= $jenjang['id_jenjang'] ?>" class="hapus btn btn-sm btn-danger"><i class="fa fa-trash    "></i>Hapus</button>
                                        <!-- Button trigger modal -->
                                    </td>
                                    <td>
									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            <i class="fa fa-edit    "></i>Edit
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
                                                            <input type="hidden" value="<?= $jenjang['id_jenjang'] ?>" name="id_jenjang" class="form-control" required="">
                                                            <div class="form-group">
                                                                <label>Nama jenjang</label>
                                                                <input type="text" name="nama" value="<?= $jenjang['nama_jenjang'] ?>" class="form-control" required="">
																
                                                            </div>
                                                            
															<div class="form-group">
                                                                <div class="control-label">Status Jenjang</div>
                                                                <label class="custom-switch mt-2">
                                                                    <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($jenjang['status'] == 1) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description"> Pilih Status</span>
                                                                </label>
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
                                            url: 'mod_jenjang/crud_jenjang.php?pg=ubah',
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

	<div class="col-md-4 mb-3">
		<div class="tile">
            <h4>Data Siswa Per Kelas</h4>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo3"></canvas>
            </div>
        </div>
	</div>
	
	
    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tingkat</label>
                             <select class="form-control" name="kode" id="kode" required>

						   <option value="">Pilih kelas :</option>
							
							
							
							
							
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="A">A</option>
							<option value="B">B</option>
							
							
																	
																	

						</select>
                        </div>
                        <div class="form-group">
                            <label>Nama Rombel</label>
                            <input type="text" name="nama" class="form-control" required="">
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


<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_jenjang/crud_jenjang.php?pg=tambah',
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
                    url: 'mod_jenjang/crud_jenjang.php?pg=hapus',
                    method: "POST",
                    data: 'id_jenjang=' + id,
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