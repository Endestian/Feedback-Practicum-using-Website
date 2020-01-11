<?php 
require_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link href="img/xs_logo.png" rel="shortcut icon">
<title>FEEDBACK PRAKTIKUM SEA </title>
</head>
<body>
	<header>
		
	</header>
	<section>
		<div class="table-resposnive container">
			<table id="resultsTable" class="table table-striped" cellspacing="0">
				<thead>
					<tr>
						<th>NIM</th>
						<th>NAMA</th>
						<th>MODUL</th>
						<th>KODE ASISTEN</th>
						<th>ASISTEN</th>
						<th>PRAKTIKUM</th>
						<th>LABORATORIUM</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = "SELECT * FROM fb";
						$hasil= mysqli_query($connect, $query);
						if(!$hasil){
							die ('SQL Error: ' . mysqli_error($connect));
						}
						while($data=mysqli_fetch_array($hasil)){
							echo "
								<form method='post' action='delete-fb.php'>
								<tr>
									<td>".$data['nim']."</td>
									<td>".$data['nama']."</td>
									<td>".$data['modul']."</td>
									<td>".$data['kode_asisten']."</td>
									<td>".$data['saran_asisten']."</td>
									<td>".$data['saran_praktikum']."</td>
									<td>".$data['saran_lab']."</td>
									<td><input type='submit' name='hapus' value='delete' >
										<input type='hidden' name='id' value='".$data['id']."' ></td>
								</tr>
								</form>
							";
						}
					?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>

