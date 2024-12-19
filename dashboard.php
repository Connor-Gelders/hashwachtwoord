<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Welkom, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="200" height="200"
         style="display: block; margin: 0 auto;">
        <circle cx="50" cy="50" r="5" fill="red">
            <animate attributeName="r" from="5" to="50" dur="1s" repeatCount="indefinite"/>
            <animate attributeName="opacity" from="1" to="0" dur="1s" repeatCount="indefinite"/>
        </circle>
        <circle cx="50" cy="50" r="5" fill="blue">
            <animate attributeName="r" from="5" to="40" dur="1.2s" repeatCount="indefinite"/>
            <animate attributeName="opacity" from="1" to="0" dur="1.2s" repeatCount="indefinite"/>
        </circle>
        <circle cx="50" cy="50" r="5" fill="yellow">
            <animate attributeName="r" from="5" to="30" dur="1.5s" repeatCount="indefinite"/>
            <animate attributeName="opacity" from="1" to="0" dur="1.5s" repeatCount="indefinite"/>
        </circle>
    </svg>

    <div class="link"><a href="logout.php">Uitloggen</a></div>
</div>
</body>
</html>
