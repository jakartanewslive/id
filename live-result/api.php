<?php
include 'db.php';

$market = $_GET['market'] ?? 'HK';

$sql = "SELECT * FROM results 
        WHERE market='$market' 
        ORDER BY date DESC LIMIT 1";

$res = $conn->query($sql);
$data = $res->fetch_assoc();

echo json_encode($data);
?>