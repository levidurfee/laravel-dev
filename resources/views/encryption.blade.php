<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encryption</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<h1>Encryption</h1>
<h2>Key</h2>
<p>
    <pre>{{ $key }}</pre>
</p>
<h2>Input</h2>
<input type="text" name="input" id="input">
<button id="encrypt">encrypt</button>

<h2>Output</h2>
<input type="text" id="output">

<button id="decrypt">decrypt</button>
<h2>Result</h2>
<input type="text" id="result">

<script src="/js/app.js"></script>
<script>

$(document).ready(function() {
    $("#encrypt").click(function() {
        var input = $("#input").val();
        encrypt(input);
    });

    $("#decrypt").click(function() {
        var input = $("#output").val();
        decrypt(input);
    });
});

key = aesjs.utils.hex.toBytes('{{ $key }}');

function encrypt(text) {
    var textBytes = aesjs.utils.utf8.toBytes(text);
    var aesCtr = new aesjs.ModeOfOperation.ctr(key, new aesjs.Counter(5));
    var encryptedBytes = aesCtr.encrypt(textBytes);
    var encryptedHex = aesjs.utils.hex.fromBytes(encryptedBytes);

    $("#output").val(encryptedHex);
}

function decrypt(text) {
    var encryptedBytes = aesjs.utils.hex.toBytes(text);
    var aesCtr = new aesjs.ModeOfOperation.ctr(key, new aesjs.Counter(5));
    var decryptedBytes = aesCtr.decrypt(encryptedBytes);

    // Convert our bytes back into text
    var decryptedText = aesjs.utils.utf8.fromBytes(decryptedBytes);
    $("#result").val(decryptedText);
}

</script>
</body>
</html>
