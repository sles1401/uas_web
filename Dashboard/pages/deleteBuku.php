<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_buku = $_GET['id_buku'];

    $query = "DELETE from buku WHERE id_buku = '$id_buku'";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:buku.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:buku.php?error=$error");
    }

    mysqli_close($conn);
