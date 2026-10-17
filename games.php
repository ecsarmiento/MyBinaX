<?php include 'users.php'; requireLogin();

$userId = $_SESSION['user_id'];
$userScores = getUserScores($userId);
$game1Best = 0;
$game2Best = 0;
foreach ($userScores as $s) {
    if ($s['game_name'] === 'binary_race' && $s['score'] > $game1Best) $game1Best = $s['score'];
    if ($s['game_name'] === 'ascii_codebreaker' && $s['score'] > $game2Best) $game2Best = $s['score'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Games</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<section class="games-container">
    <h1>🎯 Binary Games — Ready, <?= getGameName() ?>?</h1>

    <div class="game-card">
        <h3>🎮 Game 1: Binary → Decimal Race</h3>
        <p>Convert binary to decimal! Best streak: <strong><?= $game1Best ?></strong></p>
        <div class="question-box">
            <p>What is this number?</p>
            <code id="binQuestion" class="big-binary">1010</code>
        </div>
        <input type="number" id="game1Answer" placeholder="Your answer...">
        <button onclick="checkGame1()">Submit & Next</button>
        <p>Current Streak: <span id="score1">0</span></p>
    </div>

    <div class="game-card">
        <h3>🎮 Game 2: ASCII Code Breaker</h3>
        <p>Decode binary to a letter! Best streak: <strong><?= $game2Best ?></strong></p>
        <div class="question-box">
            <p>This binary = which uppercase letter?</p>
            <code id="asciiQuestion" class="big-binary">01000001</code>
        </div>
        <input type="text" id="game2Answer" maxlength="1" placeholder="One letter...">
        <button onclick="checkGame2()">Submit & Next</button>
        <p>Current Streak: <span id="score2">0</span></p>
    </div>
</section>

<script src="script.js"></script>
<script>
let score1Val = 0, score2Val = 0;
let currentAns1 = 0, currentAns2 = '';
const userId = '<?= $userId ?>';

function generateGame1() {
    const len = 4 + Math.floor(Math.random() * 3);
    let bits = '';
    for (let i = 0; i < len; i++) bits += Math.random() > 0.5 ? '1' : '0';
    document.getElementById('binQuestion').textContent = bits;
    currentAns1 = parseInt(bits, 2);
    document.getElementById('game1Answer').value = '';
}

function checkGame1() {
    const ans = parseInt(document.getElementById('game1Answer').value);
    if (ans === currentAns1) {
        score1Val++;
        alert('✅ Correct!');
    } else {
        alert(`❌ Answer was ${currentAns1}`);
        // Save score on reset
        fetch('save_score.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'game=binary_race&score=' + score1Val
        });
        score1Val = 0;
    }
    document.getElementById('score1').textContent = score1Val;
    generateGame1();
}

function generateGame2() {
    const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const ch = letters[Math.floor(Math.random() * letters.length)];
    currentAns2 = ch;
    document.getElementById('asciiQuestion').textContent = ch.charCodeAt(0).toString(2).padStart(8,'0');
    document.getElementById('game2Answer').value = '';
}

function checkGame2() {
    const ans = (document.getElementById('game2Answer').value || '').toUpperCase();
    if (ans === currentAns2) {
        score2Val++;
        alert('✅ Correct!');
    } else {
        alert(`❌ Answer was ${currentAns2}`);
        fetch('save_score.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'game=ascii_codebreaker&score=' + score2Val
        });
        score2Val = 0;
    }
    document.getElementById('score2').textContent = score2Val;
    generateGame2();
}

generateGame1();
generateGame2();
</script>
</body>
</html>
