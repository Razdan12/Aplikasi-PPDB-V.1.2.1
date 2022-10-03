
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Selamat Datang <b><?= $user['nama_user'] ?></b> Di Portal PPDB Online </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

		
	





	 
<div class="row">
<div class="col-md-8">
   <div class="card">
	<div class="card-header text-white" style="background-color: #005f6b">
	   <h4>Data Statistik Asal Sekolah Pendaftar</h4>
		
	</div>
	<div class="card-body">
		<div class="table-responsive">
			 <table style="font-size: 12px" class="table table-striped table-sm" id="example">
				<thead>
					<tr>
						<th class="text-center">
					 NO
						</th>
						
						<th>NAMA SEKOLAH</th>
						<th class="text-center">PENDAFTAR</th>
					</tr>
				</thead>
				<tbody class="ui-sortable">
					<?php $query = mysqli_query($koneksi, "select * from siswa WHERE jenis = '1' group by asal_sekolah  ");
					 $no = 0;
					while ($sekolah = mysqli_fetch_array($query)) {
						$no++;
						$hitung = rowcount($koneksi, 'siswa', ['asal_sekolah' => $sekolah['asal_sekolah']]);
						
					?>
						<tr>
							
							<td><?= $no; ?></td>
							
							<td><?= $sekolah['asal_sekolah'] ?></td>

							<td class="text-center">
								<div class="badge badge-success"><?= $hitung ?></div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
</div> 
</div>

	<div class="col-md-4 mb-3">
	  <a href="?pg=daftar" style="text-decoration: none;">
		<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
			<div class="info">
			<h4>Pendaftar</h4>
			<p><b><?= rowcount($koneksi, 'siswa', ['jenis' => 1]) ?></b></p>
			</div>
		</div>
		</a>
		<a href="?pg=diterima" style="text-decoration: none;">
		  <div class="widget-small info coloured-icon"><i class="icon fa fa-user-md fa-3x"></i>
			<div class="info">
			  <h4>Di Terima</h4>
			  <p><b><?= rowcount($koneksi, 'siswa', ['status' => 4]) ?></b></p>
			</div>
		  </div>
		</a>
		<a href="" style="text-decoration: none;">
		  <div class="widget-small warning coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
			<div class="info">
			  <h4>Sekolah</h4>
			  <p><b><?= mysqli_num_rows(mysqli_query($koneksi, 'select * from siswa where jenis ="1"group by asal_sekolah')) ?></b></p>
			</div>
		  </div>
		</a>
		<a href="" style="text-decoration: none;">
		  <div class="widget-small danger coloured-icon"><i class="icon fa fa-clone fa-3x"></i>
			<div class="info">
			  <h4>Kelas</h4>
			  <p><b><?= rowcount($koneksi, 'jenjang', ['status' => 1]) ?></b></p>
			</div>
		  </div>
		</a>
  
  </div>

  </div>
      
		

        





        
     

