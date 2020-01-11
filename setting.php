<?php
session_start();
 
if(!isset($_SESSION['username'])){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="login.php";</script>';
}else {
	$username = $_SESSION['username'];
}
	require_once("connection.php");
	$query = mysqli_query($connect,"SELECT * FROM admin WHERE username = '$username'");
	$hasil = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="margin-bottom: 30px;">
	<header>
		<nav class="navbar navbar-default">
		  	<div class="container">
		    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      		<ul class="nav navbar-nav navbar-right">
		        		<li><a href="#"><?php echo "$username"; ?></a></li>
		        		<li><a href="<?php
		        			$link_address = 'logout.php';
		        			echo $link_address;?>">Logout</a></li>
		      		</ul>
		    	</div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-fluid -->
		</nav>
	</header>
	<section>
		<div class="container" align="center">
			<div class="row">
				<div class="col-md-4" style="margin-top: 25px;">
					<form class="form-inline" method="post" action="set-judul.php">
  						<div class="form-group">
    						<label for="Judul">Set Judul</label>
    						<input type="text" name="judul" class="form-control" id="exampleInputName2" placeholder="Judul Form">
  						</div>
  						<button type="submit" class="btn btn-default">Simpan</button>
					</form>
					<hr  noshade>
					<h3 align="center">Tambah Asisten</h3>
					<form method="post" action="set-asisten.php">
				  		<div class="form-group">
				    		<label for="nama">Nama</label>
				    		<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama">
				  		</div>
				  		<div class="form-group">
						    <label for="kodeAsisten">Kode Asisten</label>
						    <input type="text" name="kodeasisten" class="form-control" placeholder="Kode Asisten">
						</div>
				  		<div class="form-group">
						    <label for="noTelpon">Nomor Telepon</label>
						    <input type="text" name="notelepon" class="form-control" placeholder="Nomor Telpon" maxlength="12">
				  		</div>
				  		<div class="form-group">
						    <label for="email">Email</label>
						    <input type="email" name="email" class="form-control" placeholder="email">
						</div>
						<div align="center">
				  			<button type="submit" class="btn btn-default">Submit</button>
				  		</div>
					</form>
					<hr  noshade>
					<h3 align="center">Modul</h3>
					<form class="form-inline" method="post" action="set-modul.php">
	  					<div class="form-group">
	    					<label for="Nomor">Modul</label>
	    					<input type="text" name="nomor" class="form-control" id="exampleInputName2" placeholder="Modul Ke">
	  					</div>
	  					<div class="form-group">
	    					<label for="Judul">Judul</label>
	    					<input type="text" name="judul" class="form-control" id="exampleInputName2" placeholder="Judul Modul">
	  					</div>
	  					<div>
	  						<button type="submit" class="btn btn-default">Tambah</button>
	  					</div>
  						
					</form>
				</div>
				<div class="col-md-8">
					<h2> 
						<?php
							$query = "SELECT * FROM judul";
							$hasil= mysqli_query($connect, $query);
							if(!$hasil){
								die ('SQL Error: ' . mysqli_error($connect));
							}
							while($data=mysqli_fetch_array($hasil)){
								echo "".$data['judul']."";
							}
						?>
					</h2>
					<h3>DAFTAR ASISTEN</h3>
					<table class="table table-striped">
					  <thead>
							<tr>
								<th>NAMA</th>
								<th>KODE ASISTEN</th>
								<th>TELEPON</th>
								<th>EMAIL</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM asisten";
								$hasil= mysqli_query($connect, $query);
								if(!$hasil){
									die ('SQL Error: ' . mysqli_error($connect));
								}
								while($data=mysqli_fetch_array($hasil)){
									echo "
										<form method='post' action='delete-asisten.php'>
										<tr>
											<td>".$data['nama_asisten']."</td>
											<td>".$data['kode_asisten']."</td>
											<td>".$data['no_telp']."</td>
											<td>".$data['email']."</td>
											<td><input type='submit' name='hapus' value='delete' >
											<input type='hidden' name='id' value='".$data['id']."' ></td>
										</tr>
										</form>
									";
								}
							?>
						</tbody>
					</table>
					<h3>DAFTAR MODUL</h3>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>MODUL KE</th>
								<th>JUDUL</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							
								<?php
									$query = "SELECT * FROM modul";
									$hasil= mysqli_query($connect, $query);
									if(!$hasil){
										die ('SQL Error: ' . mysqli_error($connect));
									}
									while($data=mysqli_fetch_array($hasil)){
										echo " 
											<form method='post' action='delete-modul.php'>
											<tr>
												<td>".$data['id']."</td>
												<td>".$data['judul']."</td>
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
			</div>
		</div>
	</section>
</body>
</html>