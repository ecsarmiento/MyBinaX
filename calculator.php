<?php include 'users.php'; requireLogin(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<section class="tool-container">
    <h1>🧮 Binary Calculator</h1>
    <div class="calculator-box">
        <input type="text" id="bin1" placeholder="e.g. 1010" oninput="validateBinary(this)">
        <select id="operation">
            <option value="add">+ Add</option>
            <option value="subtract">− Subtract</option>
            <option value="multiply">× Multiply</option>
        </select>
        <input type="text" id="bin2" placeholder="e.g. 1101" oninput="validateBinary(this)">
        <button onclick="calculate()">Calculate</button>
        <div id="calcResult" class="result-display"></div>
    </div>
</section>
<script src="script.js"></script>
</body>
</html>
