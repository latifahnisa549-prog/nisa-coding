<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "aphpi");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

// Simpan ke database
$sql = "INSERT INTO barang (nama_barang, stok, harga)
        VALUES ('$nama_barang', '$stok', '$harga')";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Data berhasil disimpan</h2>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Tampilkan tabel data barang
echo "<h2>Data Stok Barang</h2>";

$result = mysqli_query($conn, "SELECT * FROM barang");

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Harga</th>
      </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['nama_barang']."</td>
            <td>".$row['stok']."</td>
            <td>".$row['harga']."</td>
          </tr>";
}

echo "</table>";

// Tutup koneksi
mysqli_close($conn);
?>