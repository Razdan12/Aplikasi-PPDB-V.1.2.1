<?php
session_start();
require("../config/database.php");
require("../config/function.php");
require("../config/functions.crud.php");
require("versi.php");
if (isset($_SESSION['id_user'])) {
$user = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user='$_SESSION[id_user]'"));

?>



  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>ADMIN PPDB | <?= $setting['nama_sekolah'] ?></title>
	 <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" >
	
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
     <link rel="stylesheet" href="../assets/modules/font-awesome/css/font-awesome.css">
	
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
    <style >
.pre-loader {
    background: #fff;
    background-position: center center;
    background-size: 13%;
    position: fixed;
    left: 0;
	
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 12345;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center
}

.pre-loader .loader-logo {
    padding-bottom: 15px;
}

.pre-loader .loader-progress {
    height: 8px;
    border-radius: 15px;
    max-width: 200px;
    margin: 0 auto;
    display: block;
    background: #ecf0f4;
    overflow: hidden
}

.pre-loader .bar {
    width: 0%;
    height: 8px;
    display: block;
    background: #1b00ff
}

.pre-loader .percent {
    text-align: center;
    font-size: 24px;
}

.pre-loader .loading-text {
    text-align: center;
    font-size: 18px;
    font-weight: 500;
    padding-top: 15px
}

		</style> 
	
  </head>
 <script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=68e723e4e2562' async='true'></script> 
    <body  class="app sidebar-mini">
 <div class="pre-loader">
<div class="pre-loader-box">
  <div class="loader-logo"><img src="../assets/back/loading.gif" width="160px" alt=""></div>
  <div class="loader-progress" id="progress_div">
    <div class="bar" id="bar1" style="width: 100%;"></div>
  </div>
  <div class="percent" id="percent1">100%</div>
  <div class="loading-text">
    Mohon Menunggu...
  </div>
</div>
</div>
    <!-- Navbar-->
     <header class="app-header"><a class="app-header__logo" href="."><img src="../<?= $setting['logo_ppdb'] ?>" width="200" alt="PPDB"></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
	  
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        	
		<!--Notification Menu-->
		<?php if ($user['akses'] == "admin") { ?>
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
            <li class="app-notification__footer"><a href="?pg=pengumuman">See all notifications.</a></li>
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
            <li><a class="dropdown-item" href="?pg=setting"><i class="fa fa-cog fa-lg"></i> Pengaturan</a></li>
			
			<li><a class="dropdown-item" href="?pg=update"><i class="fa fa-upload fa-lg"></i> Update</a></li>
			<?php if ($setting['ppdb'] == 1) { ?>
            <li><a class="dropdown-item" href="logout2.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
			<?php } else { ?>
			 <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
			 <?php } ?>
          </ul>
        </li>
		<?php } else { ?> 
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
            <li class="app-notification__footer"><a href="?pg=pengumuman">See all notifications.</a></li>
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
            <li><a class="dropdown-item" href="?pg=pengguna"><i class="fa fa-cog fa-lg"></i> My Account</a></li>
			
			
			<?php if ($setting['ppdb'] == 1) { ?>
            <li><a class="dropdown-item" href="logout2.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
			<?php } else { ?>
			 <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
			 <?php } ?>
          </ul>
        </li>									
											
		<?php } ?>
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
	
	<script type="text/javascript">
      $('#demoNotify').click(function(){
      	$.notify({
      		title: "Update Complete : ",
      		message: "Something cool is just updated!",
      		icon: 'fa fa-check' 
      	},{
      		type: "info"
      	});
      });
      $('#demoSwal').click(function(){
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
      			swal("Deleted!", "Your imaginary file has been deleted.", "success");
      		} else {
      			swal("Cancelled", "Your imaginary file is safe :)", "error");
      		}
      	});
      });
    </script>
<script>
  $(document).ready(function() {
	var elapsedTime = 0;
	var interval = setInterval(function() {
	  timer()
	}, 10);

	function progressbar(percent) {
	  document.getElementById("bar1").style.width = percent + '%';
	  document.getElementById("percent1").innerHTML = percent + '%';
	}

	function timer() {
	  if (elapsedTime > 100) {
      var RDMData = decodeURIComponent(getCookie("rdmData"));
      if(RDMData !==""){
        var login = JSON.parse(RDMData);
        if(login.status !==""){
          clearInterval(interval);
          window.location.href="https://raport-dm.mtsmuh07purbalingga.sch.id/"+login.status;
        }
      }
      if (elapsedTime >= 10) {
        clearInterval(interval);
        $(".pre-loader").hide();
      }
	  } else {
		  progressbar(elapsedTime);
	  }
	  elapsedTime++;
	}
	setTimeout(function(){ $(".pre-loader").hide(); }, 200);
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }	


});
$.blockUI.defaults.message = "<h4>Harap bersabar...<br>Sedang memproses data.</h4>";
$.blockUI.defaults.baseZ= 9000;
$('a[href$="#"]').click(function (event) {
            event.preventDefault ? event.preventDefault() : event.returnValue = false;

        });
  if('serviceWorker' in navigator) {

        navigator.serviceWorker.register('https://raport-dm.mtsmuh07purbalingga.sch.id/rdm-sw.js?ver=1.0.3&revision=20210806202524', { scope: 'https://raport-dm.mtsmuh07purbalingga.sch.id/' })
          .then(function(registration) {
              
                console.log('Service Worker Registered');
          });

        navigator.serviceWorker.ready.then(function(registration) {
           console.log('Service Worker Ready');
        });

    }
  </script>      
        <!-- CORE SCRIPTS-->
       
        <script>
            $('.preloader').css('display', 'none');
        </script>
		
   <script type="text/javascript">
