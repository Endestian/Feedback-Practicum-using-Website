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
<body>
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
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
	<section> 
		<div align="center" class="container-fluid">
			<div class="jumbotron">
				<h1><strong>ADMIN PRAKTIKUM</strong></h1>
				<p>Laboratorium Sofware Engineering Application</p>
				<p><a class="btn btn-primary btn-lg" href="setting.php" role="button">setting</a></p>
				<p><a class="btn btn-primary btn-lg" href="lihat.php" role="button">Lihat</a></p>
			</div>
		</div>
	</section>
</body>
</html>