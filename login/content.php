<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'df_ulang') {
    include "mod_daftar/daftarulang.php";
} elseif ($pg == 'daftar') {
    include "mod_daftar/daftar.php";
    
} elseif ($pg == 'daftar1') {
    include "mod_daftar/daftar1.php";
    
} elseif ($pg == 'datasiswa') {
    include "mod_siswa/daftar2.php";
    
} elseif ($pg == 'berkas_siswa') {
    include "mod_siswa/daftar_berkas.php";     //modul berkas SISWA     
    
} elseif ($pg == 'cetak_data') {
    include "mod_siswa/cetak_data.php";
} elseif ($pg == 'berkas_ppdb') {
    include "mod_daftar/daftar_berkas.php";
} elseif ($pg == 'l_ppdbyes') {
    include "mod_laporan/laporanyes.php";
} elseif ($pg == 'move') {
    include "mod_daftar/move.php";
} elseif ($pg == 'ubahsiswa') {
    include "mod_siswa/formulir.php";
} elseif ($pg == 'bukuinduk') {
    include "mod_siswa/bukuinduk.php";
} elseif ($pg == 'ubahkelas') {
    include "mod_jenjang/ubahkelas.php";
} elseif ($pg == 'ubahdaftar') {
    include "mod_daftar/formulir.php";
} elseif ($pg == 'profil_lembaga') {
    include "mod_setting/profil_lembaga.php";
} elseif ($pg == 'detail') {
    include "mod_daftar/detail.php";  //Modul Detail Pendaftaran
} elseif ($pg == 'detailsiswa') {
    include "mod_siswa/detail.php";  //Modul Detail Pendaftaran
} elseif ($pg == 'diterima') {
    include "mod_daftar/daftar_diterima.php";  //modul pendaftar diterima
} elseif ($pg == 'pending') {
    include "mod_daftar/daftar_pending.php";  //modul pendaftar diterima
} elseif ($pg == 'ditolak') {
    include "mod_daftar/daftar_ditolak.php";  //modul pendaftar ditolak / cadangan
} elseif ($pg == 'siswa') {
    include "mod_siswa/daftar.php";
} elseif ($pg == 'ubah_kelas') {
    include "mod_siswa/ubah_kelas.php";
} elseif ($pg == 'akunppdb') {
    include "mod_laporan/kartu.php";
} elseif ($pg == 'masuk') {
    include "mod_siswa/mutasi_masuk.php";

} elseif ($pg == 'update') {
    include "mod_update/update.php";

} elseif ($pg == 'backup') {
    include "backup_restore/backup-data.php";
} elseif ($pg == 'restore') {
    include "backup_restore/restore.php";
} elseif ($pg == 'pindah') {
    include "mod_siswa/mutasi_keluar.php";
} elseif ($pg == 'rekapsiswa') {
    include "mod_siswa/ringkasan.php";
} elseif ($pg == 'luluskan') {
    include "mod_siswa/luluskan.php";
} elseif ($pg == 'alumni') {
    include "mod_siswa/alumni.php";
} elseif ($pg == 'detail_siswa') {
    include "mod_siswa/detail.php";  //Modul Detail Pendaftaran
} elseif ($pg == 'sekolah') {
    include "mod_sekolah/sekolah.php";
} elseif ($pg == 'ppdb') {
    include "mod_daftar/home.php";
} elseif ($pg == 'rombel') {    
    include "mod_jenjang/rombel.php";
} elseif ($pg == 'kelas') {    
    include "mod_jenjang/kelas.php";
} elseif ($pg == 'jurusan') {
    include "mod_jurusan/jurusan.php";
} elseif ($pg == 'jenis') {
    include "mod_jenis/jenis.php";
} elseif ($pg == 'biaya') {
    include "mod_setting/s_ppdb.php";

} elseif ($pg == 'bayar') {
    include "mod_bayar/bayar.php";
} elseif ($pg == 'user-profile') {
    include "mod_user/user-profile.php";
 //Cetak Data
 } elseif ($pg == 'kartuujian') {
    include "mod_kartu/kartuujian.php";
  } elseif ($pg == 'kartupelajar') {
    include "mod_kartu/kartupelajar.php";
 
} elseif ($pg == 'pengumuman') {
    include "mod_pengumuman/pengumuman.php";
} elseif ($pg == 'guru') {
    include "mod_user/user.php";
    
} elseif ($pg == 'pengguna') {
    include "mod_user/pengguna.php";
    
} elseif ($pg == 'edituser') {
    include "mod_user/useredit.php";
} elseif ($pg == 'edit_pengguna') {
    include "mod_user/edit_pengguna.php";
} elseif ($pg == 'usersiswa') {
    
    include "mod_user/usersiswa.php";
} elseif ($pg == 'setting') {
    
    include "mod_setting/setting.php";
} elseif ($pg == 'setting2') {
    
    include "mod_setting/setting2.php";
} elseif ($pg == 's_ppdb') {
    include "mod_setting/s_ppdb.php";
} elseif ($pg == 'kontak') {
    
    include "mod_kontak/kontak.php";
} elseif ($pg == 'infobayar') {
    
    include "mod_web/pembayaran.php";
} elseif ($pg == 'syarat') {
    
    include "mod_web/syarat.php";


} elseif ($pg == 'tema') {
    include "mod_web/tema.php";
} elseif ($pg == 'slider') {
    include "mod_web/slider.php";
} elseif ($pg == 'post') {
    include "mod_web/postingan.php";
} elseif ($pg == 'tambahpost') {
    include "mod_web/tambahpost.php";
} elseif ($pg == 'ubahpost') {
    include "mod_web/ubahpost.php";
} elseif ($pg == 'kategori') {
    include "mod_web/kategori.php";
} elseif ($pg == 'surat') {
    include "mod_surat/surat.php";
} elseif ($pg == 'file') {
    include "../assets/upload/print.php";
} else {
include "error_page.php";
}
