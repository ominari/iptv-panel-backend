<?php
session_start();
$config = json_decode(file_get_contents("data/config.json"), true);
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        $_POST["username"] === $config["panel_user"] &&
        $_POST["password"] === $config["panel_pass"]
    ) {
        $_SESSION["logged_in"] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/style.css">
<title>IPTV Panel</title>
</head>
<body>
<div class="box">
<h2>IPTV PANEL</h2>
<form method="post">
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button>Login</button>
<p class="error"><?= $error ?></p>
</form>
</div>
</body>
</html>
