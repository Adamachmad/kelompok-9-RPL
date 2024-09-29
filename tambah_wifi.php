<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Pass_wifi = $_POST['Pass_wifi'];
    $No_Kamar = $_POST['No_Kamar'];
    $Total_orang = $_POST['Total_orang'];

    $stmt = $link->prepare("INSERT INTO wifi (Pass_wifi, No_Kamar, Total_orang) 
                          VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Pass_wifi, $No_Kamar, $Total_orang);

    if ($stmt->execute()) {
        header('Location: wifi.php');
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
    <title>Tambah Kelas - E-Rapor Admin Dashboard</title>
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
                            <label for="Pass_wifi" class="form-label">Password Wifi</label>
                            <input type="int" class="form-control" id="Pass_wifi" name="Pass_wifi" required>
                        </div>
                        <div class="mb-3">
                            <label for="No_Kamar" class="form-label">No Kamar</label>
                            <input type="int" class="form-control" id="No_Kamar" name="No_Kamar" required>
                        </div>
                         <div class="mb-3">
                            <label for="Total_orang" class="form-label">Total orang</label>
                            <input type="text" class="form-control" id="Total_orang" name="Total_orang" required>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="wifi.php" class="btn btn-secondary">Kembali</a>
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