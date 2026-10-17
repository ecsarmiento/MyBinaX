// === Lecture: Text → Binary ===
function showBinary() {
    const text = document.getElementById('asciiInput').value;
    let html = '';
    for (let ch of text) {
        const code = ch.charCodeAt(0);
        const bin = code.toString(2).padStart(8, '0');
        html += `<span style="display:inline-block; margin:0.3rem; padding:0.5rem 0.8rem; background:#dbeafe; border-radius:0.4rem;">
            <strong>${ch}</strong><br>
            ${code}<br>
            <code>${bin}</code>
        </span>`;
    }
    document.getElementById('binaryOutput').innerHTML = html || '<em>Start typing to see binary codes...</em>';
}

// === Calculator ===
function validateBinary(input) {
    input.value = input.value.replace(/[^01]/g, '');
}
function binToDec(bin) { return parseInt(bin, 2); }
function decToBin(dec) { return dec.toString(2); }
function calculate() {
    const b1 = document.getElementById('bin1').value;
    const b2 = document.getElementById('bin2').value;
    const op = document.getElementById('operation').value;
    if (!b1 || !b2) return alert('Enter both binary numbers');
    
    const d1 = binToDec(b1), d2 = binToDec(b2);
    let decRes, symbol;
    switch(op) {
        case 'add': decRes = d1 + d2; symbol = '+'; break;
        case 'subtract': decRes = d1 - d2; symbol = '−'; break;
        case 'multiply': decRes = d1 * d2; symbol = '×'; break;
    }
    const binRes = decToBin(Math.abs(decRes));
    document.getElementById('calcResult').innerHTML = `
        ${b1} ${symbol} ${b2} = ${decRes} (decimal)<br>
        Binary: ${decRes < 0 ? '-' : ''}${binRes}
    `;
}

// === Converter ===
function textBinaryConvert() {
    const text = document.getElementById('textToBin').value;
    let out = '';
    for (let ch of text) {
        out += ch.charCodeAt(0).toString(2).padStart(8,'0') + ' ';
    }
    document.getElementById('textBinResult').textContent = out || 'Result appears here...';
}
function decBinConvert() {
    const dec = document.getElementById('decInput').value;
    if (dec === '') return;
    document.getElementById('decBinResult').innerHTML = `<strong>Binary:</strong> ${Number(dec).toString(2)}`;
}
function binDecConvert() {
    const bin = document.getElementById('binInput').value.replace(/[^01]/g,'');
    document.getElementById('binInput').value = bin;
    if (!bin) return;
    document.getElementById('binDecResult').innerHTML = `<strong>Decimal:</strong> ${parseInt(bin,2)}`;
}

// === Games ===
let score1Val = 0, score2Val = 0, currentAns1 = 0, currentAns2 = '';

function generateGame1() {
    const bits = Array.from({length: 4+Math.floor(Math.random()*3)}, () => Math.random()>0.5 ? '1' : '0').join('');
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
        alert(`❌ Wrong! Answer was ${currentAns1}`);
    }
    document.getElementById('score1').textContent = score1Val;
    generateGame1();
}

function generateGame2() {
    const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const ch = letters[Math.floor(Math.random()*letters.length)];
    const bin = ch.charCodeAt(0).toString(2).padStart(8,'0');
    document.getElementById('asciiQuestion').textContent = bin;
    currentAns2 = ch;
    document.getElementById('game2Answer').value = '';
}
function checkGame2() {
    const ans = document.getElementById('game2Answer').value.toUpperCase();
    if (ans === currentAns2) {
        score2Val++;
        alert('✅ Correct!');
    } else {
        alert(`❌ Wrong! Answer was ${currentAns2}`);
    }
    document.getElementById('score2').textContent = score2Val;
    generateGame2();
}
