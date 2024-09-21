<?php
    // include DB connection file
    include '../../koneksi.php';

   // mendapatkan nilai dari form
   $id_penulis        = $_POST['id_penulis'];
   $nama      = $_POST['nama'];
   $email        = $_POST['email'];
   $alamat      = $_POST['alamat'];
   $tlp      = $_POST['tlp'];


    $query = "UPDATE penulis SET nama_penulis = '$nama', email = '$email', alamat = '$alamat',  telp = '$tlp' WHERE id_penulis = '$id_penulis'";

    // menjalankan query isi data
    if (mysqli_query($conn, $query))
    {
        header("Location:penulis.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil diupdate");
        header("Location:penulis.php?error=$error");
    }

    mysqli_close($conn);
?>