<?php
include 'koneksi.php';

if (isset($_GET['Id_listrik'])) {
    $Id_listrik = $_GET['Id_listrik'];

    // Mengambil data pake primary key
    $stmt = $link->prepare("SELECT * FROM listrik_air WHERE Id_listrik = ?");
    $stmt->bind_param("s", $Id_listrik);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        die("Error: Data tidak ditemukan.");
    }
} else {
    die("Error: Data tidak valid.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil nilai dari formulir
    $No_Kamar = $_POST['No_Kamar'];
    $Nama = $_POST['Nama'];
    $Tunggakan = $_POST['Tunggakan'];
    $Total_bayar= $_POST['Total_bayar'];


    // Update data 
    $stmt = $link->prepare("UPDATE listrik_air SET Nama = ?, No_Kamar = ?, Tunggakan = ?, Total_bayar = ?  WHERE Id_listrik = ?");
    $stmt->bind_param("sssss", $Nama, $No_Kamar, $Tunggakan, $Total_bayar, $Id_listrik);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui.'); window.location.href = 'listrik.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui data .'); window.location.href = 'listrik.php';</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kelas - E-Rapor Admin Dashboard</title>
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
        <div class="topbar mb-4">
            <h1>Edit Data</h1>
        </div>
        <div class="content">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Edit Data</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="Nama"
                                value="<?= htmlspecialchars($row['Nama']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="No_Kamar" class="form-label">No Kamar</label>
                            <input type="text" class="form-control" id="No_Kamar" name="No_Kamar"
                                value="<?= htmlspecialchars($row['No_Kamar']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="Tunggakan" class="form-label">Tunggakan</label>
                            <input type="text" class="form-control" id="Tunggakan" name="Tunggakan"
                                value="<?= htmlspecialchars($row['Tunggakan']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="Total_bayar" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="Total_bayar" name="Total_bayar"
                                value="<?= htmlspecialchars($row['Total_bayar']) ?>" required>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="listrik.php" class="btn btn-warning">Kembali</a>
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