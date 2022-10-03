 <?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_siswa'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah-pass') {
    $data = [
        'nisn' => $_POST['nisn'],
		'password' => $_POST['password']
       
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}
   if ($pg == 'simpandaftar') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $email = str_replace("'", "`", $_POST['email']);
        $data = [
            'nama_siswa' => $_POST['nama_siswa'],
            'warga_siswa' => $_POST['warga_siswa'],
            'nisn' => $_POST['nisn'],
            'nis' => $_POST['nis'],
            'nik' => $_POST['nik'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tgl_lahir' => $_POST['tgl_lahir'],
            'jk' => $_POST['jk'],
			'asal_sekolah' => $_POST['asal_sekolah'],
            'anak_ke' => $_POST['anak_ke'],
            'saudara' => $_POST['saudara'],
            'agama' => $_POST['agama'],
            'cita' => $_POST['cita'],
            'no_hp' => $_POST['no_hp'],
            'email' => $_POST['email'],
            'hobi' => $_POST['hobi'],
            'status_tinggal_siswa' => $_POST['status_tinggal_siswa'],
            'prov' => $_POST['prov'],
            'kab' => $_POST['kab'],
            'kec' => $_POST['kec'],
            'desa' => $_POST['desa'],
            'alamat_siswa' => $_POST['alamat_siswa'],
            'kordinat' => $_POST['kordinat'],
            'kodepos_siswa' => $_POST['kodepos_siswa'],
            'transportasi' => $_POST['transportasi'],
            'jarak' => $_POST['jarak'],
            'waktu' => $_POST['waktu'],
            'biaya_sekolah' => $_POST['biaya_sekolah'],
            'keb_khusus' => $_POST['keb_khusus'],
            'keb_disabilitas' => $_POST['keb_disabilitas'],
            'tk' => $_POST['tk'],
            'paud' => $_POST['paud'],
            'hepatitis' => $_POST['hepatitis'],
            'polio' => $_POST['polio'],
            'bcg' => $_POST['bcg'],
            'campak' => $_POST['campak'],
            'dpt' => $_POST['dpt'],
            'covid' => $_POST['covid'],
            'no_kip' => $_POST['no_kip'],
            'no_kks' => $_POST['no_kks'],
            'no_pkh' => $_POST['no_pkh'],
            'no_kk' => $_POST['no_kk'],
            'kepala_keluarga' => $_POST['kepala_keluarga']

        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }

    if ($pg == 'dataayah') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $data = [
            'nama_ayah' => $_POST['nama_ayah'],
            'status_ayah' => $_POST['status_ayah'],
            'warga_ayah' => $_POST['warga_ayah'],
            'nik_ayah' => $_POST['nik_ayah'],
            'tempat_lahir_ayah' => $_POST['tempat_lahir_ayah'],
            'tgl_lahir_ayah' => $_POST['tgl_lahir_ayah'],
            'pendidikan_ayah' => $_POST['pendidikan_ayah'],
            'pekerjaan_ayah' => $_POST['pekerjaan_ayah'],
            'penghasilan_ayah' => $_POST['penghasilan_ayah'],
            'no_hp_ayah' => $_POST['no_hp_ayah'],
            'domisili_ayah' => $_POST['domisili_ayah'],
            'status_tmp_tinggal_ayah' => $_POST['status_tmp_tinggal_ayah'],
            'prov_ayah' => $_POST['prov_ayah'],
            'kab_ayah' => $_POST['kab_ayah'],
            'kec_ayah' => $_POST['kec_ayah'],
            'desa_ayah' => $_POST['desa_ayah'],
            'alamat_ayah' => $_POST['alamat_ayah'],
            'kodepos_ayah' => $_POST['kodepos_ayah']


        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }

    if ($pg == 'dataibu') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $data = [
            'nama_ibu' => $_POST['nama_ibu'],
            'status_ibu' => $_POST['status_ibu'],
            'warga_ibu' => $_POST['warga_ibu'],
            'nik_ibu' => $_POST['nik_ibu'],
            'tempat_lahir_ibu' => $_POST['tempat_lahir_ibu'],
            'tgl_lahir_ibu' => $_POST['tgl_lahir_ibu'],
            'pendidikan_ibu' => $_POST['pendidikan_ibu'],
            'pekerjaan_ibu' => $_POST['pekerjaan_ibu'],
            'penghasilan_ibu' => $_POST['penghasilan_ibu'],
            'no_hp_ibu' => $_POST['no_hp_ibu'],
            'status_tinggal_ibu' => $_POST['status_tinggal_ibu'],
            'domisili_ibu' => $_POST['domisili_ibu'],
            'status_tmp_tinggal_ibu' => $_POST['status_tmp_tinggal_ibu'],
            'prov_ibu' => $_POST['prov_ibu'],
            'kab_ibu' => $_POST['kab_ibu'],
            'kec_ibu' => $_POST['kec_ibu'],
            'desa_ibu' => $_POST['desa_ibu'],
            'alamat_ibu' => $_POST['alamat_ibu'],
            'kodepos_ibu' => $_POST['kodepos_ibu']


        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }

    if ($pg == 'datawali') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $data = [
            'nama_wali' => $_POST['nama_wali'],
            'status_wali' => $_POST['status_wali'],
            'warga_wali' => $_POST['warga_wali'],
            'nik_wali' => $_POST['nik_wali'],
            'tempat_lahir_wali' => $_POST['tempat_lahir_wali'],
            'tgl_lahir_wali' => $_POST['tgl_lahir_wali'],
            'pendidikan_wali' => $_POST['pendidikan_wali'],
            'pekerjaan_wali' => $_POST['pekerjaan_wali'],
            'penghasilan_wali' => $_POST['penghasilan_wali'],
            'no_hp_wali' => $_POST['no_hp_wali'],
            'domisili_wali' => $_POST['domisili_wali'],
            'prov_wali' => $_POST['prov_wali'],
            'kab_wali' => $_POST['kab_wali'],
            'kec_wali' => $_POST['kec_wali'],
            'desa_wali' => $_POST['desa_wali'],
            'alamat_wali' => $_POST['alamat_wali'],
            'kodepos_wali' => $_POST['kodepos_wali']


        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }
	if ($pg == 'hapuskk') {

    $data = [
        
		'file_kk' => ''
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);
}
if ($pg == 'foto') {
 
        $ektensi = ['jpg','png','jpeg'];
        if ($_FILES['foto']['name'] <> '') {
            $foto = $_FILES['foto']['name'];
            $temp = $_FILES['foto']['tmp_name'];
            $ext = explode('.', $foto);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = 'assets/upload/foto/foto' . rand(1, 1000) . '.' . $ext;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data2 = [
                        'foto'              => $_POST['foto'],
						'foto' => $dest
                    ];
					 $id_siswa = $_POST['id_siswa'];
					update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
                } else {
                    echo "gagal";
                }
            }
        }
		
		
       
    } else {
        echo "Gagal menyimpan";
    }
