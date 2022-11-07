
<?php require "../config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Data</title>
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="read.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="create.php">Tambah Data</a>
                </li>
            </ul>
            <form class="d-flex" method="get">
                <input class="form-control me-2" type="search" id="form1" placeholder="Cari data mahasiswa..." aria-label="Search" name="search">
                <input type="submit" class="btn btn-outline-success" value="Search">
            </form>
        </div>
    </nav>
    <br>
    <br>
	
    <div class="wrapper">
		<div class="row">
			<ul><a href="create.php" type="submit" class="btn btn-primary" >[+] Tambahkan Data</a></ul>
			<?php
				$batas = 4; 
				$halaman = $_GET['halaman'] ?? null;

				if(empty($halaman)){
					$posisi = 0; $halaman = 1;
				}else{
					$posisi = ($halaman-1) * $batas;
				}

				if(isset($_GET['search'])){ 
					$search = $_GET['search']; 
					$sql="SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' ORDER BY id_mahasiswa ASC LIMIT $posisi, $batas"; 
				}else{ 
					$sql="SELECT * FROM mahasiswa ORDER BY id_mahasiswa ASC LIMIT $posisi, $batas";
				}

				$hasil=mysqli_query($conn, $sql); 
				while ($data = mysqli_fetch_array($hasil)) {
			?>

			<div class="col-sm-3">
				<center>
				<div class="card border-info mb-3" style="max-width: 18rem; width: 300px;" >
					<div class="card-body">
						<h5 class="card-title"><?= $data['nama'] ?></h5>
						<p class="card-text"><?= $data['nim'] ?></p>
						<a href="detail.php?id_mahasiswa=<?= $data['id_mahasiswa'] ?>" class="btn btn-primary">Selengkapnya >></a>
					</div>
				</div>
				</center>
			</div>
			<?php } ?>
		</div> 

		<?php
			if(isset($_GET['search'])){
				$search= $_GET['search']; 
				$query2="SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' ORDER BY id_mahasiswa ASC"; 
			}else{ 
				$query2="SELECT * FROM mahasiswa ORDER BY id_mahasiswa ASC";
			}

			$result2 = mysqli_query($conn, $query2); 
			$jmldata = mysqli_num_rows($result2); 
			$jmlhalaman = ceil($jmldata/$batas);
		?>
		<br>
		<ul class="pagination"> 
			<?php 
				for($i=1;$i<=$jmlhalaman; $i++) {
					if ($i != $halaman) { 
						if(isset($_GET['search'])){ 
							$search = $_GET['search'];
							echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i&search=$search'>
								  $i</a></li>";
						}else{ 
							echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i'>$i</a></li>";
						}
					} else {
						echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
					}
				}
			?>
		</ul> 
	</div>
</body>
</html>

