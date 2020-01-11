<?php  
	require_once("connection.php");
	$id =$_POST['id'];
	if ('$hapus') {
		$hasil=mysqli_query($connect, "DELETE FROM fb WHERE id='$id'");
		if ($hasil!=0) {
			header('location: lihat.php');
		}else {
			echo "<script> alert('Proses Gagal!'); location = 'lihat.php'; </script>";
		}

	}
?>