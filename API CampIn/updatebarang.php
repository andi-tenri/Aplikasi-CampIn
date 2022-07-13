<?php
 
include('connectioncampin.php');

$id             = $_POST['id'];
$nama_barang    = $_POST['nama_barang'];
$ruangan        = $_POST['ruangan'];
$lokasi         = $_POST['lokasi'];
$stok           = $_POST['stok'];

date_default_timezone_set('Asia/Makassar');
    $dateImg    = date('YhdHis');
    $web        = "CAMPIN";
    $foto      = $_POST['foto'];
    $foto_name = $web."_".$dateImg.".jpg";
    $photo_loc  = '../image/'.$foto_name;
    file_put_contents($photo_loc, base64_decode($foto));

if (!empty($nama_barang) && !empty($stok)) {
 
    $sql = "UPDATE barang SET nama_barang = '$nama_barang', ruangan =  '$ruangan', lokasi = '$lokasi',  stok = '$stok', foto = '$foto_name' WHERE id = '$id'";
 
    $query = mysqli_query($connect,$sql);
 
    if (mysqli_affected_rows($connect) > 0) {

        $data['status'] = true;
        $data['result'] = "Berhasil";

    } else {

        $data['status'] = false;
        $data['result'] = "Gagal";

    }
 
} else {

    $data['status'] = false;
    $data['result'] = "Gagal, Data tidak boleh kosong!";

}
 
 
print_r(json_encode($data));
 
?>