<?php require "../config/config.php";

    if($_GET['id_mahasiswa'] != null){
        $id_mahasiswa = $_GET['id_mahasiswa']; 
        $script = "SELECT * FROM mahasiswa WHERE id_mahasiswa=$id_mahasiswa"; 
        $query = mysqli_query($conn, $script);
        $data = mysqli_fetch_array($query);
    }else{
        header("location: read.php");
    }

    $query2 = null;

    if(isset($_POST['hapus'])) {
        $script2 = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa"; 
        $query2 = mysqli_query($conn, $script2);
    }

    if($query2 != null){
        header("location:read.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Data <?= $data['nama'] ?></title>
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

    <center>
        <div class="card" style="width: 1000px;">
        <h1 class="card-header"><?= $data['nama'] ?></h1>
        <div class="card-body">
            <h2 class="card-title">NIM: <?= $data['nim'] ?></h2>
            <br>
            <br>
            <h3 class="card-text">INFORMASI NILAI AKADEMIK MAHASISWA</h3>
            <h4 class="card-text">TUGAS: <?= $data['tugas'] ?></h4>
            <h4 class="card-text">UTS: <?= $data['uts'] ?></h4>
            <h4 class="card-text">UAS: <?= $data['uas'] ?></h4>
            <br>
            <br>
            <form method="post">
            <a href="update.php?id_mahasiswa=<?= $data['id_mahasiswa'] ?>" class="btn btn-warning">Update Data</a>
            <input type="submit" name="hapus" value="Hapus Data" class="btn btn-danger"> 
            </form>
        </div>
        </div>
        <br>
        <br>
        <ul><a href="read.php" type="submit" class="btn btn-primary">Kembali</a></ul>
    </center>


</body>
</html>