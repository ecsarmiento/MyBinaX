<?php include 'users.php'; requireLogin(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter Toolbox</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<section class="tool-container">
    <h1>🔄 Converter Toolbox</h1>
    <div class="converter-group">
        <h3>Text ↔ Binary</h3>
        <input type="text" id="textToBin" placeholder="Enter text..." oninput="textBinaryConvert()">
        <div id="textBinResult" class="output-box"></div>
    </div>
    <div class="converter-group">
        <h3>Decimal ↔ Binary</h3>
        <input type="number" id="decInput" placeholder="Enter decimal..." oninput="decBinConvert()">
        <div id="decBinResult" class="output-box"></div>
    </div>
    <div class="converter-group">
        <h3>Binary ↔ Decimal</h3>
        <input type="text" id="binInput" placeholder="Enter binary..." oninput="binDecConvert()">
        <div id="binDecResult" class="output-box"></div>
    </div>
</section>
<script src="script.js"></script>
</body>
</html>
