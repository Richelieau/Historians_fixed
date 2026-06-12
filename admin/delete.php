<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/auth.php';
/** @var mysqli $conn */

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM history WHERE id=$id");

header("Location: dashboard.php");
