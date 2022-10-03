<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$siswa = fetch($koneksi, 'siswa', ['id_siswa' => dekripsi($_GET['id'])]);
$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelasmutasi']]);
$tgl_lahirsiswa = $siswa['tgl_lahir'];
$tgl_mutasi = $siswa['tgl_mutasi'];


?>

<style>
 #hed1 {
    font-family               : Verdana;
	font-size                 : 1px;
	border-collapse				: collapse;
	padding				:0px;
	    background:#999;
}
</style>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <title>Surat_Mutasi<?= $siswa['nama_siswa'] ?></title>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<style type="text/css">

body {
    background: #fff;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 12px

}

tr {
    font-family               : Verdana;
	font-size                 : 11px;
	border-collapse				: collapse;
	padding				:0px;
    page-break-inside: avoid;
     page-break-after: auto ;
}
tab.td {
    font-family               : Verdana;
	font-size                 : 11px;
	border-collapse				: collapse;
	padding-left				:5px;
}
input, textarea{
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color            : #000000;
	background-color : #FFFFFF;

}
option, select {
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color            : #000000;
	background-color : #FFFFFF;
}
a, a:link, a:visited, a:active {
    color           : black;
    font-weight     : bold;
    font-family     : Verdana;
    font-size       : 11px ;
	text-decoration : none;
}
a:hover {
    color           : red;
	font-weight     : bold;
    font-family     : Verdana;
    font-size       : 11px;
	text-decoration : none;
}
A.headerlink {
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color       : #FFFFFF;
	
}
  
.page-portrait {
    position: relative;
    width: 21cm;
    margin: 0.5cm auto;
    padding: 1cm;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    -webkit-box-sizing: initial;
    -moz-box-sizing: initial;
    box-sizing: initial;

}

.but{
    cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#666;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
}
.disabled{
    background:#c0c0c0;
    padding: 1px 2px;
	color:#000000;
}

.textboxred{
	color:#000000;
	padding: 1px 2px;
	background-color: #FB4678;
}

.header {
   border:outset 2px #000000;
     color:#000000;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.header1 {
    font-size        : 15px;
	font-weight:bold;
}
.header2 {
	font-family      : Arial;
    font-size        : 22px;
	font-weight:bold;
}
.header3 {
	font-family      : Arial;
    font-size        : 14px;
}
.headerpesan {
    border:outset 1px #ccc;
    background:#999;
    color:#FFFFFF;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2agreen.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.headerlong {
    border:outset 2px #000000;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.headerlink2 {
	cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#fcf300;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
	
}
.headerlink2active {
	cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#fcf300;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2a.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
	
}
.tab {
    font-family               : Verdana;
	font-size                 : 11px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : groove 2px #000000;
	border-collapse    : collapse;
}
.tab1 {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}
.tab01 {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	
}
.red {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #FF0000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}

.tab2 {
    font-family               : Verdana;
	font-size                 : 11px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-right:none;
}

.tab3 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-left:none;
}


.headerlongar {
    border:outset 2px #000000;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
    border-collapse    : collapse;
 	font-size:14.0pt;
	line-height:105%;
	font-family:Times New Roman;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
}


.tabar {
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : groove 2px #000000;
	border-collapse    : collapse;
	font-size:14.0pt;
	line-height:105%;
	font-family:Times New Roman;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
}
.tabar1 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}
.redar {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #FF0000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}

.tabar2 {
    font-family               : Verdana;
	font-size                 : 11px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-right:none;
}

.tabar3 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-left:none;
}

.ttd {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : none;
	border-collapse    : collapse;
}
.h {
		background-color:#565656;
		border-collapse    : collapse;
		color:#FFFFFF;
    	font-weight:bold;
	}
