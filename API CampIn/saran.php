<?php

    require_once('connectioncampin.php');      

        $nama   = $_POST['nama'];
        $nim  = $_POST['nim'];
        $saran  = $_POST['saran'];


    if (!empty($nama) && !empty($nim) && !empty($saran)) {
        $sqlCheck = "SELECT COUNT(*) FROM saran WHERE nama = '$nama'";
        $queryCheck = mysqli_query($connect, $sqlCheck);
        $hasilCheck = mysqli_fetch_array($queryCheck);

        if ($hasilCheck[0] == 0) {

            $sql = "INSERT INTO saran (nama, nim, saran) VALUES('$nama', '$nim', '$saran')";
            $query = mysqli_query($connect, $sql);

            if (mysqli_affected_rows($connect) > 0) {

                $data['status'] = true;
                $data['result'] = "Berhasil mengirim saran anda";

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
        $data['result'] = "Gagal, Data tidak boleh ada yang kosong!";

    }

    print_r(json_encode($data));

?>