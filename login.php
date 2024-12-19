<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Controleer op fouten
    if (empty($email) || empty($password)) {
        $error = "Alle velden zijn verplicht!";
    } else {
        // Bestandspad om gegevens op te slaan
        $filePath = 'users_data.json';

        // Controleer of het bestand al bestaat en lees de gegevens
        $users = [];
        if (file_exists($filePath)) {
            $users = json_decode(file_get_contents($filePath), true) ?? [];
        }

        // Controleer of de gebruiker bestaat
        $userFound = false;
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $userFound = true;
                // Controleer wachtwoord
                if (password_verify($password, $user['password'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $error = "Onjuiste wachtwoord!";
                }
                break;
            }
        }

        if (!$userFound) {
            $error = "E-mailadres niet gevonden!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Inloggen</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Inloggen</button>
    </form>
    <div class="link">Nog geen account? <a href="register.php">Registreren</a></div>
</div>
</body>
</html>
