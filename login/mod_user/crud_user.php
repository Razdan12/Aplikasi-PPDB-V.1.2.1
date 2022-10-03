<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'hapususercheck') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from user where id_user in (" . $kode . ")");
   
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}
if ($pg == 'ubah') {
    
    if ($_POST['password'] <> "") {
        $data = [
            'username'     => $_POST['username'],
            'nama_user'   => $_POST['nama_user'],
			'nik'   => $_POST['nik'],
			'tempat_lahir'   => $_POST['tempat_lahir'],
			'tgl_lahir'   => $_POST['tgl_lahir'],
			'jenkel'   => $_POST['jenkel'],
			'pendidikan'   => $_POST['pendidikan'],
           
			
        ];
    } else {
        $data = [
            'username'     => $_POST['username'],
            'nama_user'   => $_POST['nama_user'],
			'nik'   => $_POST['nik'],
			'tempat_lahir'   => $_POST['tempat_lahir'],
			'tgl_lahir'   => $_POST['tgl_lahir'],
			'jenkel'   => $_POST['jenkel'],
			'pendidikan'   => $_POST['pendidikan'],
            
        ];
    }
    $id_user = $_POST['id_user'];
    $exec = update($koneksi, 'user', $data, ['id_user' => $id_user]);
    echo $exec;
}
if ($pg == 'ubahpengguna') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    if ($_POST['password'] <> "") {
        $data = [
            'username'     => $_POST['username'],
            'nama_user'   => $_POST['nama'],
            'akses'         => $_POST['akses'],
            'password'      => password_hash($_POST['password'], PASSWORD_DEFAULT),
			
            'status'         => 2
        ];
    } else {
        $data = [
            'username'     => $_POST['username'],
            'nama_user'   => $_POST['nama'],
			 'akses'         => $_POST['akses'],
            'status'         => 2
        ];
    }
    $id_user = $_POST['id_user'];
    $exec = update($koneksi, 'user', $data, ['id_user' => $id_user]);
    echo $exec;
}

if ($pg == 'tambah') {
    $data = [
			'username'     => $_POST['username'],
            'nama_user'   => $_POST['nama'],
			'level'   => $_POST['level'],
			'tempat_lahir'   => $_POST['tempat_lahir'],
			'tgl_lahir'   => $_POST['tgl_lahir'],
			'pendidikan'   => $_POST['pendidikan'],
			'status' => 1
    ];
    $exec = insert($koneksi, 'user', $data);
    echo $exec;
}
if ($pg == 'tambahpengguna') {
    $data = [
        'username'     => $_POST['username'],
        'nama_user'   => $_POST['nama'],
        'akses'         => $_POST['akses'],
        'password'      => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'status'         => 2
    ];
    $exec = insert($koneksi, 'user', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_user = $_POST['id_user'];
    delete($koneksi, 'user', ['id_user' => $id_user]);
}
