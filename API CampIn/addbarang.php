<?php

    include('connectioncampin.php');
        

        $nama_barang    = $_POST['nama_barang'];
        $ruangan        = $_POST['ruangan'];
        $lokasi         = $_POST['lokasi'];
        $stok           = $_POST['stok'];

        // for photo
        date_default_timezone_set('Asia/Makassar');
        $dateImg    = date('YhdHis');
        $web        = "CAMPIN";
        $foto       = $_POST['foto'];
        $foto_name  = $web."_".$dateImg.".jpg";

        $photo_loc  = '../image/'.$foto_name;
        file_put_contents($photo_loc, base64_decode($foto));

    if (!empty($nama_barang) && !empty($stok)) {
        $sqlCheck = "SELECT COUNT(*) FROM barang WHERE nama_barang = '$nama_barang'";
        $queryCheck = mysqli_query($connect, $sqlCheck);
        $hasilCheck = mysqli_fetch_array($queryCheck);

        if ($hasilCheck[0] == 0) {

            $sql = "INSERT INTO barang (nama_barang, ruangan, lokasi, stok, foto) VALUES('$nama_barang', '$ruangan','$lokasi','$stok', '$foto_name')";
            $query = mysqli_query($connect, $sql);

            if (mysqli_affected_rows($connect) > 0) {

                $data['status'] = true;
                $data['result'] = "Berhasil menambahkan barang";

            } else {

                $data['status'] = false;
                $data['result'] = "Gagal";
            }

        } else {

            $data['status'] = false;
            $data['result'] = "Gagal, Barang sudah ada!";

        }

    } else {

        $data['status'] = false;
        $data['result'] = "Gagal, Kolom tidak boleh kosong!";

    }

    print_r(json_encode($data));

?>