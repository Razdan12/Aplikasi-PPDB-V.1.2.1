<!DOCTYPE html>

<html lang="en" translate="no">
<head>
<base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google" content="notranslate" />
    <meta name="description" content="Aplikasi Padamujua | <?= $setting['nama_sekolah'] ?>">
    <meta name="author" content="APM">
	<meta name="theme-color" content="#317EFB"/>
    <meta name="keyword" content="Aplikasi data terpadu mts mujubangga, database,database madrasah,database sekolah">
    <title>Aplikasi Padamujua | <?= $setting['nama_sekolah'] ?> </title>
   
    <link rel="icon" type="image/png" sizes="192x192" href="../<?= $setting['logo'] ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="../<?= $setting['logo'] ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="../<?= $setting['logo'] ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?= $setting['logo'] ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="../<?= $setting['logo'] ?>">
    <link rel="manifest" href="https://raport-dm.mtsmuh07purbalingga.sch.id/../assets/images/favicon/manifest.json">
	<meta name="msapplication-navbutton-color" content="#4285f4">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-TileColor" content="#ffffff">
    
    <meta name="theme-color" content="#ffffff">
	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">

<link rel="stylesheet" href="../css/login.bundle.1.0.3.min.css">
<script src="../css/login.bundle.1.0.3.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<style>
        @media screen and (max-width: 360px){
            #rc-imageselect, .g-recaptcha {transform:scale(0.66);-webkit-transform:scale(0.66);transform-origin:0 0;-webkit-transform-origin:0 0;}
        }
        @media screen and (min-width: 361px,max-width: 720px){
            #rc-imageselect, .g-recaptcha {transform:scale(0.88);-webkit-transform:scale(0.88);transform-origin:0 0;-webkit-transform-origin:0 0;}
        }
    </style>
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
<body style="background-color: #666666;">
<noscript><form action="" style="background-color:#fff;position:fixed;top:0;left:0;right:0;bottom:0;z-index:9999"><div style="font-size:18px;font-family:Helvetica,sans-serif;line-height:24px;margin:10%;width:80%"><p>Oh no! It looks like JavaScript is not enabled in your browser.</p><p style="margin:20px 0"><button type="submit" style="background-color:#4630eb;border-radius:100px;border:none;box-shadow:none;color:#fff;cursor:pointer;font-weight:700;line-height:20px;padding:6px 16px">Reload</button></p></div></form></noscript>

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
<div class="limiter">
    <div class="container-login100" >
        <div class="wrap-login100" style="height:100vh">
            <div style="overflow-y: auto; height: 100vh;">
                
			<form id="form-login" class="login100-form validate-form">
			
				<div class="card">
              <div class="card-body">
			 	 <div class="c-mb-none mb-3 text-center" >
          			<img width="110px" height="110px" src="../<?= $setting['logo'] ?>" alt="Logo">
            
          			</img></div>
			  	<center><h5 >Halaman Login Siswa</h5></center>
			    <center><h4 style="font-weight:bold;"> <?= $setting['nama_sekolah'] ?></h4></center>
                <center><p class="text-muted mb-3">Silahkan login menggunakan akun Anda</p></center>
                <div class="input-group mb-3">
                  <div class="input-group-append">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
                  <input class="form-control" type="username" name="username"placeholder="Username" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-append">
						<span class="input-group-text"><i class="fa fa-key"></i></span>
					</div>
                  <input class="form-control" type="password"  name="password"placeholder="Password"required>
                </div>
                
                
                 
                   <div class="row">
                  <div class="col-md-8 col-lg-8">
                   
                  </div>
				  <div class="col-md-4 col-lg-4">
                    <button type="submit" name="login" class="btn btn-success btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Masuk</button>
                  </div>
                 

                </div>
              
			   <div class="row mt-3">
			       
                  <center> 
                  <p class="text-muted">Aplikasi Database ini mencakup: Database siswa,Database guru, Alumni, PPDB Online dan Administrasi Mutasi Yang dikembangkang mandiri oleh APM</p> <a href="<?= $link ?>" target="_rdmlink"><?= $create ?></a><center> Versi <b> <?= $versi ?></b></center></center>
              </div>
			 
                  
              </div>
            </div>
			</form>
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
                    swal({
    						title: 'Login Berhasil',
    						text: 'Anda Akan Segera Di Alihkan',
    						type: 'success',
    						buttons: true,
    						});
                    setTimeout(function() {
                        window.location.href = ".";
                    }, 1000);

                } else {
                    swal({
    						title: 'Maaf',
    					    text: json.pesan,
    						type: 'warning',
    						buttons: true,
    						});
    						
    						
                }
               
            }
        });
        return false;
    });
  </script>  
  <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>
  </div>
            <div class="login100-more" style="background-image: url('../assets/back/wp3491048.jpg?1.0.3');height: 100vh;position: absolute;top: 0px;left: 0px;">
            </div>
        </div>
    </div>
</div>

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
          window.location.href="./"+login.status;
        }
      }
      if (elapsedTime >= 107) {
        clearInterval(interval);
        $(".pre-loader").hide();
      }
	  } else {
		  progressbar(elapsedTime);
	  }
	  elapsedTime++;
	}
	//setTimeout(function(){ $(".pre-loader").hide(); }, 2000);
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

  </script>
 
</body>
	
</html>
