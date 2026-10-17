<?php include 'users.php'; requireLogin(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary & ASCII Lesson</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<section class="lesson-container">
    <h1>📖 Understanding Binary & ASCII</h1>

    <div class="lesson-section">
        <h2>1. What is Binary?</h2>
        <p>Computers use only <strong>0 and 1</strong> — called <em>bits</em>. Everything inside is combinations of these two digits.</p>
        <div class="example-box">
            <p>Decimal: 0 1 2 3 4 5 6 7 8 9 ...</p>
            <p>Binary:  0 1 10 11 100 101 110 111 1000 ...</p>
            <p>Place values: <code>128  64  32  16  8  4  2  1</code></p>
        </div>
    </div>

    <div class="lesson-section">
        <h2>2. What is ASCII?</h2>
        <p>ASCII assigns every character a number. That number is stored in binary.</p>
        <div class="example-box">
            <table class="ascii-table">
                <tr><th>Char</th><th>Decimal</th><th>8-bit Binary</th></tr>
                <tr><td>A</td><td>65</td><td>01000001</td></tr>
                <tr><td>a</td><td>97</td><td>01100001</td></tr>
                <tr><td>0</td><td>48</td><td>00110000</td></tr>
                <tr><td>!</td><td>33</td><td>00100001</td></tr>
            </table>
        </div>
    </div>

    <div class="lesson-section">
        <h2>3. How It Works</h2>
        <p>Type A → ASCII 65 → Binary 01000001 → stored/transmitted → converted back → displayed as A</p>
    </div>

    <div class="lesson-section">
        <h2>4. Try It!</h2>
        <input type="text" id="asciiInput" placeholder="Type something..." oninput="showBinary()">
        <div id="binaryOutput" class="output-box"></div>
    </div>
</section>
<script src="script.js"></script>
</body>
</html>
