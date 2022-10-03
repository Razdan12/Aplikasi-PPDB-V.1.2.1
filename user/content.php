<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'df_ulang') {
    include "content/daftarulang.php";
} elseif ($pg == 'formulir') {
    include "content/formulir.php";
} elseif ($pg == 'berkas') {
    include "content/berkas.php";
} elseif ($pg == 'bayar') {
    include "content/bayar.php";
} elseif ($pg == 'surat') {
    include "mod_surat/surat.php";
} else {
include "../login/error_page.php";
}

