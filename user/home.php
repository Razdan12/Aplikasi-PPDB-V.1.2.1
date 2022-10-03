
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Selamat Datang <b><?= $siswa['nama_siswa'] ?></b> </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

		
			
			
<div class="card-body">			
<?php if ($siswa['konfirmasi'] == 1) { ?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Terimakasih !!!<br />
		Data Anda Telah Berhasil <button class="badge badge-danger"> Dikonfirmasi Pada Tanggal  <?= $siswa['tgl_konfirmasi'] ?></button>
	</div>
	
				
	<?php } else { ?>

	
	
	<?php if ($siswa['status'] == 0) { ?>
	<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Hai <?= $siswa['nama_siswa'] ?> !!!<br />
	Status Pendaftaran Kamu Saat ini <button class="badge badge-warning"> Masih Diperoses </button>
	<?php } ?><?php if ($siswa['status'] == 4) { ?>
	<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Hai <?= $siswa['nama_siswa'] ?> !!!<br />
	Status Pendaftaran Kamu Saat ini <button class="badge badge-danger"> Sudah Di Terima, </button> Silahkan Segera Daftar Ulang
	<?php } ?>
</div>


<?php } ?>

</div>	

</div>	





<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
             <div class="row gutters-sm">
			 <?php if ($siswa['jenis'] == 1) { ?>
			 <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
				  <?php if ($siswa['foto'] == '') { ?>
                    <img src="<?= $url ?>/default.png" alt="Foto Siswa" class="rounded-circle" width="150">
					<?php } else { ?>
					 <img src="../<?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-circle" width="150">
					 <?php } ?>
                    <div class="mt-3">
                      <!-- ngIf: datakelasSelect.jurusan_nama=='' -->
                      <!-- ngIf: datakelasSelect.jurusan_nama!=='' --><h4 ng-if="datakelasSelect.jurusan_nama!==''" ng-bind="datakelasSelect.tingkat_nama +'.'+datakelasSelect.jurusan_nama+'.'+ datakelasSelect.kelas_nama" class="ng-binding ng-scope">
					  <?php if ($siswa['status'] == 0) { ?>
				 <button class="btn btn-danger"> Pending </button>
				<?php } ?><?php if ($siswa['status'] == 4) { ?>
				 <button class="btn btn-success"> Di Terima </button>
				<?php } ?>
				<button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ubahpass">
                        <i class="fa fa-key"></i>
                    </button> 
				<button type="button" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#modal-foto">
                        <i class="fa fa-upload"></i>
                    </button> 
				</h4><!-- end ngIf: datakelasSelect.jurusan_nama!=='' -->
                        <p class="text-muted font-size-sm mb-0"><?= $siswa['no_daftar'] ?></p>
                      <p class="text-muted font-size-sm font-weight-bold ng-binding" ng-bind="''+datakelasSelect.walas_nama+''"><?= $siswa['nama_siswa'] ?></p>
					  
                    </div>
                  </div>
                </div>
              </div>
              </div>
			  <?php  } else { ?>
			  <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
				  <?php if ($siswa['foto'] == '') { ?>
                    <img src="<?= $url ?>/default.png" alt="Foto Siswa" class="rounded-circle" width="150">
					<?php } else { ?>
					 <img src="../<?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-circle" width="150">
					 <?php } ?>
                    <div class="mt-3">
                      <!-- ngIf: datakelasSelect.jurusan_nama=='' -->
                      <!-- ngIf: datakelasSelect.jurusan_nama!=='' --><h4 ng-if="datakelasSelect.jurusan_nama!==''" ng-bind="datakelasSelect.tingkat_nama +'.'+datakelasSelect.jurusan_nama+'.'+ datakelasSelect.kelas_nama" class="ng-binding ng-scope">
					  <?php if ($siswa['status'] == 0) { ?>
				 <button class="btn btn-danger"> Tidak Aktif </button>
				<?php } ?><?php if ($siswa['status'] == 1) { ?>
				 <button class="btn btn-success"> Aktif </button>
				<?php } ?>
				<button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ubahpass">
                        <i class="fa fa-key"></i>
                    </button> 
				<button type="button" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#modal-foto">
                        <i class="fa fa-upload"></i>
                    </button> 
				</h4><!-- end ngIf: datakelasSelect.jurusan_nama!=='' -->
                        <p class="text-muted font-size-sm mb-0"><?= $siswa['no_daftar'] ?></p>
                      <p class="text-muted font-size-sm font-weight-bold ng-binding" ng-bind="''+datakelasSelect.walas_nama+''"><?= $siswa['nama_siswa'] ?></p>
					  
                    </div>
                  </div>
                </div>
              </div>
              </div>
			  <?php } ?>
              <div class="col-md-8 mb-3">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title mb-0">Rincian Data Pendaftar</h5>
                    </div>
                    </div>
                  </div>
                <div class="card-body pb-0">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path></svg>
                    Nama Pendaftar
                    </h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.mapel_nama"><?= $siswa['nama_siswa'] ?></span>
                  </li>
                 
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path fill="none" d="M16.254,3.399h-0.695V3.052c0-0.576-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042v0.347H6.526V3.052c0-0.576-0.467-1.042-1.042-1.042S4.441,2.476,4.441,3.052v0.347H3.747c-0.768,0-1.39,0.622-1.39,1.39v11.813c0,0.768,0.622,1.39,1.39,1.39h12.507c0.768,0,1.391-0.622,1.391-1.39V4.789C17.645,4.021,17.021,3.399,16.254,3.399z M14.17,3.052c0-0.192,0.154-0.348,0.348-0.348c0.191,0,0.348,0.156,0.348,0.348v0.347H14.17V3.052z M5.136,3.052c0-0.192,0.156-0.348,0.348-0.348S5.831,2.86,5.831,3.052v0.347H5.136V3.052z M16.949,16.602c0,0.384-0.311,0.694-0.695,0.694H3.747c-0.384,0-0.695-0.311-0.695-0.694V7.568h13.897V16.602z M16.949,6.874H3.052V4.789c0-0.383,0.311-0.695,0.695-0.695h12.507c0.385,0,0.695,0.312,0.695,0.695V6.874z M5.484,11.737c0.576,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043s-1.042,0.467-1.042,1.043C4.441,11.271,4.908,11.737,5.484,11.737z M5.484,10.348c0.192,0,0.347,0.155,0.347,0.348c0,0.191-0.155,0.348-0.347,0.348s-0.348-0.156-0.348-0.348C5.136,10.503,5.292,10.348,5.484,10.348z M14.518,11.737c0.574,0,1.041-0.467,1.041-1.042c0-0.576-0.467-1.043-1.041-1.043c-0.576,0-1.043,0.467-1.043,1.043C13.475,11.271,13.941,11.737,14.518,11.737z M14.518,10.348c0.191,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.156-0.348-0.348C14.17,10.503,14.324,10.348,14.518,10.348z M14.518,15.212c0.574,0,1.041-0.467,1.041-1.043c0-0.575-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042C13.475,14.745,13.941,15.212,14.518,15.212z M14.518,13.822c0.191,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.155-0.348-0.348C14.17,13.978,14.324,13.822,14.518,13.822z M10,15.212c0.575,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042c-0.576,0-1.042,0.467-1.042,1.042C8.958,14.745,9.425,15.212,10,15.212z M10,13.822c0.192,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348s-0.348-0.155-0.348-0.348C9.653,13.978,9.809,13.822,10,13.822z M5.484,15.212c0.576,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042s-1.042,0.467-1.042,1.042C4.441,14.745,4.908,15.212,5.484,15.212z M5.484,13.822c0.192,0,0.347,0.155,0.347,0.347c0,0.192-0.155,0.348-0.347,0.348s-0.348-0.155-0.348-0.348C5.136,13.978,5.292,13.822,5.484,13.822z M10,11.737c0.575,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043c-0.576,0-1.042,0.467-1.042,1.043C8.958,11.271,9.425,11.737,10,11.737z M10,10.348c0.192,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348s-0.348-0.156-0.348-0.348C9.653,10.503,9.809,10.348,10,10.348z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                     TempatLahir</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.tahunajaran_id+'/'+((datakelasSelect.tahunajaran_id*1)+1)"> <?= $siswa['tempat_lahir'] ?></span>
                  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path fill="none" d="M16.254,3.399h-0.695V3.052c0-0.576-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042v0.347H6.526V3.052c0-0.576-0.467-1.042-1.042-1.042S4.441,2.476,4.441,3.052v0.347H3.747c-0.768,0-1.39,0.622-1.39,1.39v11.813c0,0.768,0.622,1.39,1.39,1.39h12.507c0.768,0,1.391-0.622,1.391-1.39V4.789C17.645,4.021,17.021,3.399,16.254,3.399z M14.17,3.052c0-0.192,0.154-0.348,0.348-0.348c0.191,0,0.348,0.156,0.348,0.348v0.347H14.17V3.052z M5.136,3.052c0-0.192,0.156-0.348,0.348-0.348S5.831,2.86,5.831,3.052v0.347H5.136V3.052z M16.949,16.602c0,0.384-0.311,0.694-0.695,0.694H3.747c-0.384,0-0.695-0.311-0.695-0.694V7.568h13.897V16.602z M16.949,6.874H3.052V4.789c0-0.383,0.311-0.695,0.695-0.695h12.507c0.385,0,0.695,0.312,0.695,0.695V6.874z M5.484,11.737c0.576,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043s-1.042,0.467-1.042,1.043C4.441,11.271,4.908,11.737,5.484,11.737z M5.484,10.348c0.192,0,0.347,0.155,0.347,0.348c0,0.191-0.155,0.348-0.347,0.348s-0.348-0.156-0.348-0.348C5.136,10.503,5.292,10.348,5.484,10.348z M14.518,11.737c0.574,0,1.041-0.467,1.041-1.042c0-0.576-0.467-1.043-1.041-1.043c-0.576,0-1.043,0.467-1.043,1.043C13.475,11.271,13.941,11.737,14.518,11.737z M14.518,10.348c0.191,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.156-0.348-0.348C14.17,10.503,14.324,10.348,14.518,10.348z M14.518,15.212c0.574,0,1.041-0.467,1.041-1.043c0-0.575-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042C13.475,14.745,13.941,15.212,14.518,15.212z M14.518,13.822c0.191,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.155-0.348-0.348C14.17,13.978,14.324,13.822,14.518,13.822z M10,15.212c0.575,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042c-0.576,0-1.042,0.467-1.042,1.042C8.958,14.745,9.425,15.212,10,15.212z M10,13.822c0.192,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348s-0.348-0.155-0.348-0.348C9.653,13.978,9.809,13.822,10,13.822z M5.484,15.212c0.576,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042s-1.042,0.467-1.042,1.042C4.441,14.745,4.908,15.212,5.484,15.212z M5.484,13.822c0.192,0,0.347,0.155,0.347,0.347c0,0.192-0.155,0.348-0.347,0.348s-0.348-0.155-0.348-0.348C5.136,13.978,5.292,13.822,5.484,13.822z M10,11.737c0.575,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043c-0.576,0-1.042,0.467-1.042,1.043C8.958,11.271,9.425,11.737,10,11.737z M10,10.348c0.192,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348s-0.348-0.156-0.348-0.348C9.653,10.503,9.809,10.348,10,10.348z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                     Tanggal Lahir</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.tahunajaran_id+'/'+((datakelasSelect.tahunajaran_id*1)+1)"> <?php echo tgl_indo("$tgl_lahirsiswa");?></span>
                  </li>
				   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    Username/Password</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.jum_siswa"> <?= $siswa['nisn'] ?>/<?= $siswa['password'] ?>	</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    
					 
					<a target="" href="?pg=formulir" type="button" class="btn btn-primary"><i class="fa fa-book    "></i> Lengkapi Data</a> 
					<a target="" href="?pg=berkas" type="button" class="btn btn-success"><i class="fa fa-upload    "></i> Upload Berkas</a>  
					
                  </li>

                </ul>
              </div>

              </div>
            </div>
            </div>
		 </div>
        </div>		
