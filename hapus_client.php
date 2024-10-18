<?php
include 'koneksi.php';
// ini fungsi hapus

if (isset($_GET['No_Kunci'])) {
    $No_Kunci = $_GET['No_Kunci'];
    $sql = "DELETE FROM client WHERE No_Kunci = '$No_Kunci'";

    if (mysqli_query($link, $sql)) {
        echo "<script>alert('Data Client berhasil dihapus.'); window.location.href = 'client.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data Client.'); window.location.href = 'client.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid.'); window.location.href = 'client.php';</script>";
}

mysqli_close($link);
?>