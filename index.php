<?php include 'users.php'; requireLogin(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Learning Hub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>

<section class="hero">
    <h1>Hello, <span class="game-name"><?= getGameName() ?></span>! 👋</h1>
    <p>Master binary numbers, ASCII codes & digital logic — learn by doing!</p>
    <div class="card-grid">
        <a href="lecture.php" class="card">
            <h3>📖 Learn & Understand</h3>
            <p>Binary basics, place values, ASCII table & how computers store text</p>
        </a>
        <a href="calculator.php" class="card">
            <h3>🧮 Binary Calculator</h3>
            <p>Add, subtract, multiply — see binary & decimal results</p>
        </a>
        <a href="converter.php" class="card">
            <h3>🔄 All-in-One Converter</h3>
            <p>Text ↔ Binary · Decimal ↔ Binary</p>
        </a>
        <a href="games.php" class="card">
            <h3>🎯 Practice Games</h3>
            <p>Earn points & track your progress!</p>
        </a>
    </div>
</section>
</body>
</html>