.back_table {
	background-image: url(../images/bktablelong.jpg);
	background-repeat: no-repeat;
}
.tab_kelas {
	background-color: #FFFFFF;
	border-bottom-style: none;
}
.miring {
	border-bottom-style: none;
	font-style: italic;
}
.brown {
	color: #663333;
}
.ukuran {
	width: 135px;
}
.ukuranemail {
	width: 150px;
}
.Ukuranketerangan {
	height: 40px;
	width: 200px;
}
.text_merah{
    background:#FFFFFF;
    padding: 1px 2px;
	color:#FF0000;
}
input,textarea,select{
	border:1px solid #333333; padding:1px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

div.page {
    page-break-before:always;
}
.style1{
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF
}
.style6 {
	font-size: 12px;
	font-weight: bold;
}
.style13 {
	font-size: 18px;
}
.style14 {color: #FFFFFF}
header { 
    position: fixed; 
    top: 25%; 
    left:     0px;
    width:    100%;
    height:   100%;
    opacity: .1;
 
}
header img { 
    width:    8cm;
    height:   8cm;
}
#watermark {
				display: block;
				position: fixed;
				top: -10%;
				left: 105px;
				transform: rotate(-45deg);
				transform-origin: 50% 50%;
				opacity: .15;
                font-family: Verdana;
                font-size: 20px;
				color: #76fd4a;
				width: 480px;
				text-align: center;
                white-space: nowrap;
               
			}

            @media print {
    body {
        background: #fff;
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt
    }
            .page {
            page-break-before: always;
        }  
       .page-portrait {
		width: 21cm;
        max-height: 29.7cm;
        padding-top: 1cm;
        padding-bottom: 1cm;
        padding-right: 1.5cm;
        padding-left: 2cm;
        margin: 0cm;
        box-shadow: none;

    }
        .footer {
        bottom: 0.7cm;
        left: 0.7cm;
        right: 0.7cm
    }
}
</style>
</HEAD>
<BODY>
<style type="text/css">

    <!--
    header {
        position: fixed;
        top: 25%;
        left:     0px;
        width:    100%;
        height:   100%;
        opacity: .1;
        color: #3c5c00;
    }
    header img {
        width:    8cm;
        height:   8cm;
    }

    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: #FFFFFF00; height: 50px; }
    footer .pagenum:before {
        content: counter(page);
    }
    #watermark {
        display: block;
        position: fixed;
        top: -10%;
        left: 105px;
        transform: rotate(-45deg);
        transform-origin: 50% 50%;
        opacity: .15;
        font-family: Verdana;
        font-size: 20px;
        color: #76fd4a;
        width: 480px;
        text-align: center;
        white-space: nowrap;
    }

    -->
</style>

    <div class="page-portrait">
<?php if ($setting['_kop'] == "1") { ?>
 <table width="100%" class="page_header1" >
    <tbody><tr>
       
        <td>
            <center><img src="../../<?= $setting['kop'] ?> " width="100%">
            </center></td>
       
    </tr>
	
    </tbody>
	</table>

		<hr>
	
<?php } else { ?>
    <table width="100%" class="page_header1" >
    <tbody><tr>
        <td style="width:75px;padding-bottom:4px;"><img src="../../<?= $setting['logo'] ?> " height="75px"></td>
        <td>
            <center>
                <span class="header1"><?= $setting['lembaga'] ?> </span><br>
                <span class="header2"><?= $setting['nama_sekolah'] ?></span><br>
                <span class="header3"><i>NSM <?= $setting['nsm'] ?> / NPSN <?= $setting['npsn'] ?><br>
                <?= $setting['alamat'] ?> Kecamatan <?= $setting['kec'] ?>, Kabupaten <?= $setting['kab'] ?> - <?= $setting['provinsi'] ?>                </i></span>
            </center></td>
        <td style="width:75px;padding-bottom:4px;"></td>
    </tr>
    </tbody>
</table>
<?php } ?>



		<table background="#000000" border="2" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>
                </td>
			</tr>
		</table>

