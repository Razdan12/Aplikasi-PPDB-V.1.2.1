<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<!-- Modal -->

<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Cetak Data Siswa</h1>
          <p>Data Siswa Aktif Saat ini</p>
        </div>
		
	
		
	  
		 </div>

		<div class="row">
        <div class="col-md-12">
		
           
          <div class="tile">
		   <div class="row">
				<div class="col-md-4">
				 <h3 class="tile-title">Data Siswa ( <?= rowcount($koneksi, 'siswa', ['status' => 1]) ?> Siswa )</h3>
				
				</div>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-2">
				<div class="dropdown"hidden>
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
			   </div>
				
				</div>
			
			<hr>
            <div class="tile-body">
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
                                <th>Biodata</th>
                                <th>Suket</th>
								<th>Kartu Pelajar</th>
                               
							
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query = mysqli_query($koneksi, "select * from siswa where status='1'");
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
								$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
                                $no++;
                            ?>
                                <tr>
                                    <td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $siswa['id_siswa'] ?>"></td>
									<td><?= $no; ?></td>
                                    <td class="str"><?= $siswa['nisn'] ?></td>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td><?= $siswa['jk'] ?></td>
                                    <td><iframe name='printbiodata<?= $siswa['nisn'] ?>' src='mod_siswa/bio.php?id=<?= enkripsi($siswa['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printbiodata<?= $siswa['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-info'><i class='fa fa-print'></i>Cetak</button></td>
									<td><iframe name='printsuket<?= $siswa['nisn'] ?>' src='mod_siswa/suket.php?id=<?= enkripsi($siswa['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printsuket<?= $siswa['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-primary'><i class='fa fa-print'></i> Cetak </button></td>
									<td><iframe name='pelajar<?= $siswa['nisn'] ?>' src='mod_kartu/1ktp.php?id=<?= enkripsi($siswa['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['pelajar<?= $siswa['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-secondary'><i class='fa fa-print'></i> Cetak</button></td>
							       
									
																				
										
							<?php }
										?>
						</tbody></table></div>
					</div>
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
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_siswa/crud_siswa.php?pg=hapussiswacheck",
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
						icon: 'success',
						buttons: false,
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

                $('#importdata').modal('hide');
                iziToast.success({
                    title: 'Sukses!',
                    message: data,
                    position: 'topRight'
                });
                
				

                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
	

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

                iziToast.success({
                    title: 'Mantap!',
                    message: 'data berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
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
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_siswa/crud_siswa.php?pg=hapus',
                    method: "POST",
                    data: 'id_siswa=' + id,
                    success: function(data) {
                        swal({
						title: 'Terimakasih',
						text: 'Data Siswa Berhasil Di Hapus!',
						icon: 'success',
						buttons: false,
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

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

