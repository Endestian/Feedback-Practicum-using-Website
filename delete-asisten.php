<?php  
	require_once("connection.php");
	$id =$_POST['id'];
	if ('$hapus') {
		$hasil=mysqli_query($connect, "DELETE FROM asisten WHERE id='$id'");
		if ($hasil!=0) {
			header('location: setting.php');
		}else {
			echo "<script> alert('Proses Gagal!'); location = 'setting.php'; </script>";
		}

	}
?>