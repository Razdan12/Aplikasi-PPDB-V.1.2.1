<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$hariini = date('Y-m-d');
$tahun1 = date('Y');
$tahun2 = date('Y')+1;


?>
<?php if (isset($_GET['id']) == '') { ?>

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
    <title>Buku Induk siswa</title>
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

<table width="35%" align="center" border="0">
    <tr>
        <td>

            <br>
            <div align="center" class="style13">
                    <b>BUKU INDUK SISWA</b>
            </div>
            <br>
			
            <br>
        </td>
    </tr>
    </table>
            <table width="100%" border="0">
                <?php
                            $query = mysqli_query($koneksi, "select * from siswa where status='1'");
                            
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
								
                                $tgl_lahirsiswa = $siswa['tgl_lahir'];
								$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
                                $no++;
                            ?>
                <tr>
                    
					<td colspan="3" width="15%" valign="top">
                        <?php if ($siswa['foto'] == null) { ?> 
						
                        <div  style=" border: 2px solid black;width: 30mm;height: 40mm;text-align: center;"><span><br><br><br>Foto<br>3x4</div>
                       
						<?php } else { ?> 
						<img class="img" src="../../<?= $siswa['foto'] ?>" ec="H" style="width: 30mm; background-color: white; color: black;">
						<?php } ?>
                    </td>
					
                    <td width="100%" valign="top" style='font-size:11.0pt;padding-left: 40px;'>
                    <table width="100%" border="0">
                        <tr>
                            <td width="30%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nama </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="77%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_siswa'] ?> </td>
                        </tr>
                        <tr>
                            <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nis Lokal </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nis'] ?> </td>
                        </tr>
                        <tr>
                            <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> NISN </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nisn'] ?> </td>
                        </tr>
                        <tr>
                            <td width="10%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> TTL</td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['tempat_lahir'] ?>,<?php echo tgl_indo("$tgl_lahirsiswa");?> </td>
                        </tr>
                        <tr>
                            <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nama Ayah </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_ayah'] ?> </td>
                        </tr>
                        <tr>
                        <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nama Ibu </td>
                        <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                        <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_ibu'] ?> </td>
                        </tr>
                        <tr>
                        <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Asal Sekolah </td>
                        <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                        <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['asal_sekolah'] ?> </td>
                        </tr>
                        
                    </table>
                    <hr>
                </tr>
                
<?php } ?>
            </table>



</div> 
</BODY>


</HTML>


<?php } else { ?>
<?php $jenjang = fetch($koneksi, 'jenjang', ['id_jenjang' => dekripsi($_GET['id'])]) ?>

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
    <title>Buku induk siswa kelas <?= $jenjang['kode'] ?>-<?= $jenjang['nama_jenjang'] ?></title>
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

<table width="35%" align="center" border="0">
    <tr>
        <td>

            <br>
            <div align="center" class="style13">
                    <b>BUKU INDUK SISWA</b>
            </div>
            <br>
			
            <br>
        </td>
    </tr>
    </table>
            <table width="100%" border="0">
                <?php
                            $query = mysqli_query($koneksi, "select * from siswa where kelas='$jenjang[id_jenjang]'");
                            
                            $no = 0;
                            while ($siswa = mysqli_fetch_array($query)) {
								
                                $tgl_lahirsiswa = $siswa['tgl_lahir'];
								$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
                                $no++;
                            ?>
                <tr>
                    
					<td colspan="3" width="15%" valign="top">
                        <?php if ($siswa['foto'] == null) { ?> 
						
                        <div  style=" border: 2px solid black;width: 30mm;height: 40mm;text-align: center;"><span><br><br><br>Foto<br>3x4</div>
                       
						<?php } else { ?> 
						<img class="img" src="../../<?= $siswa['foto'] ?>" ec="H" style="width: 30mm; background-color: white; color: black;">
						<?php } ?>
                    </td>
					
                    <td width="100%" valign="top" style='font-size:11.0pt;padding-left: 40px;'>
                    <table width="100%" border="0">
                        <tr>
                            <td width="30%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nama </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="77%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_siswa'] ?> </td>
                        </tr>
                        <tr>
                            <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nis Lokal </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nis'] ?> </td>
                        </tr>
                        <tr>
                            <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> NISN </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nisn'] ?> </td>
                        </tr>
                        <tr>
                            <td width="10%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> TTL</td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['tempat_lahir'] ?>,<?php echo tgl_indo("$tgl_lahirsiswa");?> </td>
                        </tr>
                        <tr>
                            <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nama Ayah </td>
                            <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                            <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_ayah'] ?> </td>
                        </tr>
                        <tr>
                        <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Nama Ibu </td>
                        <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                        <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['nama_ibu'] ?> </td>
                        </tr>
                        <tr>
                        <td width="20%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> Asal Sekolah </td>
                        <td width="1%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> : </td>
                        <td width="75%" valign="top" style='font-size:11.0pt;padding-left: 40px;'> <?= $siswa['asal_sekolah'] ?> </td>
                        </tr>
                        
                    </table>
                    <hr>
                </tr>
                
<?php } ?>
            </table>



</div> 
</BODY>


</HTML>
<?php } ?>