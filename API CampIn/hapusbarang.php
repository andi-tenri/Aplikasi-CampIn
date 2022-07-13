<?php

	include('connectioncampin.php');

	$nama_barang = $_POST['nama_barang'];

	if(!empty($nama_barang)) {

		$sql = "DELETE FROM barang WHERE nama_barang = '$nama_barang'";

		$query = mysqli_query($connect, $sql);

		$data['status'] = true;
		$data['result'] = 'Berhasil';

	} else {

		$data['status'] = false;
		$data['result'] = 'Gagal';
	}

	print_r(json_encode($data));

?>