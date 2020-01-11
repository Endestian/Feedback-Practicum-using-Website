<?php
include "connection.php";

$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username' AND password='$pass'");
$row=mysqli_fetch_array($login);
if ($row['username'] == $username AND $row['password'] == $pass)
{
  session_start();
  $_SESSION['username'] = $row['username'];
  $_SESSION['password'] = $row['password'];
  header('location:admin.php');
}
else
{
  echo "<script> alert('username or passwor incorect'); location = 'login.php'; </script>";

}
?>