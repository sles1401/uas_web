<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_cust        = $_POST['id_cust'];
    $nama      = $_POST['nama'];
    $gender        = $_POST['gender'];
    $alamat      = $_POST['alamat'];
    $tlp      = $_POST['tlp'];

    $query = "INSERT INTO customer VALUES ('$id_cust','$nama','$gender','$alamat','$tlp')";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:customer.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:customer.php?error=$error");
    }

    mysqli_close($conn);
?>