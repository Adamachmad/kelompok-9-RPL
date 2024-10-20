<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $No_Kunci = $_POST['No_Kunci'];
    $No_Kamar = $_POST['No_Kamar'];
    $Nama = $_POST['Nama'];
    $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $Alamat= $_POST['Alamat'];
    $No_Handphone = $_POST['No_Handphone'];


    $stmt = $link->prepare("INSERT INTO client (No_Kunci, No_Kamar, Nama, Jenis_Kelamin, Alamat, No_Handphone ) 
                          VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $No_Kunci, $No_Kamar, $Nama, $Jenis_Kelamin, $Alamat, $No_Handphone);

    if ($stmt->execute()) {
        header('Location: client.php');
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="pt-5">
     <!-- topnavbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand ps-3" href="index.php">Dashboard Kost Azzahra</a>
    </nav>

    <?php include 'sidebar.php'; ?>

    <div class="main-content p-4">
        <div class="content">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Tambah Data</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="No_Kunci" class="form-label">No Kunci</label>
                            <input type="int" class="form-control" id="No_Kunci" name="No_Kunci" required>
                        </div>
                        <div class="mb-3">
                            <label for="No_Kamar" class="form-label">No Kamar</label>
                            <input type="int" class="form-control" id="No_Kamar" name="No_Kamar" required>
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="Jenis_Kelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="Jenis_Kelamin" name="Jenis_Kelamin" required>
                        </div>
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="Alamat" name="Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="No_Handphone" class="form-label">No Handphone</label>
                            <input type="text" class="form-control" id="No_Handphone" name="No_Handphone" required>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="client.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>