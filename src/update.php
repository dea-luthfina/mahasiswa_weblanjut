
<?php require "../config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Update Data Mahasiswa</title>
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
        </div>
    </nav>
    <br>
    <br>
	
    <div class="wrapper">
        <div style="color:red">
			<?php 
				if($_GET['id_mahasiswa'] == null) {
					header("location:read.php");
				}

				$id_mahasiswa = $_GET['id_mahasiswa']; 
				$script = "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa"; 
				$query = mysqli_query($conn, $script); 
				$data = mysqli_fetch_array($query); 

				if(isset($_POST['submit'])){
                    $nama =  $_POST['nama'];
                    $nim =  $_POST['nim'];
                    $tugas =  $_POST['tugas'];
                    $uts =  $_POST['uts'];
                    $uas =  $_POST['uas'];
                    $script = "UPDATE mahasiswa SET nama='$nama', nim='$nim', tugas='$tugas', uts='$uts', uas='$uas' WHERE id_mahasiswa='$id_mahasiswa'"; 
					$query = mysqli_query($conn, $script); 
					if($query){
						header("location: detail.php"); 
					}else{
						echo "Gagal mengubah data!";
					}
				}
			?>
		</div> 

		<div class="row">
        <form method="post" enctype="multipart/form-data">
            <h4>Data Mahasiswa</h4>
            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" required name="nama" value="<?= $data['nama']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="number" min=0 class="form-control" required name="nim" value="<?= $data['nim']?>">
            </div>
            <br>
            <h4>Data Nilai Mahasiswa</h4>
            <div class="mb-3">
                <label class="form-label">Tugas</label>
                <input type="number" min=0 max=100 class="form-control" required name="tugas" value="<?= $data['tugas']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">UTS</label>
                <input type="number" min=0 max=100 class="form-control" required name="uts" value="<?= $data['uts']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">UAS</label>
                <input type="number" min=0 max=100 class="form-control" required name="uas" value="<?= $data['uas']?>">
            </div>
            <center>
                <a href="read.php" type="submit" class="btn btn-danger">Cancel</a> 
                <input type="submit" class="btn btn-success" name="submit" value="Update">
            </center>
        </form>
        </div>
	</div>
</body>
</html>