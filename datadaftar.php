<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
$tahun1 = date('Y');
$tahun2 = date('Y')+1;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
         <title>PPDB ONLINE | <?= $setting['nama_sekolah'] ?></title>
		 <!-- META DISKRIPSI-->
		<meta name="description" content="Mari bergabung Bersama Kami di <?= $setting['nama_sekolah'] ?>, Pendaftaran Peserta didik Baru Tahun <?= date('Y') ?> Kembali dibuka ">
		<meta name="keywords" content="simasapp v.1.1,simas madrasah, simas sekolah, web simas,"/>

        <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
                <link href="assets/css/front.min.css" rel="stylesheet" />
        <link rel="shortcut icon" href="<?= $setting['logo'] ?>" >		
		 <link rel="stylesheet" href="assets/css/1.css">
		 <link rel="stylesheet" href="assets/css/2.css">
		 <link rel="stylesheet" href="assets/css/3.css">
		 <link rel="stylesheet" href="assets/css/3.css">
        
		 <link rel="stylesheet" href="assets/css/components2.css">
		
				
      
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <!-- Start GA -->
    
    
	 <?php
	$akhir  = new DateTime($setting['tgl_pengumuman']); //Waktu awal
	$awal = new DateTime(); // Waktu sekarang atau akhir
	$diff  = $awal->diff($akhir);

	?>
	<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>
    </head>

    
    <body data-spy="scroll" data-target="#menu" data-offset="100">
        <div class="home-wrapper" id="home">
            <div class="home-header">
                <div class="container p-0">
                    <nav class="navbar navbar-expand-lg navbar-light" id="navbar-header">
                        <a class="navbar-brand" href="javascript:;">
                            <img src="<?= $setting['logo'] ?>" height="75" />
                            <div class="home-header-text d-none d-sm-block">
                                <h5>PENERIMAAN PESERTA DIDIK BARU</h5>
                                <h6><?= $setting['nama_sekolah'] ?></h6>
                                <h6>Tahun <?= $tahun1 ?></h6>
                            </div>
                            <span class="logo-mini-unbk d-block d-sm-none">PPDB </span>
                            <span class="logo-mini-tahun d-block d-sm-none">_ONLINE</span>
                        </a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#menu"
                        aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#home" id="link-home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#tentang" id="link-tentang">Daftar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#statistik" id="link-statistik">Statistik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#persyaratan" id="link-persyaratan">Info Pendaftaran</a>
                                </li>
								<li class="nav-item active">
                                    <a class="nav-link" href="#datadaftar" id="link-persyaratan">Data Pendaftar</a>
                                </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="./login" id="link-persyaratan">Admin</a>
                                </li>
								
                            </ul>
                        </div>
                </nav>
            </div>
        </div>
        <div class="home-title">
            <div class="container">
            <h5 class="post-title" id="datadaftar">
				<span class="fa fa-user"></span><span>Data Pendaftar</span>
			</h5>
            </div>
        </div>
        <div class="home-content-wrapper ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                       <div class="card card-login bg-info">
							
							<div class="card-body">
							<img src="<?= $setting['logo_ppdb'] ?>" alt=""  width="85%">
								<br>
							   <form id="form-login">
									<div class="form-group">
										<span class="fa fa-user"></span>
									   <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" name="username" placeholder="Masukkan NISN" required autocomplete="off">
									</div>
									<div class="form-group">
										<span class="fa fa-key"></span>
									   <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
									</div>
								   
									<button type="submit" class="btn btn-primary btn-block btn-login" id="btnsimpan">
										Masuk
									</button>
									 
									  
								</form>
								
							
							</div>
						</div>
						<br>
						<br>
						<br>
                    </div>

					<div class="col-md-9">
					<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
            
			 			 
			  
		
        	
					<div class="card-header text-black" >
								   <h4>Data Pendaftar</h4>
									
								</div>
								<br>
					    <table style="font-size: 12px" class="table table-striped table-sm table-bordered" cellspacing="0" id="sampleTable">
							<thead>
								<tr>
									<th width="30">NO</th>
									<th>Nama Pendaftar</th>
									<th>NISN</th>
									<th>Asal Sekolah</th>
									<th>Satatus</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
								 $query = mysqli_query($koneksi, "select * from siswa where status in(0,4) and jenis in(1)");
								$no = 0;
								while ($daftar = mysqli_fetch_array($query)) {
									$no++;
								   
								?>
									<tr>
									   
										<td><?= $no; ?></td>
										<td><?= $daftar['nama_siswa'] ?></td>
										<td><?= $daftar['nisn'] ?></td>
										 <td><?= $daftar['asal_sekolah'] ?></td>
										
										
									   
										<td>
											<?php if ($daftar['status'] == 4) { ?>
												<button data-id="<?= $daftar['id_siswa'] ?>" class="aktif btn-sm btn btn-success" >Sudah diterima</i></button>
												
												
												
											
											<?php } else { ?>
												<button data-id="<?= $daftar['id_siswa'] ?>" class="tidakaktif btn-sm btn btn-warning">Sedang diverifikasi</i></button>
												
											<?php } ?>
										</td>
										
										
									</tr>
								   
								<?php }
								?>


							</tbody>
						</table>
					
					</div>
					
			   
				
				</div>
			
			<hr>

		</div>


        </div>
        </div>
       
                    
               
        
    <div class="home-footer"><div class="container text-center">Copyright ©<?= date('Y') ?> <?= $setting['nama_sekolah'] ?></div></div>
       
		
         <!-- Vendor -->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery.form.min.js"></script>
        <script src="vendor/bootstrap.min.js"></script>
        <script src="vendor/popper.min.js"></script>
		<script src="assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
		
		<script type="text/javascript">$('#sampleTable').DataTable();</script>
		
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
		
		<style type="text/css" class="init">
	
	</style>
	
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
	<script type="text/javascript" class="init">
	


$(document).ready(function() {
	$('#sampleTable').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'', '', '', '', ''
		]
	} );
} );



	</script>

   
    </body>
	<script>
    $('#form-login').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'crud_web.php?pg=login',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#btnsimpan').prop('disabled', true);
            },
            success: function(data) {
                var json = $.parseJSON(data);
                $('#btnsimpan').prop('disabled', false);
                if (json.pesan == 'ok') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Login Berhasil',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.href = "user";
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: json.pesan,
                        position: 'topCenter'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
 
</script>
</body>

</html>