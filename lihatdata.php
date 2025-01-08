<?php
//menghubungkan ke file kondisi php
include 'koneksi.php';
//Query untuk mengambil semua data dari tabel transaksi
$query = "SELECT id, nama_pelanggan, email_pelanggan, password, data_barang FROM pelanggan";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error:" . mysqli_error($conn));
}
?>
<html>
<head>
    <title>Data Transaksi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Data Transaksi</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Data Barang</th>
        <th>Aksi</th>
    </tr>
    <?php
    
    // menampilkan data perbaris 
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['nama_pelanggan']."</td>";
        echo "<td>".$row['email_pelanggan']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "<td>".$row['data_barang']."</td>";
        echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | Hapus </td>";
        echo "</tr>";
    }
    
    ?>
</table>
<?php
// Menutupi koneksi
mysqli_close($conn);
?>

<a href="index.php">kembali</a>
</body>
</html>