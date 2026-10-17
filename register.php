<?php include 'users.php';

if (isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$error = $success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $gameName = trim($_POST['game_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$fullName || !$gameName || !$email || !$password) {
        $error = '⚠️ All fields are required';
    } elseif (strlen($password) < 4) {
        $error = '⚠️ Password must be at least 4 characters';
    } else {
        $result = createUser($fullName, $gameName, $email, $password);
        if ($result === true) {
            $success = '✅ Account created! <a href="login.php">Login here →</a>';
        } elseif ($result === 'email_exists') {
            $error = '⚠️ This email is already registered';
        } else {
            $error = '⚠️ This Game Name is taken — try another';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Binary Hub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">
    <div class="auth-box">
        <h2>🎮 Join Binary Explorer</h2>
        <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
        <?php if ($success): ?><div class="success"><?= $success ?></div><?php endif; ?>
        <form method="POST">
            <input type="text" name="full_name" placeholder="Your Real Name" required>
            <input type="text" name="game_name" placeholder="Your Game Nickname" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password (min 4 chars)" required>
            <button type="submit">Create Account</button>
        </form>
        <p>Already registered? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
