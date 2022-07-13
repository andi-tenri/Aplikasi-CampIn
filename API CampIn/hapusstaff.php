<?php

	include('connectioncampin.php');

	$id_staff = $_POST['id_staff'];

	if(!empty($id_staff)) {

		$sql = "DELETE FROM kontak WHERE id_staff = '$id_staff'";

		$query = mysqli_query($connect, $sql);

		$data['status'] = true;
		$data['result'] = 'Berhasil';

	} else {

		$data['status'] = false;
		$data['result'] = 'Gagal';
	}

	print_r(json_encode($data));

?>