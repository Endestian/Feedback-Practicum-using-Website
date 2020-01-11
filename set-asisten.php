<?php  
	require_once("connection.php");
	$nama =$_POST['nama'];
	$kode =$_POST['kodeasisten'];
	$telp =$_POST['notelepon'];
	$email =$_POST['email'];

	$upperkode = preg_match('@[A-Z]@', $kode);
	$lowerkode = preg_match('@[a-z]@', $kode);
	$numberkode= preg_match('@[0-9]@', $kode);
	$lowercase = preg_match('@[a-z]@', $pass);
	$number    = preg_match('@[0-9]@', $telp);

	$cekkode = mysqli_query($connect, "SELECT * FROM asisten WHERE kode_asisten = '$kode'");
	$cekemail = mysqli_query($connect, "SELECT * FROM asisten WHERE email = '$email'");
	if (mysqli_num_rows($cekkode) <> 0) {
		echo "<script> alert('Kode Asisten sudah terdaftar'); location = 'setting.php'; </script>";
	}elseif (mysqli_num_rows($cekemail) <> 0) {
		echo "<script> alert('email sudah terdaftar'); location = 'setting.php'; </script>";
	}elseif (!$nama || !$kode || !$telp || !$email) {
		echo "<script> alert('Masih ada data kosong'); location = 'setting.php'; </script>";
	}elseif (!$upperkode || $lowerkode || $numberkode || strlen($kode)<>3) {
		echo "<script> alert('Kode harus terdiri dari 3 Character kapital'); location = 'setting.php'; </script>";
	}elseif (!$number) {
		echo "<script> alert('no telpon harus angka'); location = 'setting.php'; </script>";
	}else{
		$tambah = mysqli_query($connect, "INSERT INTO asisten(nama_asisten, kode_asisten, no_telp, email) VALUES('$nama','$kode', '$telp', '$email')");

		if($tambah) {
				header('location: setting.php');
			} else {
				echo "<script> alert('Proses Gagal!'); location = 'setting.php'; </script>";
			}
	}

	
?>