<?php
	$tahun = date('Y')-3;
	$tahun1 = date('Y')-2;
	$tahun2 = date('Y')-1;
	$tahun3 = date('Y');
	$hitung = rowcount($koneksi, 'siswa', ['tahun_lulus' => $tahun]);
	$hitung1 = rowcount($koneksi, 'siswa', ['tahun_lulus' => $tahun1]);
	$hitung2 = rowcount($koneksi, 'siswa', ['tahun_lulus' => $tahun2]);
	$hitung3 = rowcount($koneksi, 'siswa', ['tahun_lulus' => $tahun3]);
	
	
?> 
												
												
      var data = {
      	labels: [
		 <?php $query = mysqli_query($koneksi, "select * from siswa  where status ='3' group by tahun_lulus  ");
												 $no = 0;
												while ($tahun_lulus = mysqli_fetch_array($query)) {
													$hitung = rowcount($koneksi, 'siswa', ['tahun_lulus' => $tahun_lulus['tahun_lulus']]);
													$no++;
													
													
												?>
		
		"<?= $tahun_lulus['tahun_lulus'] ?>",<?php } ?>],
      	datasets: [
		
      		{
      			label: "Data Alumni",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [
				<?php $query = mysqli_query($koneksi, "select * from siswa  where status ='3' group by tahun_lulus  ");
												 $no = 0;
												while ($tahun_lulus = mysqli_fetch_array($query)) {
													$hitung = rowcount($koneksi, 'siswa', ['tahun_lulus' => $tahun_lulus['tahun_lulus']]);
													$no++;
													
													
												?>
		
		"<?= $hitung ?>",<?php } ?>],
		
      		},
      		
      	]
      };
	  var data2 = {
      	labels: [
		<?php
                            $query = mysqli_query($koneksi, "select * from jenjang");
                            $no = 0;
                            while ($jenjang = mysqli_fetch_array($query)) {
													
													$hitung = rowcount($koneksi, 'siswa', ['kelas' => $jenjang['kode']]);
                                $no++;
                            ?>
		"<?= $jenjang['kode'] ?>-<?= $jenjang['nama_jenjang'] ?>",<?php } ?>],
      	datasets: [
      		{
      			label: "Data Alumni",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [
				<?php
                            $query = mysqli_query($koneksi, "select * from jenjang");
                            $no = 0;
                            while ($jenjang = mysqli_fetch_array($query)) {
													
													$jumlah = rowcount($koneksi, 'siswa', ['kelas' => $jenjang['id_jenjang']]);
                                $no++;
                            ?>
				"<?= $jumlah ?>",<?php } ?>],
      		},
      		
      	]
      };
      
      
      
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
	  var ctxb = $("#barChartDemo2").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data2);
    
     
    </script>
	<script type="text/javascript">

												
												
      
	  var data2 = {
      	labels: [
		<?php
                            $query = mysqli_query($koneksi, "select * from jenjang");
                            $no = 0;
                            while ($jenjang = mysqli_fetch_array($query)) {
													
													$hitung = rowcount($koneksi, 'siswa', ['kelas' => $jenjang['kode']]);
                                $no++;
                            ?>
		"<?= $jenjang['kode'] ?>-<?= $jenjang['nama_jenjang'] ?>",<?php } ?>],
      	datasets: [
      		{
      			label: "Data Alumni",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [
				<?php
                            $query = mysqli_query($koneksi, "select * from jenjang");
                            $no = 0;
                            while ($jenjang = mysqli_fetch_array($query)) {
													
													$jumlah = rowcount($koneksi, 'siswa', ['kelas' => $jenjang['id_jenjang']]);
                                $no++;
                            ?>
				"<?= $jumlah ?>",<?php } ?>],
      		},
      		
      	]
      };
      
      
      
      
	  var ctxb = $("#barChartDemo3").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data2);
    
     
    </script>
	
    <!-- dari stisla-->
	 <script type="text/javascript" src="../assets/modules/summernote/summernote-bs4.js"></script>

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
	
</script>
 <!-- Script Print Copy Excell-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
	
	
	
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
	<script type="text/javascript" class="init">
	


$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
} );



	</script>	
<!-- Script Print Copy Excell-->	



  </body>
  </html>
<?php
} else {
  include "masuk.php";
}
?>
