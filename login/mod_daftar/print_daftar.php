<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$siswa = fetch($koneksi, 'siswa', ['id_siswa' => dekripsi($_GET['id'])]);
$tempdir = "../temp/"; //Nama folder tempat menyimpan file qrcode
if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

//isi qrcode jika di scan
$codeContents = $siswa['nisn'] . '-' . $siswa['nama_siswa'];

//simpan file kedalam temp
//nilai konfigurasi Frame di bawah 4 tidak direkomendasikan

QRcode::png($codeContents, $tempdir . $siswa['nisn'] . '.png', QR_ECLEVEL_M, 4);


$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
$tgl_lahirsiswa = $siswa['tgl_lahir'];
$tgl_mutasi = $siswa['tgl_mutasi'];
$tahun1 = date('Y');
$tahun2 = date('Y')+1;

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
    <title>Biotata_<?= $siswa['nama_siswa'] ?></title>
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

<table width="60%" align="center" border="0">
    <tr>
        <td>

            <br>
            <div align="center" class="style13">
                    <b>FORMULIR PENDAFTARAN SISWA BARU TAHUN PELAJARAN <?= $tahun1 ?> / <?= $tahun2 ?> </b>
            </div>
            <br>
			
            <br>
        </td>
    </tr>
    </table>
            <table width="80%" border="0">
                <tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    1.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    NO Pendaftaran
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <b><?= $siswa['no_daftar'] ?></b>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    2.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    NISN
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['nisn'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    3.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    No. KK
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['no_kk'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    4.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    NIK
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['nik'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    5.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Nama Peserta Didik 
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <b><?= $siswa['nama_siswa'] ?></b>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    6.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Jenis Kelamin
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?php if ($siswa['jk'] == 'L') { ?> Laki Laki <?php } else { ?> Perempuan <?php } ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    7.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Tempat dan Tanggal Lahir
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['tempat_lahir'] ?>, <?php echo tgl_indo("$tgl_lahirsiswa");?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    8.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Agama
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['agama'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    9.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Kewarga Negaraan
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['warga_siswa'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    10.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Anak Ke
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['anak_ke'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    11.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Jumlah Saudara
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['saudara'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    12.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Status Anak
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    Anak Kandung	
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    13.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Alamat 
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['alamat_siswa'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    14.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    No HP
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['no_hp'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    15.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Status Tempat Tinggal
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['status_tinggal_siswa'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    16.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Jarak Ke Sekolah
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['jarak'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    17.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Golongan Darah
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['keb_khusus'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    18.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Riwayat Penyakit
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['keb_disabilitas'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    19.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Asal Sekolah
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['asal_sekolah'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    20.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    NO KIP
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['nama_siswa'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    21.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    NO PKH
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['no_pkh'] ?>		
                    </td>
					
                </tr>
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    22.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    NO KKS/PKS
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    <?= $siswa['no_kks'] ?>		
                    </td>
					
                </tr>
				
				<tr>
                    <td width="1%" valign="top" style='font-size:11.0pt;'>
                    23.
                    </td>
                    <td width="40%" style='font-size:11.0pt;' valign="top">
                    Identitas Orang Tua
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="60%" style='font-size:11.0pt;'>
                    
                    
                    </td>
                </tr>
				
				</table>
				<br>
				<table width="90%" border="1" align="center">
                <thead>
				<tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    <center>Identitas</center>
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    <center>Ayah</center>			
                    </td>
					 <td width="30%" style='font-size:11.0pt;'>
                    <center>Ibu	</center>		
                    </td>
                </tr>
				</thead>
				<tbody>
				<tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    a.  Nama
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    <?= $siswa['nama_ayah'] ?>			
                    </td>
					 <td width="30%" style='font-size:11.0pt;'>
                    <?= $siswa['nama_ibu'] ?>			
                    </td>
                </tr>
				
                <tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    b.  NIK
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['nik_ayah'] ?>	
                    </td>
					<td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['nik_ibu'] ?>	
                    </td>
                </tr>
				 <tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    c.  Tempat Lahir
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['tempat_lahir_ayah'] ?>	
                    </td>
					<td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['tempat_lahir_ibu'] ?>	
                    </td>
                </tr>
				 <tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    d.  Tanggal Lahir
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['tgl_lahir_ayah'] ?>	
                    </td>
					<td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['tgl_lahir_ibu'] ?>	
                    </td>
                </tr>
				 <tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    e.  Pendidikan
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['pendidikan_ayah'] ?>	
                    </td>
					<td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['pendidikan_ibu'] ?>	
                    </td>
                </tr>
				 <tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    f.  Pekerjaan
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['pekerjaan_ayah'] ?>	
                    </td>
					<td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['pekerjaan_ibu'] ?>	
                    </td>
                </tr>
				 <tr>
                   
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    g.  Penghasilan
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['penghasilan_ayah'] ?>	
                    </td>
					<td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['penghasilan_ibu'] ?>	
                    </td>
                </tr>
				<tr>
                    
                    <td width="30%" style='font-size:11.0pt;' valign="top">
                    h.  No Hp
                    </td>
                    </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;'>
                    :
                    </td>
                    <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['no_hp_ayah'] ?>	
                    </td>
					 <td width="30%" style='font-size:11.0pt;'>
                    	<?= $siswa['no_hp_ibu'] ?>	
                    </td>
                </tr>
				</tbody>
				</table>
                	
			<table>				 

               <br>
			   <br>

                <tr>
                    <td colspan="5" width="30%" valign="left" style="font-size:11.0pt;">
                      
                            Ceklis Persyaratan
							
							<li>FC Akte Kelahiran 1 Lembar</li>
							<li>FC Kartu Keluarga 1 Lembar</li>
							<li>FC Kartu KIP/PKH  1 Lembar (bagi yang memiliki)</li>
							<li>Surat Pindah Masuk <b>Hanya Untuk Siswa Pindahan </b></li>
							<li>Surat Mutasi Dapodik<b>Hanya Untuk Siswa Pindahan </b></li>
							<!--<li>Raport Asli <b>Untuk Siswa Baru</b></li>-->
							
							
                                                 
                        
                    </td>
					<td colspan="3" width="10%" valign="bottom">
                       
                        <div  style=" display:inline-block;float: right;width: 27mm;">
                          
                         <?php if ($siswa['foto'] == "") { ?> 
						 <img class="img" src="../../assets/img/avatar/avatar-1.png" ec="H" style="width: 30mm; background-color: white; color: black;">
						 <?php } else { ?>  	
                         <img class="img" src="../../<?= $siswa['foto'] ?>" ec="H" style="width: 30mm; background-color: white; color: black;">
						 <?php } ?>	
                        </div>
                    </td>
                    <td width="30%" valign="top" style='font-size:11.0pt;padding-left: 40px;'>
                    <span style="white-space: nowrap;">
                    <?= $setting['kec'] ?>, </span> <br>
                    <span style="white-space: nowrap;">
                    <!--Kepala Sekolah-->
                    Ketua Panitia
                    </span>	<br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <u style="white-space: nowrap;font-weight: bold;"></u><br>
					
                    <span style="white-space: nowrap;">
                    <!--<?= $setting['kepala'] ?>-->
                    Sartono, S.Pd.I
                    </span>
                    </td>
                </tr>

            </table>



</div> 
</BODY>


</HTML>
