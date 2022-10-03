<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
require "login/versi.php";
$tahun1 = date('Y');
$tahun2 = date('Y')+1;
$buka  = new DateTime($setting['tgl_pengumuman']); //awal Buka
$tutup  = new DateTime($setting['tgl_tutup']); //awal Buka
$hariini = new DateTime(); // Waktu sekarang atau akhir
$diff  = $hariini->diff($buka);
$tgl_buka = $setting['tgl_pengumuman'];
$tgl_tutup = $setting['tgl_tutup'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PPDB Online | <?= $setting['nama_sekolah'] ?></title>
   
    <link rel="shortcut icon" href="<?= $setting['logo'] ?>" type="image/png">
    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/faa.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
    }

    table th {
        padding: 15px 35px;
        border-left: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
    }

    table th:first-child {
        border-left: none;
    }

    table tr {
        text-align: center;
        padding-left: 20px;
    }

    table td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
    }

    table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
    }

    table tr:last-child td {
        border-bottom: 0;
    }

    table tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    table tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    table tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
    }


    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
 <!-- JIKA PENDAFTARAN BELUM DI BUKA -->
<?php if ($hariini <= $buka) { ?>	
<body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <img src="<?= $setting['logo'] ?>" alt="Logo" width="35" style="position:absolute;margin-top:-10px;">
                    <span style="margin-left:45px;">&nbsp;PPDB Online</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-bookmark"></i> INFO</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#syarat"><i class="fa fa-briefcase"></i> Syarat</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Kontak</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
                <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="<?= $setting['logo'] ?>" style="margin-top:-15%;margin-bottom:-10px;" width="100">
                    <br><br>
                    <div class="intro-text">
                        <span class="name shad" style="font-size:35px; line-height: 35px;">
                            SELAMAT DATANG DI PPDB ONLINE <br> <?= $setting['nama_sekolah'] ?>                        </span>
                        <br>
                                                    <span>
                               
								<a href="" class="btn btn-warning" style="margin: 5px; border-radius: 6px;">
                                    <i class="fa fa-list faa-pulse"></i> &nbsp;
                                    <b>PENDAFTARAN AKAN DI BUKA PADA TANGGAL <?php echo tgl_indo("$tgl_buka");?></b>
                                </a>
                               
                                <br>
                            </span>
                                            </div>
                </div>
            </div>
        </div>
    </header>
	<?php } ?>
 <?php if ($hariini >= $tutup) { ?>	
 <body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <img src="<?= $setting['logo'] ?>" alt="Logo" width="35" style="position:absolute;margin-top:-10px;">
                    <span style="margin-left:45px;">&nbsp;PPDB Online</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-bookmark"></i> Info</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#syarat"><i class="fa fa-briefcase"></i> Syarat</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Kontak</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
                <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="<?= $setting['logo'] ?>" style="margin-top:-15%;margin-bottom:-10px;" width="100">
                    <br><br>
                    <div class="intro-text">
                        <span class="name shad" style="font-size:35px; line-height: 35px;">
                            SELAMAT DATANG DI PPDB ONLINE <br> <?= $setting['nama_sekolah'] ?>                        </span>
                        <br>
                                                    <span>
                                
                                <a href="" class="btn btn-danger" style="margin: 5px; border-radius: 6px;">
                                    <i class="fa fa-sign-in faa-pulse"></i> &nbsp;
                                    <b>PENDAFTARAN SUDAH DI TUTUP PADA TANGGAL <?php echo tgl_indo("$tgl_tutup");?></b></a>
                                <br>
                            </span>
                                            </div>
                </div>
            </div>
        </div>
    </header>
	<?php } else { ?> 

<?php if ($hariini >= $buka )  { ?>	

 <body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <img src="<?= $setting['logo'] ?>" alt="Logo" width="35" style="position:absolute;margin-top:-10px;">
                    <span style="margin-left:45px;">&nbsp;PPDB Online</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-bookmark"></i> Info</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#syarat"><i class="fa fa-briefcase"></i> Syarat</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Kontak</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
                <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="<?= $setting['logo'] ?>" style="margin-top:-15%;margin-bottom:-10px;" width="100">
                    <br><br>
                    <div class="intro-text">
                        <span class="name shad" style="font-size:35px; line-height: 35px;">
                            SELAMAT DATANG DI PPDB ONLINE <br> <?= $setting['nama_sekolah'] ?>                       </span>
                        <br>
                                                    <span>
                                <a href="daftar.php"  class="btn btn-warning" style="margin: 5px; border-radius: 6px;">
                                    <i class="fa fa-list faa-pulse"></i> &nbsp;
                                    <b>KLIK DAFTAR</b>
                                </a>
                                <a href="user" class="btn btn-danger" style="margin: 5px; border-radius: 6px;">
                                    <i class="fa fa-sign-in faa-pulse"></i> &nbsp;
                                    <b>MASUK SISWA</b></a>
                                <br>
                            </span>
                                            </div>
                </div>
            </div>
        </div>
    </header>
	 <?php } ?>	
  <?php } ?>
    <style>
        table {
            margin: auto;
            font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
            font-size: 12px;

        }

        .demo-table {
            border-collapse: collapse;
            font-size: 13px;
        }

        .demo-table th,
        .demo-table td {
            border-bottom: 1px solid #e1edff;
            border-left: 1px solid #e1edff;
            padding: 7px 17px;
        }

        .demo-table th,
        .demo-table td:last-child {
            border-right: 1px solid #e1edff;
        }

        .demo-table td:first-child {
            border-top: 1px solid #e1edff;
        }

        .demo-table td:last-child {
            border-bottom: 0;
        }

        caption {
            caption-side: top;
            margin-bottom: 10px;
        }

        /* Table Header */
        .demo-table thead th {
            background-color: #508abb;
            color: #FFFFFF;
            border-color: #6ea1cc !important;
            text-transform: uppercase;
        }

        /* Table Body */
        .demo-table tbody td {
            color: #353535;
        }

        .demo-table tbody tr:nth-child(odd) td {
            background-color: #f4fbff;
        }

        .demo-table tbody tr:hover th,
        .demo-table tbody tr:hover td {
            background-color: #ffffa2;
            border-color: #ffff0f;
            transition: all .2s;
        }
    </style>

    <!-- About Section -->
    

    <section class="success" id="about" style="padding: 30px; border-top: 2px solid #fff;">
        <div class="container">
            <div class=" row">
                <div class="col-lg-12 text-center">
                    <h2>Informasi PPDB Online</h2>
                    <hr style="width: 150px;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2" style="text-align:justify; line-height: 22px;">
                    <p><?= $setting['nama_sekolah'] ?> menyediakan PPDB secara <i>online</i> diharapkan proses PPDB dapat berjalan cepat
                        dan bisa dilakukan dimanapun dan kapanpun selama sesi PPDB Online dibuka. Proses pendaftaran calon siswa baru di masa pandemi Covid-19 ini dan terhambat oleh jarak jika datang ke madrasah langsung, bisa mengakses website PPDB Online <?= $setting['nama_sekolah'] ?>. </p>
                </div>
                <div class="col-lg-4" style="text-align:justify; line-height: 22px;">
                    <p>Pengisian form PPDB Online mohon diperhatikan data yang dibutuhkan yang nantinya akan dipakai dalam proses PPDB. Setelah proses pengisian form PPDB secara online berhasil dilakukan, calon siswa akan mendapat bukti daftar dengan nomor pendaftaran dan harus disimpan yang akan digunakan untuk proses selanjutnya.</p>
                </div>
                
            </div>
        </div>
    </section>


    <section id="syarat" style="background: url(img/bg.png) repeat; padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Syarat Pendaftaran</h2>
                    <hr style="width: 150px;">

                </div>
            </div>
            <div class="card mt-2">
                                   
                                    <div class="card-body">
                                      <div class="row">
										<div class="col-12 animated bounceIn">
											<div class="card">
												
												<div class="card-body">
													<div class="activities">
																													<div class="activity">
																<div class="activity-icon bg-primary text-white shadow-primary">
																	<i class="fas fa-bullhorn"></i>
																</div>
																<div class="activity-detail">
																	
																	
																	<p><h5 style="mso-margin-bottom-alt:auto;line-height:normal">
																	<ol start="1" type="1">
																	 <li class="MsoNormal" style="line-height: normal;"><span style="font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:"Arial","sans-serif";
																		 mso-fareast-font-family:"Times New Roman";mso-ansi-language:EN-US">Fhotocopy
																		 Kartu Keluarga<o:p></o:p></span></li>
																	 <li class="MsoNormal" style="line-height: normal;"><span style="font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:"Arial","sans-serif";
																		 mso-fareast-font-family:"Times New Roman";mso-ansi-language:EN-US">Photocopy
																		 Akta Kelahiran<o:p></o:p></span></li>
																	 <li class="MsoNormal" style="line-height: normal;"><span style="font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:"Arial","sans-serif";
																		 mso-fareast-font-family:"Times New Roman";mso-ansi-language:EN-US">Photocopy
																		 Raport Terakhir<o:p></o:p></span></li>
																	 <li class="MsoNormal" style="line-height: normal;"><span style="font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:"Arial","sans-serif";
																		 mso-fareast-font-family:"Times New Roman";mso-ansi-language:EN-US">Photocopy
																		 KIP,PKH (Jika ada)<o:p></o:p></span></li>
																	 <li class="MsoNormal" style="line-height: normal;"><span style="font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:"Arial","sans-serif";
																		 mso-fareast-font-family:"Times New Roman";mso-ansi-language:EN-US">Photocopy
																		 Surat Keterangan Lulus atau Ijazah (Jika sudah ada)<o:p></o:p></span></li>
																	</ol><p class="MsoNormal" style="mso-margin-bottom-alt:auto;line-height:normal">







																	</p></h5><p>















