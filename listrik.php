<?php
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = "SELECT *
            FROM listrik_air 
            WHERE Id_listrik LIKE '%$search%' 
            OR No_Kamar LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM listrik_air";
}

$result = $link->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    
    <div class="main-content p-4">
        <!-- Content Area -->
        <div class="content">
            <!-- Search Bar -->
            <div class="search-add-bar mb-4">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control me-2" name="search" placeholder="Cari..." value="<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        <a href="tambah_listrik_air.php" class="btn btn-success ms-3">Tambah Data</a>
                    </div>
                </form>
            </div>

            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">ID Listrik: <?= $row["Id_listrik"] ?></h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama:</strong> <?= $row["Nama"] ?></p>
                            <p><strong>No Kamar:</strong> <?= $row["No_Kamar"] ?></p>
                            <p><strong>Tunggakan:</strong> <?= $row["Tunggakan"] ?></p>
                            <p><strong>Total Bayar:</strong> <?= $row["Total_bayar"] ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="edit_listrik_air.php?Id_listrik=<?= $row['Id_listrik'] ?>" class="btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="hapus_listrik_air.php?Id_listrik=<?= $row['Id_listrik'] ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "<p class='text-center'>Tidak ada data yang ditemukan.</p>";
                }
                $link->close();
                ?>
            </div>
        </div>  
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
