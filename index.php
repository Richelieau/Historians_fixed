<?php include "config.php"; ?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Historians — Interactive History Education</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav>
  <div class="logo">HISTORIANS</div>
  <ul>
    <li onclick="go('home')">Home</li>
    <li onclick="go('about')">About</li>
    <li onclick="go('history')">History</li>
    <li onclick="go('featured')">Featured</li>
    <li><a href="login.php">Login</a></li>
  </ul>
</nav>


<!-- ================= HERO ================= -->
<section id="home" class="active hero bg-section bg-hero">

  <h1>HISTORIANS</h1>
  <p>Menjelajahi Peristiwa Dunia Secara Interaktif</p>

  <br><br>

  <p>
    Platform edukasi sejarah modern dengan tampilan visual sinematik,
    eksplorasi peristiwa penting, dan pembelajaran berbasis cerita.
  </p>

  <br>
  <button onclick="go('history')">Mulai Eksplorasi</button>

</section>


<!-- ================= ABOUT ================= -->
<section id="about" class="bg-section bg-about">

  <h2>Tentang Platform</h2>

  <p>
    Historians adalah platform pembelajaran sejarah interaktif yang dirancang
    untuk membantu pelajar memahami peristiwa masa lalu dengan cara visual,
    terstruktur, dan eksploratif.
  </p>

  <br>

  <p>
    Sejarah bukan sekadar tanggal dan nama — tetapi rangkaian keputusan,
    konsekuensi, perubahan sosial, dan transformasi peradaban manusia.
  </p>

  <br><br>

  <h2>Kutipan Tokoh Dunia</h2>

  <div class="quote" id="quoteBox">
    <!-- diisi JS -->
  </div>

  <br><br>

  <p>
    Klik kotak kutipan untuk melihat perspektif tokoh lain tentang sejarah
    dan masa depan.
  </p>

</section>


<!-- ================= HISTORY LIST ================= -->
<section id="history" class="bg-section bg-history">

  <h2>History Explorer</h2>

  <p>
    Kumpulan peristiwa penting dunia yang disajikan dalam bentuk kartu
    interaktif. Arahkan kursor untuk melihat efek visual.
  </p>

  <div class="grid" id="historyGrid">

    <!-- DIISI JS DUMMY DATA DULU -->
    <!-- nanti diganti PHP database -->

  </div>

</section>


<!-- ================= FEATURED TIMELINE ================= -->
<section id="featured" class="bg-section bg-about">

  <h2>Peristiwa Unggulan</h2>

  <div class="grid">
    <?php
    $q = mysqli_query($conn,"SELECT * FROM history ORDER BY id DESC"); while($d = mysqli_fetch_assoc($q)){
      ?>
    <div class="card">
      <img src="uploads/<?= $d['foto'] ?>">
      <h3><?= $d['title'] ?></h3>
      <p><?= substr($d['content'],0,140) ?>...</p>
     <a href=""> <button onclick="go('$sumber')">Read More!</button></a>
    </div>

    <?php } ?>
  </div>

</section>


<!-- ================= CALL TO ACTION ================= -->
<section class="bg-section bg-hero">

  <h2>Belajar Sejarah Lebih Dalam</h2>

  <p>
    Jelajahi arsip peristiwa, tokoh, dan perubahan dunia.
    Login sebagai admin untuk menambahkan data sejarah baru.
  </p>

  <br>

  <button onclick="location.href='login.php'">
    Login & Kelola Data
  </button>

</section>


<!-- ================= FOOTER ================= -->
<footer>

  <h3>HISTORIANS EDUCATION PLATFORM</h3>

  <p>Alamat: Jl Pendidikan No 1</p>
  <p>Email: historians@edu.id</p>
  <p>Instagram • YouTube • GitHub • Archive</p>

  <br>

  <p>© 2026 Historians — Interactive History Learning</p>

</footer>


<script src="assets/app.js"></script>
</body>
</html>
