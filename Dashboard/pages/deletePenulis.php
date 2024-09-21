<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_penulis = $_GET['id_penulis'];

    $query = "DELETE from penulis WHERE id_penulis = '$id_penulis'";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:penulis.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:penulis.php?error=$error");
    }

    mysqli_close($conn);
?>