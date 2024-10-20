<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Id_bayar = $_POST['Id_bayar'];
    $Nama = $_POST['Nama'];
    $No_Kamar = $_POST['No_Kamar'];
    $Tunggakan = $_POST['Tunggakan'];
    $Total_bayar= $_POST['Total_bayar'];



    $stmt = $link->prepare("INSERT INTO iuran (Id_bayar, Nama, No_Kamar, Tunggakan, Total_bayar  ) 
                          VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $Id_bayar, $No_Kamar, $Nama, $Tunggakan, $Total_bayar );

    if ($stmt->execute()) {
        header('Location: iuran.php');
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
        <a class="navbar-brand ps-3" href="admin_dashboard.html">Dashboard Kost Azzahra</a>
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
                            <label for="Id_bayar" class="form-label">ID bayar</label>
                            <input type="int" class="form-control" id="Id_bayar" name="Id_bayar" required>
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="No_Kamar" class="form-label">No Kamar</label>
                            <input type="int" class="form-control" id="No_Kamar" name="No_Kamar" required>
                        </div>
                        <div class="mb-3">
                            <label for="Tunggakan" class="form-label">Tunggakan</label>
                            <input type="text" class="form-control" id="Tunggakan" name="Tunggakan" required>
                        </div>
                        <div class="mb-3">
                            <label for="Total" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="Total_bayar" name="Total_bayar" required>
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