<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $domains = explode("\n", $_POST['domains']);

    echo "<h2>Hasil Cek Domain</h2>";

    foreach ($domains as $domain) {

        $domain = trim($domain);

        if ($domain == "") continue;

        $url = "https://trustpositif.komdigi.go.id/welcome?domains=".$domain;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $data = curl_exec($ch);
        curl_close($ch);

        if (!$data) {
            $status = "ERROR CEK";
        }
        elseif (stripos($data, "Tidak Ada") !== false) {
            $status = "AMAN";
        }
        else {
            $status = "TERBLOKIR / INTERNET POSITIF";
        }

        echo "<p>$domain : <b>$status</b></p>";
    }

}
?>
