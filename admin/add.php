<?php
session_start();
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/auth.php';
/** @var mysqli $conn */

if(isset($_POST['save'])){

  $judul   = $_POST['title'];
  $content = $_POST['content'];
  $sumber  = $_POST['sumber_link'];

  // =====================
  // UPLOAD FOTO
  // =====================
  $nama_file = $_FILES['foto']['name'];
  $tmp       = $_FILES['foto']['tmp_name'];

  if($nama_file != ""){
    $tujuan = "../uploads/" . $nama_file;
    move_uploaded_file($tmp, $tujuan);
  } else {
    $nama_file = NULL;
  }

  // =====================
  // INSERT DATA (SUDAH TERMASUK SUMBER)
  // =====================
  $stmt = mysqli_prepare($conn,
    "INSERT INTO history (title, content, foto, sumber_link)
     VALUES (?, ?, ?, ?)"
  );

  mysqli_stmt_bind_param($stmt, "ssss",
    $judul,
    $content,
    $nama_file,
    $sumber
  );

  mysqli_stmt_execute($stmt);

  header("Location: dashboard.php");
  exit;
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="admin-wrap">
<h2>Tambah History + Foto</h2>

<form method="POST" enctype="multipart/form-data" class="admin-form">

<input name="title" placeholder="Judul" required>

<textarea name="content" required></textarea>

<input type="file" name="foto" required>

<input type="url" name="sumber_link" placeholder="Link sumber terpercaya" required>

<button name="save">Simpan</button>

</form>
</div>