<?php 
	
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credential: true");
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrt-token");
	header("Content-Type: application/json; charset=utf-8");

	include "config.php";

	$postjson = json_decode(file_get_contents('php://input'),true);

	// $today = date('Y-m-d H:i:s');

	if ($postjson['aksi']=="proses_register") {
		$password = md5($postjson['password']);

		$insert = mysqli_query($mysqli, "INSERT INTO tbl_user SET
			id_user = '',
			nama_user = '$postjson[nama_user]',
			username = '$postjson[username]',
			password = '$password',
			gender = '$postjson[gender]',
			email = '$postjson[email]',
			phone = '',
			alamat = '',
			tgl_lahir = '',
			tmpt_lahir = ''
		");

		if ($insert) {
			$result = json_encode(array('success'=>true, 'msg'=>'Register Success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'Register Error'));
		}

		echo $result;
	}
?>