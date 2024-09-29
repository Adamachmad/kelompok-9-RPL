<?php
include 'koneksi.php';

if (isset($_GET['Pass_wifi'])) {
    $Pass_wifi = $_GET['Pass_wifi'];
    $sql = "DELETE FROM wifi WHERE Pass_wifi = '$Pass_wifi'";

    if (mysqli_query($link, $sql)) {
        echo "<script>alert('Data wifi berhasil dihapus.'); window.location.href = 'wifi.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data wifi.'); window.location.href = 'wifi.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid.'); window.location.href = 'wifi.php';</script>";
}

mysqli_close($link);
?>