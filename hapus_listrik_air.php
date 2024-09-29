<?php
include 'koneksi.php';

if (isset($_GET['Id_listrik'])) {
    $Id_listrik = $_GET['Id_listrik'];
    $sql = "DELETE FROM listrik_air WHERE Id_listrik = '$Id_listrik'";

    if (mysqli_query($link, $sql)) {
        echo "<script>alert('Data Client berhasil dihapus.'); window.location.href = 'listrik.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data listrik_air.'); window.location.href = 'listrik.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid.'); window.location.href = 'listrik.php';</script>";
}

mysqli_close($link);
?>