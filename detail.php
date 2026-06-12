<?php
include "config.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM history WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if (!$d) {
    die("Data tidak ditemukan!");
}
?>

<h1><?= $d['title'] ?></h1>
<img src="uploads/<?= $d['foto'] ?>" width="400">
<p><?= $d['content'] ?></p>