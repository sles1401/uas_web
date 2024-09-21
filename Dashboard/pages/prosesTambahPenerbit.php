<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_penerbit        = $_POST['id_penerbit'];
    $nama      = $_POST['nama'];
    $email        = $_POST['email'];
    $alamat      = $_POST['alamat'];
    $tlp      = $_POST['tlp'];

    $query = "INSERT INTO penerbit VALUES ('$id_penerbit','$nama','$alamat','$tlp','$email')";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:penerbit.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:penerbit.php?error=$error");
    }

    mysqli_close($conn);
?>