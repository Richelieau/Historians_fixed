<?php
include "../config.php";
include "auth.php";

$id=$_GET['id'];
$d=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Historians_fixed WHERE id=$id"));

if(isset($_POST['update'])){
 mysqli_query($conn,"UPDATE history SET
 title='$_POST[title]',
 content='$_POST[content]'
 sumber='$_POST[sumber]'
 WHERE id=$id");
 header("Location: dashboard.php");
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="admin-wrap">
<h2>Edit History</h2>

<form method="POST" class="admin-form">
<input name="title" value="<?=$d['title']?>">
<textarea name="content"><?=$d['content']?></textarea>
<button name="update">Update</button>
</form>

</div>
