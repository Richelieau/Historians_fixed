<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Historians</title>
<link rel="stylesheet" href="assets/style.css">
</head>

<body>

<h1>Historians</h1>

<section id="history">
<h2>History List</h2>

<div class="grid">

<?php
$q = mysqli_query($conn,"SELECT * FROM history ORDER BY id DESC");
while($d=mysqli_fetch_assoc($q)){
?>

<section id="history">
<h2>History List</h2>

<div class="grid">

<?php
$q = mysqli_query($conn,"SELECT * FROM history ORDER BY id DESC");

while($d=mysqli_fetch_assoc($q)){
?>

<div class="card">

<img src="uploads/<?= $d['image'] ?>" class="card-img">

<h3><?= $d['title'] ?></h3>

<p><?= $d['content'] ?></p>

</div>


<?php } ?>

</div>
</section>


<?php } ?>

</div>
</section>

</body>
</html>
