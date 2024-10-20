<?php
include 'koneksi.php';
// ini hapus iuran
if (isset($_GET['Id_bayar'])) {
    $Id_bayar = $_GET['Id_bayar'];
    $sql = "DELETE FROM iuran WHERE Id_bayar = '$Id_bayar'";

    if (mysqli_query($link, $sql)) {
        echo "<script>alert('Data Client berhasil dihapus.'); window.location.href = 'iuran.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data Iuran.'); window.location.href = 'iuran.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid.'); window.location.href = 'iuran.php';</script>";
}

mysqli_close($link);
?>