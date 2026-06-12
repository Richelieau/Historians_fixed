<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/auth.php';
/** @var mysqli $conn */

// DATA UTAMA
$total = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM history"));

// =====================
// MONITORING TAMBAHAN
// =====================
$hadir = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kehadiran WHERE status='Hadir'"));
$tidak = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kehadiran WHERE status='Tidak Hadir'"));

$binjas = mysqli_query($conn,"SELECT AVG(nilai) as rata FROM binjas");
$rata = mysqli_fetch_assoc($binjas)['rata'] ?? 0;

$total_mentoring = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mentoring"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin — Historians</title>
<link rel="stylesheet" href="../assets/style.css">

<style>
.stat-boxes {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px,1fr));
  gap: 15px;
  color: black;
}

.stat {
  background: white;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
</style>

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

    <div class="stat">
      <h3><?= $total_mentoring ?></h3>
      <p>Total Mentoring</p>
    </div>

    <div class="stat">
      <h3><?= $hadir ?></h3>
      <p>Kehadiran Hadir</p>
    </div>

    <div class="stat">
      <h3><?= $tidak ?></h3>
      <p>Tidak Hadir</p>
    </div>

    <div class="stat">
      <h3><?= round($rata,1) ?></h3>
      <p>Rata Binjas</p>
    </div>

  </div>

  <a href="add.php" class="admin-btn">+ Tambah History</a>

  <!-- GRAFIK -->
  <canvas id="chart" style="margin:30px 0;"></canvas>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  new Chart(document.getElementById("chart"), {
    type: 'bar',
    data: {
      labels: ['Hadir','Tidak Hadir'],
      datasets: [{
        label: 'Statistik Kehadiran',
        data: [<?= $hadir ?>, <?= $tidak ?>]
      }]
    }
  });
  </script>

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
