<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_kat        = $_POST['id_kat'];
    $kategori      = $_POST['nama_kat'];
   

    $query = "UPDATE kategori SET nama_kat = '$kategori' WHERE id_kat = '$id_kat'";

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