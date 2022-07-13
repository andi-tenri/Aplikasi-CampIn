<?php

    include('connectioncampin.php');
        

        $nama_lengkap   = $_POST['nama_lengkap'];
        $nama_pengguna  = $_POST['nama_pengguna'];
        $nim            = $_POST['nim'];
        $nohp           = $_POST['nohp'];
        $email          = $_POST['email'];
        $kata_sandi     = $_POST['kata_sandi'];

        // for photo
        // date_default_timezone_set('Asia/Makassar');
        // $dateImg    = date('YhdHis');
        // $web        = "CAMPIN";
        // $foto       = $_POST['foto'];
        // $foto_name  = $web."_".$dateImg.".jpg";

        // $photo_loc  = '../image/'.$foto_name;
        // file_put_contents($photo_loc, base64_decode($foto));

    if (!empty($nama_pengguna) && !empty($nim)) {
        $sqlCheck = "SELECT COUNT(*) FROM user WHERE nim = '$nim'";
        $queryCheck = mysqli_query($connect, $sqlCheck);
        $hasilCheck = mysqli_fetch_array($queryCheck);

        if ($hasilCheck[0] == 0) {

            $sql = "INSERT INTO user (nama_lengkap, nama_pengguna, nim, nohp, email, kata_sandi) VALUES('$nama_lengkap', '$nama_pengguna','$nim','$nohp','$email','$kata_sandi')";
            $query = mysqli_query($connect, $sql);

            if (mysqli_affected_rows($connect) > 0) {

                $data['status'] = true;
                $data['result'] = "Berhasil membuat akun baru";

            } else {

                $data['status'] = false;
                $data['result'] = "Gagal";
            }

        } else {

            $data['status'] = false;
            $data['result'] = "Gagal, Data sudah ada!";

        }

    } else {

        $data['status'] = false;
        $data['result'] = "Gagal, Nama dan NIM tak boleh kosong!";

    }

    print_r(json_encode($data));

?>