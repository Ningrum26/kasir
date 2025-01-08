<?php
//memeriksa apakah data telah disubmitw
if ($_POST['nama_pelanggan']) {
    //mengambil data dari formulir
    $nama = htmlspecialchars($_POST['nama_pelanggan']);
    $email = htmlspecialchars($_POST['email_pelanggan']);
    $password = htmlspecialchars($_POST['password']);
        // memprses array barang dan jumlaH 
        $barang = isset($_POST['barang']) ? $_POST['barang'] : [];
        $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : array ();

        $json_barang = json_encode($barang);
    //end memprses array barang dan jumlaH 

    // menghubungkan ke koneksi.php
    include 'koneksi.php';

    $id = htmlspecialchars($_POST['id']) ;
    if (!empty($id)) {
        # query untuk memperbarui data
        $sql = " UPDATE pelanggan SET nama_pelanggan = '$nama', email_pelanggan = '$email', password = '$password', data_barang = '$json_barang', WHERE id = '$id' ";
    } else {
        // query untuk menyimpan data
        $sql = "INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, password, data_barang) VALUES ('$nama', '$email', '$password', '$json_barang')";
    }
    // end
    // menjalankan  query
    if (mysqli_query($conn, $sql)) {
        echo "data berhasil disimpan!!";
    } else {
        echo "error : ". $sql . "<br>". $mysqli_error($conn);
    } 
    // menutp koneksi
    mysqli_close($conn);
    // end menutup koneksi

    $nama_barang1 = (!empty($_POST['barang'][0])) ? 'sabun' : NULL ;
    $nama_barang2 = (!empty($_POST['barang'][1])) ? 'sampo' : NULL;
    $nama_barang3 = (!empty($_POST['barang'][2])) ? 'odol'  : NULL ;

    $harga_barang1 = (!empty($_POST['barang'][0])) ? $_POST['barang'][0] : NULL ;
    $harga_barang2 = (!empty($_POST['barang'][1])) ? $_POST['barang'][1] : NULL ;
    $harga_barang3 = (!empty($_POST['barang'][2])) ? $_POST['barang'][2] : NULL ;

    $jumlah_barang1 = (!empty($_POST['jumlah'][0])) ? $_POST['jumlah'][0] : NULL ;
    $jumlah_barang2 = (!empty($_POST['jumlah'][1])) ? $_POST['jumlah'][1] : NULL ;
    $jumlah_barang3 = (!empty($_POST['jumlah'][2])) ? $_POST['jumlah'][2] : NULL ;

    $detail_produk = '';
    if ($nama_barang1) {
        $detail_produk .= 
        '
        <tr>
            <td>'.$nama_barang1.' ('.$jumlah_barang1.')</td>
            <td>Rp '.$harga_barang1.'</td>
        </tr>
        ';
    }
    if ($nama_barang2) {
        $detail_produk .= 
        '
        <tr>
            <td>'.$nama_barang2.' ('.$jumlah_barang2.')</td>
            <td>Rp '.$harga_barang2.'</td>
        </tr>
        ';
    }
    if ($nama_barang3) {
        $detail_produk .= 
        '
        <tr>
            <td>'.$nama_barang3.' ('.$jumlah_barang3.')</td>
            <td>Rp '.$harga_barang3.'</td>
        </tr>
        ';
    }
    //tampilkan data dalam format invoice untuk printer kasir
    $tampil =
    "<style>
        body {font-family: Arial, sans-serif;}
        .invoice {width: 300px ; margin: 0 auto;}
        .header, .footer {text-align: center;}
        .content {margin: 20px 0 ; }
        table {width: 100%;}
        th, td {text-align: left; padding: 5px; border-bottom: 1px solid #000; }
    </style>
   <div class='invoice'>
        <div class='header'>
            <h2 style='color : blue; '>invoice</h2>
        </div>
            <div class='content'>
                <table>
                    <tr>
                      <td>NIM</td>
                      <td>23050757</td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>Alifah Muthia Ningrum</td>
                    </tr>
                    <tr>
                      <td>field</td>
                      <td>value</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>$email</td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td>$password</td>
                    </tr>
                    <tr>
                      <td>Detail Produk</td>
                      <td></td>
                    </tr>
                    ".$detail_produk."
                </table>
            </div>
            <div class='footer'>
                <p>terima kasih!</p>
                <a href='lihatdata.php'>lihat data</a>
            </div>
            
    </div>"; 
} else {
    $tampil = "Data tidak Disubmit.";
}
echo $tampil;
?>