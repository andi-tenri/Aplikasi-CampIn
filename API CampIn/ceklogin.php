<?php
 
include('connectioncampin.php');

if ($connect) {
    $nama_pengguna    = $_POST['nama_pengguna'];
    $kata_sandi    = $_POST['kata_sandi'];

    $query = "SELECT * FROM user WHERE nama_pengguna = '$nama_pengguna' AND kata_sandi = '$kata_sandi'";
    $result = mysqli_query($connect,$query);
    $response = array();

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        array_push($response, array('status' => 'Berhasil masuk!'));
    } else {
        array_push($response, array('status' => 'Nama pengguna atau kata sandi salah!'));
    }
} else {
    array_push($response,array(
        'status' => 'Gagal'));
}

echo json_encode(array("server_response" => $response));
mysql_close($close);

?>