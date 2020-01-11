<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/admin.style.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="img/xs_logo.png" rel="shortcut icon">
   <title>FEEDBACK PRAKTIKUM SEA</title>
</head>
<body>
  <div align="center" class="judul2">
    <h2 style="color: white;"><strong>Register Admin</strong></h2>
      <form method="post" action="proses-register.php">
        <tr>
          <input type="text" id="nama" name="nama" placeholder="Nama" maxlength="30" required>
        </tr>
        <tr>
          <input type="text" id="username" name="username" placeholder="username" maxlength="20" required>
        </tr>
        <tr>
          <input type="password" id="password" name="password" placeholder="Password" maxlength="20" required>
        </tr>
          
        <button type="submit" style="width: 100px; height: 30px;">DAFTAR</button>
      </form>
</body>
</html>