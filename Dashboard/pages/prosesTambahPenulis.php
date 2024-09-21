<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_penulis        = $_POST['id_penulis'];
    $nama      = $_POST['nama'];
    $email        = $_POST['email'];
    $alamat      = $_POST['alamat'];
    $tlp      = $_POST['tlp'];

    $query = "INSERT INTO penulis VALUES ('$id_penulis','$nama','$alamat','$tlp','$email')";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:penulis.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:penulis.php?error=$error");
    }

    mysqli_close($conn);
?>