<?php

	include('connectioncampin.php');

	$nama_lengkap = $_POST['nama_lengkap'];

	if(!empty($nama_lengkap)) {

		$sql = "DELETE FROM user WHERE nama_lengkap = '$nama_lengkap' ";

		$query = mysqli_query($connect, $sql);

		$data['status'] = true;
		$data['result'] = 'Berhasil';

	} else {

		$data['status'] = false;
		$data['result'] = 'Gagal';
	}

	print_r(json_encode($data));

?>