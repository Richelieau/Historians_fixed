<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/auth.php';
/** @var mysqli $conn */
// =====================
// CEK ID
// =====================
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = $_GET['id'];

// =====================
// AMBIL DATA LAMA
// =====================
$data = mysqli_query($conn, "SELECT * FROM history WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if (!$d) {
    die("Data tidak ditemukan!");
}

// =====================
// PROSES UPDATE
// =====================
if (isset($_POST['submit'])) {
    $title   = $_POST['title'];
    $content = $_POST['content'];

    // =====================
    // CEK APAKAH UPLOAD GAMBAR BARU
    // =====================
    if (!empty($_FILES['foto']['name'])) {

        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];

        // pindahkan file
        move_uploaded_file($tmp, "../uploads/" . $foto);

        // update + foto baru
        mysqli_query($conn, "UPDATE history SET
            title='$title',
            content='$content',
            foto='$foto'
            WHERE id='$id'
        ");

    } else {

        // update tanpa ubah foto
        mysqli_query($conn, "UPDATE history SET
            title='$title',
            content='$content'
            WHERE id='$id'
        ");
    }

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            padding: 30px;
        }

        .box {
            background: white;
            padding: 25px;
            width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
        }

        button {
            padding: 10px;
            width: 100%;
            background: #4facfe;
            color: white;
            border: none;
            cursor: pointer;
        }

        img {
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Edit Data</h2>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="title" value="<?= $d['title'] ?>" required>

        <textarea name="content" required><?= $d['content'] ?></textarea>

        <!-- TAMPILKAN FOTO LAMA -->
        <p>Foto saat ini:</p>
        <img src="../uploads/<?= $d['foto'] ?>" width="100">

        <br><br>

        <!-- UPLOAD FOTO BARU -->
        <input type="file" name="foto">

        <button name="submit">Update</button>
    </form>
</div>

</body>
</html>