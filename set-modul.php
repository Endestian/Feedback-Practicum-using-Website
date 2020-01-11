<?php  
	require_once("connection.php");
	$judul =$_POST['judul'];
	$nomor =$_POST['nomor'];

	$ceknomor = mysqli_query($connect, "SELECT * FROM modul WHERE id = '$nomor'");
	if (mysqli_num_rows($ceknomor) <> 0) {
		echo "<script> alert('nomor modul sudah ada'); location = 'setting.php'; </script>";
	}else{
		$updatejudul = mysqli_query($connect, "INSERT INTO modul(id,judul) VALUES('$nomor','$judul')");
	}

	if($updatejudul) {
			header('location: setting.php');
		} else {
			echo "<script> alert('Proses Gagal!'); location = 'setting.php'; </script>";
		}
?>