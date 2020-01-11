<?php
	require_once("connection.php");
	$query = "SELECT * FROM judul";
	$hasil= mysqli_query($connect, $query);
	$data=mysqli_fetch_array($hasil);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link href="img/xs_logo.png" rel="shortcut icon">
<title><?php echo "".$data['judul']."";?></title>
</head>
<body>
	<header>
		<h1><?php echo "".$data['judul']."";  ?></h1>
	</header>
	<section>
		<div class="kotak">
		<form method="post" action="simpan.php">
			<table align="center" class="masukkan" >
				<tr>
					<td>
						<label for="nama">Nama / NIM</label>
					</td>
                    <td>
						:
					</td>
					<td>
						<input rows="5" cols="60" type="text" name ="nama" placeholder="Nama" maxlength="30" required></input>
						<span><strong>/</strong></span>
						<input rows="5" cols="60" type="text" name ="nim" placeholder="NIM" maxlength="10" required></input>
					</td>
				</tr>
				<tr>	
					<td>
						<label for="modul">Modul</label>
					</td>
                    <td>
						:
					</td>
					<td>		
						<select type="list" name="modul">
							<?php 
								$query = "SELECT * FROM modul";
								$hasil= mysqli_query($connect, $query);
								if(!$hasil){
									die ('SQL Error: ' . mysqli_error($connect));
								}
								while($data=mysqli_fetch_array($hasil)){
									echo "
										<option value=".$data['id'].">".$data['id']." ".$data['judul']."</option>
										";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>	
					<td>
						<label for="kodeAsisten">Asisten</label>
					</td>
                    <td>
						:
					</td>
					<td>		
						<select type="list" name="kodeasisten">
							<?php 
								$query = "SELECT * FROM asisten";
								$hasil= mysqli_query($connect, $query);
								if(!$hasil){
									die ('SQL Error: ' . mysqli_error($connect));
								}
								while($data=mysqli_fetch_array($hasil)){
									echo "
										<option value=".$data['kode_asisten'].">".$data['kode_asisten']."</option>
										";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label for="Praktikum">Praktikum</label>
					</td>
                    <td>
						:
					</td>
					<td>
						<textarea rows="5" cols="60" type="text" name ="praktikum" placeholder="Kritik & Saran" required></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label for="Asisten">Asisten</label>
					</td>
                    <td>
						
					</td>
					<td>
						<textarea rows="5" cols="60" type ="text" name="asisten" placeholder="Kritik & Saran" required></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label for="Lab">Lab </label>
					</td>
                    <td>
						:
					</td>
					<td>
						<textarea rows="5" cols="60" type="text" name ="lab" placeholder="Kritik & Saran" required></textarea>
					</td>
				</tr>
			</table>
			<div align="center">
				<button class="button" type="submit" name="submit" value="Submit">SUBMIT</button>
			</div>
		</form>
        </div>
	</section>
     <footer>
     	<p align="center" class="copyright">© 2017 Software Engineering and Application Form. All right reserved | Design by Group 3</p>
     </footer>   	
</body>
</html>

