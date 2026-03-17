<?php include 'db.php'; ?>

<form method="POST">
Market: <input name="market"><br>
Date: <input name="date" type="date"><br>
1st: <input name="p1"><br>
2nd: <input name="p2"><br>
3rd: <input name="p3"><br>

Starter (JSON): <textarea name="starter">["1234","5678"]</textarea><br>
Consolation (JSON): <textarea name="cons">["1111","2222"]</textarea><br>

<button>Simpan</button>
</form>

<?php
if($_POST){
$conn->query("INSERT INTO results 
(market,date,prize1,prize2,prize3,starter,consolation)
VALUES (
'$_POST[market]',
'$_POST[date]',
'$_POST[p1]',
'$_POST[p2]',
'$_POST[p3]',
'$_POST[starter]',
'$_POST[cons]'
)");
echo "Data masuk";
}
?>