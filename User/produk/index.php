<?php
include '../../koneksi.php';
session_start();

$id = $_SESSION['id'];
$query = "SELECT * from customer where id_cust = '$id'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$nama = $row['nama'];

$id_buku = $_GET['id_buku'];

?>
<?php
$query =
    "SELECT * from buku where id_buku='$id_buku'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$kategori = $row['id_kategori'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Bookstore</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul> -->
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php if(isset($_SESSION["nomor"])){ echo $_SESSION["nomor"]; } else{ echo 0;} ?></span>
                </button>
            </form>
        </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <?php echo " <div class='col-md-6'><img class='card-img-top mb-5 mb-md-0' src='../assets/img/" . $row['gambar'] . "' alt='...' /></div>" ?>
                <div class="col-md-6">
                    <div class="small mb-1"><?php echo $kategori ?></div>
                    <h1 class="display-5 fw-bolder"><?php echo $row['judul'] ?></h1>
                    <div class="fs-5 mb-5">
                        Rp. <?php echo $row['harga'] ?> -

                    </div>
                    <p class="lead"> <?php echo $row['deskripsi'] ?></p>
                    <div class="d-flex">
                        
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" name="qty" value="1" disabled style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="location.href='../../Keranjang/updateKeranjang.php?id_buku=<?php echo $id_buku; ?>'">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Bookstore 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>