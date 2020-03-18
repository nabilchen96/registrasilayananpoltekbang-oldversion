<?php 

$koneksi = mysqli_connect("localhost", "root", "", "layanan");

//variabel nim yang dikirimkan form.php
$idlayanan = $_GET['idlayanan'];

//mengambil data
$query = mysqli_query($koneksi, "select * from layanans join kapasitas on layanans.idlayanan = kapasitas.idkapasitas where layanans.idlayanan='$idlayanan'");
$mahasiswa = mysqli_fetch_array($query);


$kapasitas = mysqli_query($koneksi, "select * from kapasitas where idlayanan = '$idlayanan'");

$datase = [];
while($datas = mysqli_fetch_assoc($kapasitas)){
    $datase[] = $datas;
}

$data = array(
            'deskripsi'         =>  $mahasiswa['deskripsi'],
            'kategoriseleksi'   =>  $mahasiswa['kategoriseleksi'],
            'tarifpendaftaran'  =>  $mahasiswa['tarifpendaftaran'],
            'tarifseleksi'      =>  $mahasiswa['tarifseleksi'],
            'tarifdaftarulang'  =>  $mahasiswa['tarifdaftarulang'],
            'kapasitas'         =>  $datase
            
);
//tampil data
echo json_encode($data);


?>