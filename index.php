<?php require "config/config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/021b758c3a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="src/read.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="src/create.php">Tambah Data</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <h1>SELAMAT DATANG</h1>
        <h2>Data Akademik Mahasiswa CCIT 3B</h2>
        <a href="src/read.php" type="submit" class="btn btn-primary" >Lihat Data</a>
    </center>
</body>
</html>