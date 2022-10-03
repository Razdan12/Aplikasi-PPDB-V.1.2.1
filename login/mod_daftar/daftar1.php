<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php if (isset($_GET['jurusan']) == '') { ?>
	
 <?php } else {  ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Pendaftar Jalur <?= $_GET['jurusan']?></h4>
               
				
	
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
                                <th>No Daftar</th>
								<th>NISN</th>
								<th>Password</th>
                                <th>Nama Pendaftar</th>
                                <th>L/P</th>
                                <th>No Hp</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * FROM siswa WHERE jalur in(2) and jenis in('1')");
                            $no = 0;
                            while ($daftar = mysqli_fetch_array($query)) {
								$jalur = fetch($koneksi, 'jurusan', ['id_jurusan' => $daftar['jalur']]);
                                $no++;
                            ?>
                            
                            
                                <tr>
                                   <td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $daftar['id_siswa'] ?>"></td>
									<td><?= $no; ?></td>
                                    <td><?= $daftar['no_daftar'] ?></td>
									<td><?= $daftar['nisn'] ?></td>
									 <td><?= $daftar['password'] ?></td>
                                    <td><?= $daftar['nama_siswa'] ?></td>
                                    <td><?= $daftar['jk'] ?></td>
                                    <td>
                                        <i class="fa fa-whatsapp text-success   "></i>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima kasih telah mendaftar di <?= $setting['nama_sekolah'] ?>. Silahkan Login untuk melengkapi formulir pendaftaran dengan username *<?= $daftar['nisn'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">
                                            <?= $daftar['no_hp'] ?></a>
                                    </td>
                                   
                                    <td>
                                        <?php if ($daftar['status'] == 4) { ?>
                                            <button data-id="<?= $daftar['id_siswa'] ?>" class="aktif btn-sm btn btn-success" >Diterima</i></button>
                                            
                                            
                                            
                                        
                                        <?php } else { ?>
                                            <button data-id="<?= $daftar['id_siswa'] ?>" class="tidakaktif btn-sm btn btn-danger">Pending</i></button>
                                            
                                        <?php } ?>
                                    </td>
									
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=ubahdaftar&id=<?= enkripsi($daftar['id_siswa']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit    "></i></a>
                                        <!-- Button trigger modal -->
                                        <iframe name='printdaftar<?= $daftar['nisn'] ?>' src='mod_daftar/print_daftar.php?id=<?= enkripsi($daftar['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar<?= $daftar['nisn'] ?>'].print()" class='btn btn-sm btn-flat btn-info'><i class='fa fa-print'></i>Cetak</button></td>
										
                                        <!-- Button trigger modal -->
                                        
                                      
                                        
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
</div>
    

<?php } ?>
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
                url: "mod_daftar/crud_daftar.php?pg=hapusdaftarcheck",
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
						text: 'Data Berhasil Di Hapus',
						type: 'success',
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
	//IMPORT FILE PENDUKUNG 
    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_siswa/crud_siswa.php?pg=import2',
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
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_daftar/crud_daftar.php?pg=tambah',
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
                    url: 'mod_daftar/crud_daftar.php?pg=hapus',
                    method: "POST",
                    data: 'id_daftar=' + id,
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
<script>
	  $('#example').on('click', '.aktif', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
      		title: 'Pringatan !!!',
            text: 'Anda Akan Merubah Status Siswa',
            type: 'info',
		
      		showCancelButton: true,
      		confirmButtonText: "Yes, Rubah!",
      		cancelButtonText: "No, cancel plx!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			$.ajax({
                    url: 'mod_daftar/crud_daftar.php?pg=tidakaktif',
                    method: "POST",
                    data: 'id_siswa=' + id,
                    success: function(data) {
                        swal({
        					title: 'Sukses !!',
        					text: 'Data  Berhasil di rubah',
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
      
      
      
     
    $('#example').on('click', '.tidakaktif', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
      		title: 'Pringatan !!!',
            text: 'Anda Akan Merubah Status Siswa',
            type: 'info',
		
      		showCancelButton: true,
      		confirmButtonText: "Yes, Rubah!",
      		cancelButtonText: "No, cancel plx!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			$.ajax({
                    url: 'mod_daftar/crud_daftar.php?pg=aktif',
                    method: "POST",
                    data: 'id_siswa=' + id,
                    success: function(data) {
                        swal({
        					title: 'Sukses !!',
        					text: 'Data  Berhasil di rubah',
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