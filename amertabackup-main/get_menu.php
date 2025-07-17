<?php
header('Content-Type: application/json');

// 1. Koneksi ke MySQL (phpMyAdmin)
$koneksi = new mysqli("localhost", "root", "", "amerta"); // ganti "amerta" sesuai nama database kamu

if ($koneksi->connect_error) {
  die(json_encode(["error" => "Koneksi gagal: " . $koneksi->connect_error]));
}

// 2. Ambil data dari tabel
$sql = "SELECT * FROM menu"; // pastikan tabelnya juga bernama `menu`
$result = $koneksi->query($sql);

$menu = [];

while ($row = $result->fetch_assoc()) {
  $menu[] = $row;
}

// 3. Kirim JSON
echo json_encode($menu);
?>
