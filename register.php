<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Controleer op fouten
    if (empty($email) || empty($password) || empty($password_confirm)) {
        $error = "Alle velden zijn verplicht!";
    } elseif ($password !== $password_confirm) {
        $error = "De wachtwoorden komen niet overeen!";
    } else {
        // Wachtwoord hashen met password_hash() inclusief salt
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Bestandspad om gegevens op te slaan
        $filePath = 'users_data.json';

        // Controleer of het bestand al bestaat en lees de gegevens
        $users = [];
        if (file_exists($filePath)) {
            $users = json_decode(file_get_contents($filePath), true) ?? [];
        }

        // Controleer op dubbele e-mail
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $error = "Dit e-mailadres is al geregistreerd!";
                break;
            }
        }

        // Als er geen fout is, sla de gegevens op
        if (!isset($error)) {
            $users[] = [
                'email' => $email,
                'password' => $hashedPassword
            ];

            if (file_put_contents($filePath, json_encode($users, JSON_PRETTY_PRINT))) {
                $_SESSION['success'] = "Registratie succesvol! Log nu in.";
                header("Location: login.php");
                exit;
            } else {
                $error = "Er ging iets mis bij het opslaan van de gegevens. Probeer het opnieuw.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Registreren</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="password_confirm">Bevestig Wachtwoord:</label><br>
        <input type="password" id="password_confirm" name="password_confirm" required><br>
        <button type="submit">Registreren</button>
        <div class="link">Al een account? <a href="login.php">Inloggen</a></div>
</div>
</form>
</body>
</html>
