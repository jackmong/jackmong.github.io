<?php 
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

<!-- header -->
<header>
    <div class="container">
        <h1><a href="index.php">Toko Kandang Unggas</a></h1>
        <ul>
            <li><a><img src="img/list barang.png" width="50px"></a></li>
        </ul>
    </div>
</header>

<!-- product detail -->
<div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="box">
            <div class="col-2">
                <img src="produk/<?php echo $p->product_image ?>" width="100%">
            </div>
            <div class="col-2">
                <h3><?php echo $p->product_name ?></h3>
                <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                <p>Deskripsi :<br>
                <?php echo $p->product_description ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="footer">
    <div class="container">
        <h4>CONTACT PERSON :</h4><br>
        <h4>Email</h4>
        <p><?php echo $a->admin_email ?></p>
        <h4>No HP</h4>
        <p><?php echo $a->admin_telp ?></p><br>
        <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk Anda. Stok barang ready?" target="_blank">
            Klik Hubungi via Whatsapp
            <img src="img/wa.png" width="20px"></a>
        <br><br>
        <small>Copyright &copy; 2023 - Toko Kandang Unggas</small>
    </div>
</div>


</body>
</html>