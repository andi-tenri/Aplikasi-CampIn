<?php
 
include('connectioncampin.php');

if ($connect) {
    $nama           = $_POST['nama'];
    $kata_sandi     = $_POST['kata_sandi'];

    $query = "SELECT * FROM admin WHERE nama = '$nama' AND kata_sandi = '$kata_sandi'";
    $result = mysqli_query($connect,$query);
    $response = array();

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        array_push($response, array('status' => 'Berhasil masuk!'));
    } else {
        array_push($response, array('status' => 'Nama atau kata sandi salah!'));
    }
} else {
    array_push($response,array(
        'status' => 'Nama atau kata sandi tidak boleh kosong!'));
}

echo json_encode(array("server_response" => $response));
mysql_close($close);

?>