// === Lecture: Text → Binary ===
function showBinary() {
    const text = document.getElementById('asciiInput').value;
    const output = document.getElementById('binaryOutput');
    if (!text) {
        output.innerHTML = 'Start typing to see binary codes...';
        return;
    }
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
    output.innerHTML = html;
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
    if (!b1 || !b2) {
        document.getElementById('calcResult').textContent = 'Enter both binary numbers first';
        return;
    }
    
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
