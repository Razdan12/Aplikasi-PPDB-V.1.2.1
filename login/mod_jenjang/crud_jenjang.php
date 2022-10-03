<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_jenjang' => $_POST['nama'],
        'status' => $status
    ];
    $id_jenjang = $_POST['id_jenjang'];
    update($koneksi, 'jenjang', $data, ['id_jenjang' => $id_jenjang]);
}
if ($pg == 'tambah') {
    $data = [
        'kode'     => $_POST['kode'],
        'nama_jenjang'   => $_POST['nama'],
        'status'         => 1
    ];
    $exec = insert($koneksi, 'jenjang', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_jenjang = $_POST['id_jenjang'];
    delete($koneksi, 'jenjang', ['id_jenjang' => $id_jenjang]);
}
if ($pg == 'tdk') {
    $data2 = [
        'kode'     => $_POST['kode'],
        'id_kelassiswa'   => $_POST['id_kelassiswa'],
		'id_siswa'   => $_POST['id_siswa'],
        'status'         => 1
    ];
    $exec = insert($koneksi, 'kelas', $data,$data2);
    echo $exec;
}
if ($pg == 'kelas') {
    $kode = $_POST['kode'];
	$kelas = $_POST['kelas'];
    $query = mysqli_query($koneksi, "UPDATE siswa SET kelas='$kelas' WHERE id_siswa in (" . $kode . ")");
   
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}

if ($pg == 'kelasku') {
     $for_query = '';
       if(!empty($_POST["kode"])){
        foreach($_POST["kode"] as $kode){
         $for_query .= $kode . ', ';
        }
        $for_query = substr($for_query, 0, -2);
		$kelas = $_POST['kelas'];
		$query = mysqli_query($koneksi, "UPDATE siswa SET kelas='$kelas' WHERE id_siswa in (" . $for_query . ")");
      }
 
    if(mysqli_query($koneksi, $query)){

         echo 1;

        } else {
        echo 0;
    }
   
}
if ($pg == 'siaktif') {
     $for_query = '';
       if(!empty($_POST["kode"])){
        foreach($_POST["kode"] as $kode){
         $for_query .= $kode . ', ';
        }
        $for_query = substr($for_query, 0, -2);
		$status = 1;
		$query = mysqli_query($koneksi, "UPDATE siswa SET status='$status' WHERE id_siswa in (" . $for_query . ")");
      }
 
    if(mysqli_query($koneksi, $query)){

         echo 1;

        } else {
        echo 0;
    }
   
}

if ($pg == 'resetkelas') {
     $for_query = '';
       if(!empty($_POST["kode"])){
        foreach($_POST["kode"] as $kode){
         $for_query .= $kode . ', ';
        }
        $for_query = substr($for_query, 0, -2);
		$kelas = null;
		$query = mysqli_query($koneksi, "UPDATE siswa SET kelas='$kelas' WHERE id_siswa in (" . $for_query . ")");
      }
 
    if(mysqli_query($koneksi, $query)){

         echo 1;

        } else {
        echo 0;
    }
   
}