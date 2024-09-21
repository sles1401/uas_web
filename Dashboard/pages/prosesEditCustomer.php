<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_cust        = $_POST['id_cust'];
    $nama      = $_POST['nama'];
    $gender        = $_POST['gender'];
    $alamat      = $_POST['alamat'];
    $tlp      = $_POST['tlp'];


    $query = "UPDATE customer SET nama = '$nama', gender = '$gender', alamat = '$alamat',  tlp = '$tlp' WHERE id_cust = '$id_cust'";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:customer.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil diupdate");
        header("Location:customer.php?error=$error");
    }

    mysqli_close($conn);
?>