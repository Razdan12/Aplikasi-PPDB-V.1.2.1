<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
 <div class="app-title">
        <div>
           <h1><i class="fa fa-th-list"></i> Data Guru</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
			<i class="fa fa-edit"></i> Tambah Data
		</button>
		<button type="button" id="btnhapus" class="btn btn-danger"><i class="fa fa-trash    "></i> Hapus Data</button>
        </ul>
 </div>
	  


<div class="row">
<div class="col-md-12">
   <div class="card">
	<div class="card-header bg-primary text-white" >
	   <h4>Data Guru</h4>
		
	</div>
	<div class="card-body">
		<div class="table-responsive">
			 <table style="font-size: 12px" class="table table-striped table-sm" id="example">
				<thead>
					<tr>
						<th><input type='checkbox' id='ceksemua'></th>
						<th class="text-center">
							No
						</th>
						<th>NUPTK/PEG-ID</th>
						<th>Nama Guru</th>
						<th>Pendidikan</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					 $query = mysqli_query($koneksi, "select * from user where status ='1'");
					$no = 0;
					while ($user = mysqli_fetch_array($query)) {
						$no++;
						
					?>
						<tr>
							<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $user['id_user'] ?>"></td>
							<td><?= $no; ?></td>
							<td><?= $user['username'] ?></td>
							<td><?= $user['nama_user'] ?></td>
							<td><?= $user['pendidikan'] ?></td>
							
							
							
							<td>
								<button data-id="<?= $user['id_user'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash-alt    "></i> Hapus</button>
								<!-- Button trigger modal -->
								<a data-toggle="tooltip" data-placement="top" title="" data-original-title="ubah post" href="?pg=edituser&id=<?= enkripsi($user['id_user']) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit    "></i>Edit</a>
								

								<!-- Modal -->
								
							</td>
						</tr>
						
					<?php }
					?>


				</tbody>
			</table>
		</div>
	</div>
	
</div> 
</div>

	

<!-- Modal -->
		<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="form-tambah">
											
							<div class="tile ">
							<h3 class='box-title'>Tambah Data Guru</h3>
							<hr>
							<div class="tile-body">					
							<div class='form-group'>
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" required="">
							</div>
							<div class='form-group'>
								<label>NUPTK/PEG-ID</label>
								<input type="text" name="username" class="form-control" required="">
							</div>
							<div class='form-group'>
								<label>Tempat Lahir</label>
								<input class="form-control" type="text" name="tempat_lahir" required ="" />
							</div>
							<div class='form-group'>
								<label>Tanggal Lahir</label>
								<input class="form-control" type="date" name="tgl_lahir" required="" />
							</div>
							<div class='form-group'>
								<label>Pendidikan</label>
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
							<div class="form-group">
								<label for="level">Level</label>
								<select class="form-control" name="level" id="level" readonly>
									<option value="gtk">Guru</option>
									<option value="gtk">Guru</option>
									
								</select>
							</div>

							
							<div class="tile-footer">
						  <button class="btn btn-primary" type='submit' id="save-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
						</div>
						</div>
					</form>
					</div>
				</div>
			</div>



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
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_user/crud_user.php?pg=hapususercheck",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
						swal({
						title: 'Terimakasih',
						text: 'Status Telah Diperbaharui!',
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
    $(function() {
        $("#txtConfirmPassword").keyup(function() {
            var password = $("#txtNewPassword").val();
            $("#divCheckPasswordMatch").html(password == $(this).val() ? "Passwords match." : "Passwords do not match!");
        });

    });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_user/crud_user.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'OK') {
                    swal({
						title: 'Terimakasih',
						text: 'Data Guru Berhasil Disimpan!',
						type: 'success',
					
                        });
						setTimeout(function() {
							window.location.reload();
						}, 1000);
                    $('#tambahdata').modal('hide');
                } else {
                    swal({
						title: 'Maaf',
						text: 'NUPTK/PEG-ID Guru Sudah ada!',
						type: 'error',
					
                        });
						setTimeout(function() {
							window.location.reload();
						}, 1000);
                }
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
                    url: 'mod_user/crud_user.php?pg=hapus',
                    method: "POST",
                    data: 'id_user=' + id,
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