if ($pg == 'ubah') {
    
    
		
        $ektensi = ['jpg','jpeg','png','pdf'];
        if ($_FILES['file_kk']['name'] <> '') {
            $file_kk = $_FILES['file_kk']['name'];
            $temp = $_FILES['file_kk']['tmp_name'];
            $ext = explode('.', $file_kk);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = 'assets/upload/kk/kk' . rand(1, 1000) . '.' . $ext;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data = [
                        'file_kk' => $dest
                    ];
                    $id_siswa = $_POST['id_siswa'];
					$exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
                } else {
                    echo "gagal";
                }
            }
        }
		if ($_FILES['file_ijazah']['name'] <> '') {
            $file_ijazah = $_FILES['file_ijazah']['name'];
            $temp = $_FILES['file_ijazah']['tmp_name'];
            $ext = explode('.', $file_ijazah);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = 'assets/upload/ijazah/ijazah' . rand(1, 1000) . '.' . $ext;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data = [
                        'file_ijazah' => $dest
                    ];
                    $id_siswa = $_POST['id_siswa'];
					$exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
                } else {
                    echo "gagal";
                }
            }
        }
		if ($_FILES['file_akte']['name'] <> '') {
            $file_akte = $_FILES['file_akte']['name'];
            $temp = $_FILES['file_akte']['tmp_name'];
            $ext = explode('.', $file_akte);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = 'assets/upload/akta/akta' . rand(1, 1000) . '.' . $ext;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data = [
                        'file_akte' => $dest
                    ];
                    $id_siswa = $_POST['id_siswa'];
					$exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
                } else {
                    echo "gagal";
                }
            }
        }
		if ($_FILES['file_kip']['name'] <> '') {
            $file_kip = $_FILES['file_kip']['name'];
            $temp = $_FILES['file_kip']['tmp_name'];
            $ext = explode('.', $file_kip);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = 'assets/upload/kip/kip' . rand(1, 1000) . '.' . $ext;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data = [
                        'file_kip' => $dest
                    ];
                    $id_siswa = $_POST['id_siswa'];
					$exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
                } else {
                    echo "gagal";
                }
            }
        }
		
        
    } else {
        echo "Gagal menyimpan";
    }
if ($pg == 'batalkk') {

    $data = [
        
		'file_kk' => $_POST['file_kk'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);
   
}
if ($pg == 'hapus_akta') {

    $data = [
        
		'file_akte' => $_POST['file_akte'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);
   
}
if ($pg == 'hapus_ijazah') {

    $data = [
        
		'file_ijazah' => $_POST['file_ijazah'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);
   
}
if ($pg == 'hapus_kip') {

    $data = [
        
		'file_kip' => $_POST['file_kip'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);
   
}