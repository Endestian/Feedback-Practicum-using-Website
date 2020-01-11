<?php 
require_once("connection.php");
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$praktikum = $_POST['praktikum'];
$asisten = $_POST['asisten'];
$lab = $_POST['lab'];

if(isset($_POST['submit'])){
	if (isset($_POST['kodeasisten'])) {
		if (isset($_POST['modul'])) {
			$modul = $_POST['modul'];
			$kasisten=$_POST['kodeasisten'];
			$simpan = mysqli_query($connect, "INSERT INTO fb(nama, nim, kode_asisten, modul, saran_asisten, saran_praktikum,saran_lab) VALUES('$nama','$nim','$kasisten','$modul','$asisten','$praktikum','$lab')");
		}
	}
}
if($simpan) {
	 echo "<script> alert('Terikasih Telah mengisi Feedback Praktikum'); location = 'index.php'; </script>";
} else {
echo "Proses Gagal!";
}
?>