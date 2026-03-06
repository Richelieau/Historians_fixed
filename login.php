<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login — Historians</title>
<link rel="stylesheet" href="assets/style.css">
</head>

<body>

<div class="login-box">
  <h2>Login Historians</h2>

  <form method="POST" action="proses_login.php">

    <input type="text" name="username" placeholder="Username" required>

    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" name="login">Login</button>
    <button type="button" onclick="location.href='index.php'">Kembali</button>

  </form>

</div>

</body>
</html>
