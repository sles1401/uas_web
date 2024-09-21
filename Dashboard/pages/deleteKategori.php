<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_kat = $_GET['id_kat'];

    $query = "DELETE from kategori WHERE id_kat = '$id_kat'";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:kategori.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:kategori.php?error=$error");
    }

    mysqli_close($conn);
?>