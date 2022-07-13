<?php

    include('connectioncampin.php');
        

        $nama           = $_POST['nama'];
        $nim            = $_POST['nim'];
        $nama_barang    = $_POST['nama_barang'];
        $ruangan        = $_POST['ruangan'];
        $lokasi         = $_POST['lokasi'];
        $jumlah         = $_POST['jumlah'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];

        // for photo
        date_default_timezone_set('Asia/Makassar');
        $dateImg    = date('YhdHis');
        $web        = "CAMPIN";
        $foto       = $_POST['foto'];
        $foto_name  = $web."_".$dateImg.".jpg";

        $photo_loc  = '../image/'.$foto_name;
        file_put_contents($photo_loc, base64_decode($foto));

    if (!empty($nama) && !empty($jumlah)) {
        $sqlCheck = "SELECT COUNT(*) FROM pengembalian WHERE tgl_peminjaman = '$tgl_peminjaman'";
        $queryCheck = mysqli_query($connect, $sqlCheck);
        $hasilCheck = mysqli_fetch_array($queryCheck);

        if ($hasilCheck[0] == 0) {

            $sql = "INSERT INTO pengembalian (nama, nim, nama_barang, ruangan, lokasi, jumlah, tgl_peminjaman, foto) VALUES('$nama','$nim','$nama_barang', '$ruangan','$lokasi','$jumlah', '$tgl_peminjaman', '$foto_name')";
            $query = mysqli_query($connect, $sql);

            if (mysqli_affected_rows($connect) > 0) {

                $data['status'] = true;
                $data['result'] = "Berhasil meminjam barang";

            } else {

                $data['status'] = false;
                $data['result'] = "Gagal";
            }

        } else {

            $data['status'] = false;
            $data['result'] = "Gagal, Barang gagal dikembalikan!";

        }

    } else {

        $data['status'] = false;
        $data['result'] = "Gagal, Kolom tidak boleh kosong!";

    }

    print_r(json_encode($data));

?>