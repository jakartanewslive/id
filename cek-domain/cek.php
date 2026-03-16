<?php

if(isset($_POST['domains'])){

$domains = explode("\n", $_POST['domains']);

echo "<h2>Hasil Cek</h2>";

foreach($domains as $domain){

$domain = trim($domain);

if($domain == "") continue;

$url = "https://trustpositif.komdigi.go.id/welcome?csrf_token=dc276365ed8a6432d6b6b340a708e70c&recaptcha_token=&domains=".$domain;

$data = file_get_contents($url);

if(stripos($data,"Tidak Ada") !== false){

$status = "AMAN";

}else{

$status = "KENA INTERNET POSITIF";

}

echo "<p>$domain : <b>$status</b></p>";

}

}

?>