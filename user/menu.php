<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .app-sidebar__user-name   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>

<?php
$nama_siswa = $siswa['nama_siswa'] ;
$namapendek = strtolower($nama_siswa);
// 
?>
   
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= $url ?>/assets/img/avatar/avatar-1.png" width='50'alt="User Image">
         <div class="col-md-10">
          <p class="app-sidebar__user-name"class="cap"><?= $namapendek ?></p>
          <p class="app-sidebar__user-designation"><small><?php if ($siswa['status'] == 0) { ?>
				 <button class="badge badge-danger"> Pending </button>
				<?php } ?><?php if ($siswa['status'] == 4) { ?>
				 <button class="badge badge-success"> Di Terima </button> 
				<?php } ?><?php if ($siswa['status'] == 1) { ?>
				 <button class="badge badge-success"> Aktif </button> 
				<?php } ?></small></p>
        </div>
      </div>
	<ul class="app-menu">
	 <li><a class="app-menu__item active bg-info" href="."><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
	
		<li><a class="app-menu__item" href="?pg=formulir"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Data Formulir</span><small class="label pull-right badge badge-danger">wajib</small></a></li>
		<li><a class="app-menu__item" href="?pg=bayar"><i class="app-menu__icon fa fa-upload"></i><span class="app-menu__label">Pembayaran</span></a></li>
		<li><a class="app-menu__item" href="?pg=berkas"><i class="app-menu__icon fa fa-upload"></i><span class="app-menu__label">Upload Berkas</span></a></li>
        
	   
	  
	    </ul>