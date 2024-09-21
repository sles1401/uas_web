<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_penerbit = $_GET['id_penerbit'];

    $query = "DELETE from penerbit WHERE id_penerbit = '$id_penerbit'";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:penerbit.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:penerbit.php?error=$error");
    }

    mysqli_close($conn);
?>