<?php
require "auth.php";
$config = json_decode(file_get_contents("data/config.json"), true);
$status = "Not configured";

if ($config["xtream_user"]) {
    $url = $config["xtream_server"] . "/player_api.php?username="
         . $config["xtream_user"] . "&password=" . $config["xtream_pass"];
    $json = @file_get_contents($url);
    if ($json) {
        $data = json_decode($json, true);
        $status = $data["user_info"]["status"] ?? "Unknown";
        $expire = date("Y-m-d", $data["user_info"]["exp_date"]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/style.css">
<title>Dashboard</title>
</head>
<body>
<div class="box">
<h2>Dashboard</h2>

<div class="card">
<b>Server (DNS)</b>
<p><?= htmlspecialchars($config["xtream_server"]) ?></p>
</div>

<div class="card">
<b>Status</b>
<p><?= $status ?? "N/A" ?></p>
<p>Expiry: <?= $expire ?? "N/A" ?></p>
</div>

<a href="update.php">Update Credentials</a><br><br>
<a class="logout" href="logout.php">Logout</a>
</div>
</body>
</html>
