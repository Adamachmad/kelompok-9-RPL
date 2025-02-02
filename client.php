<?php
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = "SELECT *
            FROM client 
            WHERE No_Kunci LIKE '%$search%' 
            OR No_Kamar LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM client";
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
    <!-- test -->
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
                        <a href="tambah_client.php" class="btn btn-success ms-3">Tambah Data</a>
                    </div>
                </form>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Ini adalah Data Penghuni Kost</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No Kamar</th>
                                <th scope="col">No Kunci</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Handphone</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $no = 1;
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $no++ . "</td>
                                        <td>" . $row["Nama"] . "</td>
                                        <td>" . $row["Jenis_Kelamin"] . "</td>
                                        <td>" . $row["No_Kamar"] . "</td>
                                        <td>" . $row["No_Kunci"] . "</td>
                                        <td>" . $row["Alamat"] . "</td>
                                        <td>" . $row["No_Handphone"] . "</td>
                
                                        <td>
                                            <a href='edit_client.php?No_Kunci=" . $row['No_Kunci'] . "' class='btn btn-warning btn-sm me-1'><i class='fas fa-edit'></i> Edit</a>
                                            <a href='hapus_client.php?No_Kunci=" . $row['No_Kunci'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i> Delete</a>

                                        </td>
                                     
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>Tidak ada data akun yang ditemukan.</td></tr>";
                        }
                        $link->close();
                        ?>
                        </tbody>
                    </table>
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