<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .app-sidebar__user-name   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>

<?php
$jml_jur = rowcount($koneksi, 'jurusan', ['status' => 1]);
$nama_user = $user['nama_user'] ;
$namapendek = strtolower($nama_user);
// 
?>
   
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../assets/img/avatar/avatar-1.png" width='50'alt="User Image">
        <div>
          <p class="app-sidebar__user-name"class="cap"><?= $namapendek ?></p>
          <p class="app-sidebar__user-designation"><small> Akses "<?= $user['akses'] ?>"</small></p>
        </div>
      </div>
	<ul class="app-menu">
	 <li><a class="app-menu__item active bg-info" href="."><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
	
       
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Kelembagaan</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="?pg=profil_lembaga"><i class="icon fa fa-circle-o"></i> Profil Lembaga</a></li>
      <li><a class="treeview-item" href="?pg=jurusan"><i class="icon fa fa-circle-o"></i> Data Jurusan</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Data PPDB</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
      
            <li><a class="treeview-item" href="?pg=daftar"><i class="icon fa fa-circle-o"></i>Semua Pendaftar</a></li>
      <li><a class="treeview-item" href="?pg=diterima"><i class="icon fa fa-circle-o"></i>Di Terima</a></li>
      
      
          </ul>
        </li>
		 <?php if ($jml_jur == 0) { ?>
		 <?php } else { ?> 
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Data Per Jalur</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
			<?php
                             $query = mysqli_query($koneksi, "select * from jurusan where id_jurusan='1'");
                            $no = 0;
                            while ($jurusan = mysqli_fetch_array($query)) {
                                $no++;
                               
                            ?>
       
            <li><a class="treeview-item" href="?pg=daftar&jurusan=<?= $jurusan['nama_jurusan'] ?>"><i class="icon fa fa-circle-o"></i>
            Jalur <?= $jurusan['nama_jurusan'] ?></a></li>
            <?php } ?>
            		<?php
                             $query = mysqli_query($koneksi, "select * from jurusan where id_jurusan='2'");
                            $no = 0;
                            while ($jurusan = mysqli_fetch_array($query)) {
                                $no++;
                               
                            ?>
        
            <li><a class="treeview-item" href="?pg=daftar1&jurusan=<?= $jurusan['nama_jurusan'] ?>"><i class="icon fa fa-circle-o"></i>
           Jalur <?= $jurusan['nama_jurusan'] ?></a></li>
			<?php } ?>
			
          </ul>
        </li>
		<?php } ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">Administrasi</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
			<li><a class="treeview-item" href="?pg=biaya"><i class="icon fa fa-circle-o"></i>Jenis Pembayaran</a></li>
			<li><a class="treeview-item" href="?pg=bayar"><i class="icon fa fa-circle-o"></i>Data Pembayaran</a></li>
			
          </ul>
        </li>
		 <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Pengaturan</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
			<li><a class="treeview-item" href="?pg=setting"><i class="icon fa fa-circle-o"></i>Pengaturan Umum</a></li>
			<li><a class="treeview-item" href="?pg=pengguna"><i class="icon fa fa-user"></i>Pengaturan User</a></li>
			
			
          </ul>
        </li>
		
		
		
		<br>
		<center> <button data-id="" class=" btn btn-sm btn-danger">Versi <?= $versi ?></b></button></center>
     
	  
	 
	  
	  
	    </ul>