</p></p>
																</div>
															</div>
														
													</div>
												</div>
											</div>
										</div>
									</div> 
                                    </div>
                                </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="success" id="contact" style="padding: 30px; border-top: solid 2px #fff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Kontak Kami</h2>
                    <hr style="width: 150px;">
                </div>
                <div class="col-lg-12" style="margin-top:-10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h4 align="center">PPDB Online &copy; <?= $setting['nama_sekolah'] ?> <br><?= $setting['alamat'] ?></h4>
                        <p align="center" style="font-size: 14px;">
                            <span><b><i class="fa fa-phone-square">&nbsp;</i> <?= $setting['no_telp'] ?></b></span><br>
                            <span><b><i class="fa fa-envelope">&nbsp;</i> <?= $setting['email'] ?></b></span><br>
                            <span><b><i class="fa fa-globe">&nbsp;</i> <?= $setting['web'] ?></b></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        PPDB Online &copy; <?= $setting['nama_sekolah'] ?>                  </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/freelancer.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "<?= $setting['nolivechat'] ?>", // WhatsApp number
            email: "<?= $setting['email'] ?>", // Email
            call_to_action: "Hubungi Kami!!!", // Call to action
            button_color: "#129BF4", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "whatsapp,email", // Order of buttons
            pre_filled_message: "<?= $setting['livechat'] ?>", // WhatsApp pre-filled message
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
	 </script>
</body>

</html>
