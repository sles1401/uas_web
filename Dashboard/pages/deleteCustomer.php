<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_cust = $_GET['id_cust'];

    $query = "DELETE from customer WHERE id_cust = '$id_cust'";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:customer.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:customer.php?error=$error");
    }

    mysqli_close($conn);
?>