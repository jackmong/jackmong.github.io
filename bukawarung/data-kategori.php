<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toko Kandang Unggas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
<header>
    <div class="container">
        <h1><a href="dashboard.php">Toko Kandang Unggas</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </div>
</header>

<!-- content -->
<div class="section">
    <div class="container">
        <h3>Data Kategori</h3>
        <div class="box">
            <a href="tambah-kategori.php">Tambah Data</a>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Kategori</th>
                        <th width="160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if(mysqli_num_rows($kategori) > 0){
                    while($row = mysqli_fetch_array($kategori)){
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td>
                            <a href="edit-kategori.php?id=<?php echo $row['category_id']?>">Edit</a> ||
                            <a href="proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                        </td>
                    </tr>
                <?php } }else{ ?>
                    <tr>
                        <td colspan="3">Tidak Ada Data</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2023 - Toko Kandang Unggas</small>
    </div>
</footer>

</body>
</html>