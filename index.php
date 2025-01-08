<html>
<head>
    <title>Form Kasih dengan Checkbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
.gatau{
    max-width: 400px;
}
</style>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="container p-4 bg-white shadow rounded gatau">
    <h2 class="text-center mp-4 ">Form Kasir</h2>
    <form id="kasirform" action="proses_kasir.php" method="POST" onsubmit="return validateForm()">
        <div class="mb-3">
            <label class="form-tabel">Nama Lengkap</label>
            <label class="form-tabel">Alifah Muthia</label>
        </div>
        <div class="mb-3">
            <label class="from-tabel">NIM</label>
            <label class="form-tabel">23050757</label>
        </div>
        <div class="mb-3">
            <label class="form-tabel">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama_pelanggan" id="namaPelanggan" placeholder="Masukkan nama pelanggan" required>
        </div>
        <div class="mb-3">
            <label class="form-tabel">Email Pelanggan</label>
            <input type="email" class="form-control" name="email_pelanggan" id="emailPelanggan" placeholder="Masukkan email pelanggan" required>
        </div>
        <div class="mb-3">
            <label class="form-tabel">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
        </div>
        <div class="form-check d-flex align-item-center mb-3">
            <input class="form-check-input me-2 barang" type="checkbox" name="barang[]" value="10000" id="sabun">
            <label class="form-check-label me-auto">Sabun - Rp10.000</label>
            <input type="number" name="jumlah[]" class="form-control ms-2" placeholder="Jumlah" min="1" style="width: 80px;">
        </div>
        <div class="form-check d-flex align-item-center mb-3">
            <input class="form-check-input me-2 barang" type="checkbox" name="barang[]" value="15000" id="sampo">
            <label class="form-check-label me-auto">Sampo - Rp15.000</label>
            <input type="number" name="jumlah[]" class="form-control ms-2" placeholder="Jumlah" min="1" style="width: 80px;">
        </div>
        <div class="form-check d-flex align-item-center mb-3">
            <input class="form-check-input me-2 barang" type="checkbox" name="barang[]" value="20000" id="odol">
            <label class="form-check-label me-auto">odol - Rp20.000</label>
            <input type="number" name="jumlah[]" class="form-control ms-2" placeholder="Jumlah" min="1" style="width: 80px;">
        </div>
<br>
<button type="submit" class="btn btn-success w-100 mt-3">Proses transaksi</button>
<button><a href="lihatdata.php">lihat data</a></button>
    </form>
</div>
<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        if (password.length < 6) {
            alert("Password harus memiliki 6 karakter");
            return false; // Mencegah formulir disubmit
        }
        return true; // Mengizinkan formulir disubmit
    }
</script>
</body>
</html>
