<?php
$conn = new mysqli("localhost","root","","togel");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>