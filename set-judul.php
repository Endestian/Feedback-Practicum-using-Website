<?php  
	require_once("connection.php");
	$judul =$_POST['judul'];
	$updatejudul = mysqli_query($connect, "UPDATE judul SET id='1', judul='$judul'");

	if($updatejudul) {
			echo "<script> alert('data telah di update'); location = 'setting.php'; </script>";
		} else {
			echo "<script> alert('Proses Gagal!'); location = 'setting.php'; </script>";
		}
?>