<table width="100%" align="center" border="0">
    <tr>
        <td>

            <br>
            <div align="center" class="style13">
                    <b>SURAT KETERANGAN MUTASI </b>
					<p>Nomor : <?= $siswa['surat_masuk'] ?> </p>
            </div>
            <br>
			
            <br>
        </td>
    </tr>
    </table>
	
					
            <table width="100%" border="0">
			<td style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                   
                    Yang bertanda tangan dibawah ini, Kepala <?= $setting['nama_sekolah'] ?> Kecamatan <?= $setting['kec'] ?> Kabupaten <?= $setting['kota'] ?>, dengan ini menerangkan bahwa siswa berikut ini:
                    </td>
			</table>
<br>
<table width="100%" border="0">
				 <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    Nama Peserta Didik 
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <?= $siswa['nama_siswa'] ?>		
                    </td>
                </tr>
                <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    NIS
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <?= $siswa['nis'] ?>		
                    </td>
                </tr>
                <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    NISN
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <?= $siswa['nisn'] ?>			
                    </td>
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    Kelas-Jurusan
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <?= $kelas['kode'] ?>-<?= $kelas['nama_jenjang'] ?>			
                    </td>
                </tr>

                <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    Tempat Tanggal Lahir
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <?= $siswa['tempat_lahir'] ?>, <?php echo tgl_indo("$tgl_lahirsiswa");?>		
                    </td>
                </tr>

                <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    Jenis Kelamin
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                                                        <?php if ($siswa['jk'] == 'L') { ?> Laki Laki <?php } else { ?> Perempuan <?php } ?>
																
                    </td>
                </tr>

                <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    Agama
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <?= $siswa['agama'] ?>		
                    </td>
                </tr>

               
                <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    Alamat Peserta Didik
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <?= $siswa['alamat_siswa'] ?>	
                    </td>
                </tr>

                
                
                    <tr>
                    <td width="10%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    Sekolah Asal
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    :
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                        <?= $setting['nama_sekolah'] ?>		
                    </td>
                </tr>

                    

                <tr>
                    <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    <br>
                    </td>
                    <td width="40%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;' valign="top">
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                    <td width="60%" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;'>
                    
                    </td>
                </tr>
				</table>
				<table width="100%" border="0">
			<td style='font-size:12.0pt;padding-left: 5px;line-height: 28px;padding-left: 5px;'>
                   
                    Telah mengajukan pindah sekolah dari Sekolah/Madrasah <?= $setting['nama_sekolah'] ?> Kecamatan <?= $setting['kec'] ?> Kabupaten <?= $setting['kota'] ?> ke Sekolah/Madrasah <b><?= $siswa['sekolah_mutasi'] ?></b> dengan alasan <b><?= $siswa['alasan_mutasi'] ?></b>:
                    </td>
			</table>
			<br>
			</br>
			<table width="100%" border="0">
                <tr>
                    <td colspan="3" width="40%" valign="bottom">
                        <div  style=" display:inline-block;">
                            <br><br><br><br><br><br><br>
                            </div>
                        <div  style=" display:inline-block;float: right;width: 27mm;">
                            <br><br><br>
                        <div  style=" border: 2px solid white;width: 25mm;height: 30mm;text-align: center;"><span><br><br><br><br></div>
                        </div>
                    </td>
                    <td width="60%" valign="top" style='font-size:12.0pt;padding-left: 5px;line-height: 28px;padding-left: 40px;'>
                    <span style="white-space: nowrap;">
                    <?= $setting['kec'] ?>, <?php echo tgl_indo("$tgl_mutasi");?></span> <br>
                    <span style="white-space: nowrap;">
                    Kepala Sekolah/Madrasah </span>	<br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <u style="white-space: nowrap;font-weight: bold;"></u><br>
                    <span style="white-space: nowrap;">
                    <?= $setting['kepala'] ?> 	</span>
                    </td>
                </tr>

            </table>



</div> 
</BODY>


</HTML>