<!-- Modal -->
<div class="modal fade" id="modal-foto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form id="form-foto">
		<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
		<div class="modal-header">
			<h5 class="modal-title">Upload Foto Siswa</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">

		<div class="card" id="settings-card">
			
			<div class="card-body"
			
			<div class="form-group row align-items-center">
				
				<div class="col-sm-6 col-md-12">

					<div class="custom-file">
						<input type="file" name="foto" class="custom-file-input" id="site-foto" required>
						<label class="custom-file-label">Upload Foto</label>
					</div>
				</div>

			</div>
			<div class="card-footer bg-whitesmoke text-md-right">
			<button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
			<button class="btn btn-secondary" type="button">Reset</button>
			</div>
			</div>
		</div>
		</form>
	</div>
</div>
</div>
<div class="modal fade" id="ubahpass" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="form-ubahpass">
				<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
				<div class="modal-header">
					<h5 class="modal-title">Ubah password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				   
					
					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text"  value="<?= $siswa['nama_siswa'] ?>"  class="form-control" readonly="">
					</div>
					<div class="form-group">
						<label>username</label>
						<input type="text" name="nisn" value="<?= $siswa['nisn'] ?>" class="form-control" readonly="">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="text" name="password" value="<?= $siswa['password'] ?>" ="" />
						
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
<!-- simpan Foto -->			
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
	$('#form-foto').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'content/crud.php?pg=foto',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function() {
				$('form-foto<?= $no ?>').on("click", function(e) {
					e.preventDefault();
				});
			},
			success: function(data) {

				 swal({
        					title: 'Sukses !!',
        					text: 'Simpan Data Berhasil',
        					type: 'success',
                            });
				setTimeout(function() {
					window.location.reload();
				}, 2000);


			}
		});
	});
</script>
<!-- simpan Password -->
					<script>
				
				$(document).ready(function() {
					$('#form-ubahpass').submit(function(e) {
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'content/crud.php?pg=ubah-pass',
							data: $(this).serialize(),
							beforeSend: function() {
								$('#btnsimpan').prop('disabled', true);
							},
							success: function(data) {
								$('#btnsimpan').prop('disabled', false);
								swal({
									title: 'Sukses !!',
									text: 'Data  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
									type: 'success',
									});
									setTimeout(function() {
								window.location.reload();
							}, 1000);
							}
						});
						return false;
					});
				});
			</script>						
	
