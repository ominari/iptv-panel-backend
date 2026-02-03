<?php
require "auth.php";
$configFile = "data/config.json";
$config = json_decode(file_get_contents($configFile), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $config["xtream_server"] = $_POST["server"];
    $config["xtream_user"] = $_POST["xuser"];
    $config["xtream_pass"] = $_POST["xpass"];
    file_put_contents($configFile, json_encode($config, JSON_PRETTY_PRINT));
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/style.css">
<title>Update</title>
</head>
<body>
<div class="box">
<h2>Update Xtream Info</h2>
<form method="post">
<input name="server" placeholder="Server URL" value="<?= $config["xtream_server"] ?>">
<input name="xuser" placeholder="Xtream Username" value="<?= $config["xtream_user"] ?>">
<input name="xpass" placeholder="Xtream Password" value="<?= $config["xtream_pass"] ?>">
<button>Save</button>
</form>
</div>
</body>
</html>
