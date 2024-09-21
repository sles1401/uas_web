<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_kat        = $_POST['id_kat'];
    $kategori      = $_POST['kategori'];
   

    $query = "INSERT INTO kategori VALUES ('$id_kat','$kategori')";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:kategori.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:kategori.php?error=$error");
    }

    mysqli_close($conn);
?>