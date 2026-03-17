<?php include 'db.php'; ?>

<form method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<button>Upload CSV</button>
</form>

<?php
if(isset($_FILES['file'])){
$file = fopen($_FILES['file']['tmp_name'], "r");

while (($row = fgetcsv($file)) !== FALSE) {
$conn->query("INSERT INTO results 
(market,date,prize1,prize2,prize3)
VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]')");
}
echo "Upload selesai";
}
?>