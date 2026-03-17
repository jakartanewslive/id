<!DOCTYPE html>
<html>
<head>
<title>Live Result</title>
<style>
body { background:#0f172a; color:#fff; font-family:Arial; }
.container { display:flex; gap:20px; flex-wrap:wrap; padding:20px; }
.card { border:2px solid #22c55e; width:300px; border-radius:10px; }
.header { background:#22c55e; padding:10px; text-align:center; }
.row { display:flex; justify-content:space-between; padding:10px; }
.grid { display:grid; grid-template-columns:repeat(4,1fr); gap:5px; padding:10px; }
.box { background:#1f2933; padding:5px; text-align:center; }
</style>
</head>

<body>

<h2 style="text-align:center;">🔥 LIVE RESULT</h2>

<select onchange="changeMarket(this.value)">
  <option value="HK">Hongkong</option>
  <option value="SGP">Singapore</option>
  <option value="SDY">Sydney</option>
</select>

<div class="container">
<div class="card">
<div class="header" id="marketTitle">HK</div>

<div class="row">1st <span id="p1">...</span></div>
<div class="row">2nd <span id="p2">...</span></div>
<div class="row">3rd <span id="p3">...</span></div>

<h4>Starter</h4>
<div class="grid" id="starter"></div>

<h4>Consolation</h4>
<div class="grid" id="consolation"></div>

</div>
</div>

<script>
let currentMarket = "HK";

function changeMarket(m){
    currentMarket = m;
    document.getElementById("marketTitle").innerText = m;
    loadData();
}

async function loadData() {
    let res = await fetch("api.php?market="+currentMarket);
    let data = await res.json();

    if(!data) return;

    document.getElementById("p1").innerText = data.prize1;
    document.getElementById("p2").innerText = data.prize2;
    document.getElementById("p3").innerText = data.prize3;

    let starter = JSON.parse(data.starter || "[]");
    document.getElementById("starter").innerHTML =
        starter.map(x => `<div class="box">${x}</div>`).join("");

    let cons = JSON.parse(data.consolation || "[]");
    document.getElementById("consolation").innerHTML =
        cons.map(x => `<div class="box">${x}</div>`).join("");
}

setInterval(loadData, 3000);
loadData();
</script>

</body>
</html>