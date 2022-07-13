<?php
 
include('connectioncampin.php');

$id         = $_POST['id'];
$id_staff   = $_POST['id_staff'];
$nama       = $_POST['nama'];
$no_hp      = $_POST['no_hp'];

date_default_timezone_set('Asia/Makassar');
    $dateImg    = date('YhdHis');
    $web        = "CAMPIN";
    $foto      = $_POST['foto'];
    $foto_name = $web."_".$dateImg.".jpg";
    $photo_loc  = '../image/'.$foto_name;
    file_put_contents($photo_loc, base64_decode($foto));

if (!empty($id_staff) && !empty($no_hp)) {
 
    $sql = "UPDATE kontak SET id_staff = '$id_staff', nama =  '$nama', no_hp = '$no_hp', foto = '$foto_name' WHERE id = '$id'";
 
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