<?php

    include('connectioncampin.php');
        

        $nama       = $_POST['nama'];
        $id_staff   = $_POST['id_staff'];
        $no_hp      = $_POST['no_hp'];;

        // for photo
        date_default_timezone_set('Asia/Makassar');
        $dateImg    = date('YhdHis');
        $web        = "CAMPIN";
        $foto       = $_POST['foto'];
        $foto_name  = $web."_".$dateImg.".jpg";

        $photo_loc  = '../image/'.$foto_name;
        file_put_contents($photo_loc, base64_decode($foto));

    if (!empty($id_staff) && !empty($no_hp)) {
        $sqlCheck = "SELECT COUNT(*) FROM kontak WHERE id_staff = '$id_staff'";
        $queryCheck = mysqli_query($connect, $sqlCheck);
        $hasilCheck = mysqli_fetch_array($queryCheck);

        if ($hasilCheck[0] == 0) {

            $sql = "INSERT INTO kontak (nama, id_staff, no_hp, foto) VALUES('$nama', '$id_staff','$no_hp','$foto_name')";
            $query = mysqli_query($connect, $sql);

            if (mysqli_affected_rows($connect) > 0) {

                $data['status'] = true;
                $data['result'] = "Berhasil membuat Kontak";

            } else {

                $data['status'] = false;
                $data['result'] = "Gagal";
            }

        } else {

            $data['status'] = false;
            $data['result'] = "Gagal, Kontak sudah ada!";

        }

    } else {

        $data['status'] = false;
        $data['result'] = "Gagal, ID Staff dan No Handphone tidak boleh kosong!";

    }

    print_r(json_encode($data));

?>