<?php
    include('../../koneksi.php');

    $id_cust        = $_POST['id_customer'];
    $nama_customer      = $_POST['nama'];
    $jk_customer        = $_POST['gender'];
    $alamat_customer      = $_POST['alamat'];
    $email_customer      = $_POST['email'];
    $telp_customer      = $_POST['phone'];

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO customer VALUES ('$id_cust','$nama_customer','$jk_customer','$alamat_customer','$telp_customer')";
    $query2 = "INSERT INTO user VALUES ('$id_cust', '$username','$password','$email_customer','User')";

    // menjalankan query isi data
    if (mysqli_query($conn, $query) && mysqli_query($conn, $query2))
    {
        header("Location:sign-in.php");
    }
    else
    {
        echo "<script type='text/javascript'>
	    alert('Sign Up Gagal!')
	    </script>";
        header("Location:sign-in.php");
    }

    mysqli_close($conn);

?>