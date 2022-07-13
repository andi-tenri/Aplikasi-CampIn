<?php
 
include('connectioncampin.php');

$nama_lengkap   = $_POST['nama_lengkap'];
$nama_pengguna  = $_POST['nama_pengguna'];
$nim            = $_POST['nim'];
$nohp           = $_POST['nohp'];
$email          = $_POST['email'];
$kata_sandi     = $_POST['kata_sandi'];
$role           = $_POST['role'];

date_default_timezone_set('Asia/Makassar');
    $dateImg    = date('YhdHis');
    $web        = "CAMPIN";
    $foto      = $_POST['foto'];
    $foto_name = $web."_".$dateImg.".jpg";
    $photo_loc  = '../image/'.$foto_name;
    file_put_contents($photo_loc, base64_decode($foto));

if (!empty($nama_lengkap) && !empty($nim)) {
 
    $sql = "UPDATE user SET nama_lengkap = '$nama_lengkap', nama_pengguna =  '$nama_pengguna', nim = '$nim', nohp = '$nohp', email = '$email', 
    kata_sandi = '$kata_sandi', role = '$role', foto = '$foto_name' WHERE id = '$id'";
 
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
    $data['result'] = "Gagal, NIM  dan Nama tidak boleh kosong!";

}
 
 
print_r(json_encode($data));
 
?>