<?php
    // include DB connection file
    include '../../koneksi.php';

    // mendapatkan nilai dari form
    $id_penerbit        = $_POST['id_penerbit'];
    $nama      = $_POST['nama'];
    $email        = $_POST['email'];
    $alamat      = $_POST['alamat'];
    $tlp      = $_POST['tlp'];

    $query = "UPDATE penerbit SET nama_penerbit = '$nama', email = '$email', alamat = '$alamat',  telp = '$tlp' WHERE id_penerbit = '$id_penerbit'";

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