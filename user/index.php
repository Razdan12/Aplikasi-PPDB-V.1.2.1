<?php
session_start();
require("../config/database.php");
require("../config/function.php");
require("../config/functions.crud.php");
require("versi.php");

if (isset($_SESSION['id_siswa'])) {
  $siswa = fetch($koneksi, 'siswa', ['id_siswa' => $_SESSION['id_siswa']]);
  $tgl_lahirsiswa = $siswa['tgl_lahir'];
$tgl_mutasi = $siswa['tgl_mutasi'];


?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>DATABASE | <?= $setting['nama_sekolah'] ?></title>
	<link rel="shortcut icon" href="../assets/database.ico" type="image/x-icon">
	
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta http-equiv="Conten-Type" content="text/html; charset=utf-8"/>

        <style>
            .btn {
                cursor: pointer
            }
        </style>
	
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
  <link rel="stylesheet" href="../assets/modules/summernote/summernote-bs4.css">
   
	


  

	<script type="text/javascript">
		$(document).ready(function() {
		    $('#siswa').select2({
		    	placeholder: "Pilih siswa",
				allowClear: true,
				language: "id"
		    });
		});
	</script>
	 <script src="../vendor/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
	<style>
            .btn {
                cursor: pointer
            }

            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
                opacity: 0.8;
            }

            .preloader .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                font: 14px arial;
            }
        </style>
    <style>
      .modal-backdrop {
        position: inherit;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 900;
        background-color: #000;
      }
    </style>
	<script type="text/javascript">
  function pilihan()
  {
     // membaca jumlah komponen dalam form bernama 'myform'
     var jumKomponen = document.myform.length;
     // jika checkbox 'Pilih Semua' dipilih   
     if (document.myform[0].checked == true)
     {
        // semua checkbox pada data akan terpilih
        for (i=1; i<=jumKomponen; i++)
        {
            if (document.myform[i].type == "checkbox") document.myform[i].checked = true;
        }
     }
     // jika checkbox 'Pilih Semua' tidak dipilih
     else if (document.myform[0].checked == false)
        {
            // semua checkbox pada data tidak dipilih
            for (i=1; i<=jumKomponen; i++)
            {
               if (document.myform[i].type == "checkbox") document.myform[i].checked = false;
            } 
        }
  }
  </script>

  </head>
  
    <body  class="app sidebar-mini">
	<div class="preloader">
            <div class="loading">
                <img src="../assets/back/load.gif" width="80">
                <p>Harap Tunggu</p>
            </div>
        </div>
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="."><img src="../<?= $setting['logo_ppdb'] ?>" width="200" alt="PPDB"></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
	  
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        	
	<!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i><small class="label pull-right badge badge-danger"><?= rowcount($koneksi, 'pengumuman', ['jenis' => 1]) ?></small></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">Kamu Mempunyai <?= rowcount($koneksi, 'pengumuman', ['jenis' => 1]) ?> Pesan Baru.</li>
            <div class="app-notification__content">
			<?php
                            $query = mysqli_query($koneksi, "select * from pengumuman where jenis='1'");
                            $no = 0;
                            while ($pengumuman = mysqli_fetch_array($query)) {
                                $tgl_pengumuman = strtotime($pengumuman['tgl']);
								$no++;
								
                            ?>
							
			<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                   <div>
				   
					<button type="button" class="label pull-right badge badge-info" data-toggle="modal" data-target="#info<?= $no ?>">
                       Lihat
                    </button> 
					
					
                    <p class="app-notification__message"><?= $pengumuman['judul'] ?></p>
                    <p class="app-notification__meta"><?php echo waktu_lalu("$tgl_pengumuman");?></p>
                  </div>
				 </a>
			</li>
			
            <?php }
                            ?>
              
              
            </div>
            
          </ul>
        </li>
		<?php
                            $query = mysqli_query($koneksi, "select * from pengumuman where jenis='1'");
                            $no = 0;
                            while ($pengumuman = mysqli_fetch_array($query)) {
                                $no++;
								
								$tgl_pengumuman = strtotime($pengumuman['tgl']);
                            ?>
					<div class="modal fade" id="info<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form id="form-foto<?= $no ?>">
							<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
								<div class="modal-header">
									<h5 class="modal-title"><?= $pengumuman['judul'] ?></h5>
									<p class="app-notification__meta"><?php echo waktu_lalu("$tgl_pengumuman");?></p>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								
								<div class="card" id="settings-card">
									
									<div class="card-body"
										<p><?= $pengumuman['pengumuman'] ?></p>

									</div>
									<div class="card-footer bg-whitesmoke text-md-right">
									
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
									</div>
								</div>
							</form>
						</div>
                       </div>
                     </div>
				<?php }
                            ?>
              
		<!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="?pg=formulir"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
	  
       </ul>
	   
    </header>
	
   <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar ">
      <?php include "menu.php" ?>
    </aside>
     <main class="app-content">
            <?php include "content.php"; ?>
	
	</main>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="../js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="../js/plugins/sweetalert.min.js"></script>
    
    
    <!-- Page specific javascripts-->
	 <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	
	
    <script type="text/javascript" src="../js/plugins/chart.js"></script>
	
      
        <!-- CORE SCRIPTS-->
       
        <script>
            $('.preloader').css('display', 'none');
        </script>
    <?php if ($setting['jenjang'] == 1) { ?>
	<?php 

	
	//Inisialisasi nilai variabel awal
	$nama_kelas= "";
	$total=null;

	//Query SQL
	$sql="SELECT nama_jenjang FROM jenjang GROUP BY id_jenjang";
	$hasil=mysqli_query($koneksi,$sql);

	while ($data = mysqli_fetch_array($hasil)) {
		
		//Mengambil nilai nama_jurusan dari database
		$jur=$data['nama_jenjang'];
		$nama_kelas .= "'$jur'". ", ";
		
		
		
		
	}
	
	

	?>
	<script type="text/javascript">
      var data = {
      	labels: [<?php echo $nama_kelas; ?>],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [<?php echo $total; ?>],
      		},
      	]
      };
      var pdata = [
      	{
      		value: <?= rowcount($koneksi, 'siswa', ['jenkel' => 'l','status'=>1,]) ?>,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Laki Laki"
      	},
      	{
      		value: <?= rowcount($koneksi, 'siswa', ['jenkel' => 'p','status'=>1]) ?>,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "Perempuan"
      	}
      ]
     var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
 <?php } ?>
     <?php if ($setting['jenjang'] == 2) { ?>
	<script type="text/javascript">
      var data = {
      	labels: ["Kelas 7", "Kelas 8", "Kelas 9"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [<?= rowcount($koneksi, 'siswa', ['kelas' => 7]) ?>, <?= rowcount($koneksi, 'siswa', ['kelas' => 8]) ?>, <?= rowcount($koneksi, 'siswa', ['kelas' => 9]) ?>]
      		},
      	]
      };
									<?php $query = mysqli_query($koneksi, "select * from siswa where status = '1'");
												?>
      var pdata = [
      	{
      		value: <?= rowcount($koneksi, 'siswa', ['jenkel' => 'l','status'=>1,]) ?>,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Laki Laki"
      	},
      	{
      		value: <?= rowcount($koneksi, 'siswa', ['jenkel' => 'p','status'=>1,]) ?>,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "Perempuan"
      	}
      ]
     var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
 <?php } ?>
 <?php if ($setting['jenjang'] == 3) { ?>
	<script type="text/javascript">
      var data = {
      	labels: ["Kelas 1", "Kelas 2", "Kelas 3","Kelas 4","Kelas 5","Kelas 6"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [<?= rowcount($koneksi, 'siswa', ['kelas' => 1]) ?>, <?= rowcount($koneksi, 'siswa', ['kelas' => 2]) ?>, <?= rowcount($koneksi, 'siswa', ['kelas' => 3]) ?>,<?= rowcount($koneksi, 'siswa', ['kelas' => 4]) ?>,<?= rowcount($koneksi, 'siswa', ['kelas' => 5]) ?>,<?= rowcount($koneksi, 'siswa', ['kelas' => 6]) ?>]
      		},
      	]
      };
      var pdata = [
      	{
      		value: <?= rowcount($koneksi, 'siswa', ['jenkel' => 'l','status'=>1,]) ?>,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Laki Laki"
      	},
      	{
      		value: <?= rowcount($koneksi, 'siswa', ['jenkel' => 'p','status'=>1,]) ?>,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "Perempuan"
      	}
      ]
     var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
 <?php } ?>
    <!-- dari stisla-->
	 <script type="text/javascript" src="../assets/modules/summernote/summernote-bs4.js"></script>
	 
	   <!-- General JS Scripts -->
    <script src="../assets/modules/popper.js"></script>
   
    <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../assets/modules/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>
	
   
    <script src="../assets/js/custom.js"></script>
	 <script>
  $(document).ready(function(){
   $('#summernote').summernote();
  });
 </script>
	<script type="text/javascript">
		var url = window.location;
		// for sidebar menu entirely but not cover treeview
		$('ul.sidebar-menu a').filter(function() {
			return this.href == url;
		}).parent().addClass('active');
		// for treeview
		$('ul.dropdown-menu a').filter(function() {
			return this.href == url;
		}).closest('.treeview').addClass('active');
	</script>
	<script src="../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
	


  </body>
  </html>
<?php
} else {
  include "masuk.php";
}
?>