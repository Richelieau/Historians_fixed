<?php 
include "../config.php";
include "auth.php";

$total = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM history"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin — Historians</title>
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<nav class="navbar">
  <div class="logo">HISTORIANS ADMIN</div>
  <div class="nav-links">
    <a href="dashboard.php">Dashboard</a>
    <a href="add.php">Tambah</a>
    <a href="../logout.php">Logout</a>
  </div>
</nav>

<div class="admin-wrap">

  <div class="admin-title">Dashboard Konten Sejarah</div>

  <!-- STAT BOX -->
  <div class="stat-boxes">
    <div class="stat">
      <h3><?= $total ?></h3>
      <p>Total Peristiwa Sejarah</p>
    </div>
  </div>

  <a href="add.php" class="admin-btn">+ Tambah History</a>

  <!-- TABLE -->
  <table class="table">
    <tr>
      <th>No</th>
      <th>Foto</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>

<?php
$no=1;
$q=mysqli_query($conn,"SELECT * FROM history ORDER BY id DESC");
while($d=mysqli_fetch_assoc($q)){
?>

<tr>

<td><?= $no++ ?></td>

<td>
<?php if(!empty($d['foto'])){ ?>
  <img src="../uploads/<?= $d['foto'] ?>" width="120" class="thumb">
<?php } else { ?>
  -
<?php } ?>
</td>

<td><?= htmlspecialchars($d['title']) ?></td>

<td class="desc">
<?= substr(htmlspecialchars($d['content']),0,120) ?>...
</td>

<td>
  <a class="action-btn edit" href="edit.php?id=<?=$d['id']?>">Edit</a>
  <a class="action-btn delete" 
     href="delete.php?id=<?=$d['id']?>"
     onclick="return confirm('Hapus data ini?')">
     Hapus
  </a>
</td>

</tr>

<?php } ?>

  </table>

</div>

</body>
</html>
