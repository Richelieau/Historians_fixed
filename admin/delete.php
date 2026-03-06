<?php
include "../config.php";
include "auth.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM history WHERE id=$id");

header("Location: dashboard.php");
