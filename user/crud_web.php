<?php
require "../config/database.php";
require "../config/function.php";
require "../config/functions.crud.php";
session_start();



if ($pg == 'simpan') {
    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['kodepengaman']) == false) {
        $pesan = [
            'pesan' => 'KODE CAPTCHA SALAH'
        ];
        echo json_encode($pesan);
    } else {
        
        $query = "SELECT max(no_daftar) as maxKode FROM siswa";
        $hasil = mysqli_query($koneksi, $query);
        $data  = mysqli_fetch_array($hasil);
        $kodedaftar = $data['maxKode'];
        $noUrut = (int) substr($kodedaftar, 8, 3);
        $noUrut++;
        $char = "PPDB" . date('Y');
        $newID = $char . sprintf("%03s", $noUrut);
        $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama_siswa'])));
        $data = [
            'no_daftar' => $newID,
            'jenis' => $_POST['jenis'],
			'asal_sekolah' => $_POST['asal_sekolah'],
			'jurusan' => $_POST['jurusan'],
            'nisn' => $_POST['nisn'],
            'nama_siswa' => $nama,
            'no_hp' => $_POST['nohp'],
            'tempat_lahir' => ucwords($_POST['tempat']),
            'tgl_lahir' => $_POST['tgllahir'],
            'password' => $_POST['password'],
            'status' => 0
			
        ];

$cek = rowcount($koneksi, 'siswa', ['nisn' => $_POST['nisn']]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'siswa', $data);
            $namapendek = explode(" ", $nama);
            $pesan = [
                'pesan' => 'ok',
                'id' => $newID,
				'nisn' => $_POST['nisn'],
                'pass' => $_POST['password'],
                'nama' => $namapendek[0]
            ];



echo json_encode($pesan);
        } else {
            $pesan = [
                'pesan' => 'Nisn sudah terdaftar'
            ];
            echo json_encode($pesan);
        }
    }
}
if ($pg == 'simpan2') {
    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['kodepengaman']) == false) {
        $pesan = [
            'pesan' => 'KODE CAPTCHA SALAH'
        ];
        echo json_encode($pesan);
    } else {
        
        $query = "SELECT max(no_daftar) as maxKode FROM siswa";
        $hasil = mysqli_query($koneksi, $query);
        $data  = mysqli_fetch_array($hasil);
        $kodedaftar = $data['maxKode'];
        $noUrut = (int) substr($kodedaftar, 8, 3);
        $noUrut++;
        $char = "PPDB" . date('Y');
        $newID = $char . sprintf("%03s", $noUrut);
        $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama_siswa'])));
        $data = [
            'no_daftar' => $newID,
            'jenis' => $_POST['jenis'],
			'asal_sekolah' => $_POST['asal_sekolah'],
            'nisn' => $_POST['nisn'],
            'nama_siswa' => $nama,
            'no_hp' => $_POST['nohp'],
            'tempat_lahir' => ucwords($_POST['tempat']),
            'tgl_lahir' => $_POST['tgllahir'],
            'password' => $_POST['password'],
            'status' => 0
			
        ];

$cek = rowcount($koneksi, 'siswa', ['nisn' => $_POST['nisn']]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'siswa', $data);
            $namapendek = explode(" ", $nama);
            $pesan = [
                'pesan' => 'ok',
                'id' => $newID,
				'nisn' => $_POST['nisn'],
                'pass' => $_POST['password'],
                'nama' => $namapendek[0]
            ];



echo json_encode($pesan);
        } else {
            $pesan = [
                'pesan' => 'Nisn sudah terdaftar'
            ];
            echo json_encode($pesan);
        }
    }
}
if ($pg == 'login') {
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa WHERE jenis in (1,2) and nisn='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Maaf .. NISN Anda Belum Terdaftar!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);
            //$ceklogin=mysqli_num_rows(mysqli_query($koneksi, "select * from login where id_siswa='$siswa[id_siswa]'"));

            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                //if($ceklogin==0){
                $_SESSION['id_siswa'] = $siswa['id_siswa'];
               
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
    }
if ($pg == 'login2') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_siswa='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Anda belum terdaftar silahkan Hubungi Operator Sekolah!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);
            //$ceklogin=mysqli_num_rows(mysqli_query($koneksi, "select * from login where id_siswa='$siswa[id_siswa]'"));

            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                //if($ceklogin==0){
                $_SESSION['id_siswa'] = $siswa['id_siswa'];
                mysqli_query($koneksi, "UPDATE siswa set online='1' where id_siswa='$siswa[id_siswa]'");
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
}
