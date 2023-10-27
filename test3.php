<!DOCTYPE html>
<html>
<head>
    <title>Yazma Eğitimi</title>
</head>
<body>
<div>
    <p id="originalText">Bu bir öğrenme örneğidir.</p>
    <textarea id="userInput" placeholder="Metni buraya yazın"></textarea>
</div>

<script>
    // Başlangıçtaki metin ve textarea
    var originalText = document.getElementById("originalText").textContent;
    var userInput = document.getElementById("userInput");

    // Başlangıçta kontrol edilecek metni ayarla
    userInput.value = originalText;

    // Metin güncellendiğinde kontrol et
    userInput.addEventListener("input", function() {
        checkText();
    });

    // Metni kontrol eden fonksiyon
    function checkText() {
        var userText = userInput.value;

        if (userText === originalText) {
            userInput.classList.remove("wrong");
            userInput.classList.add("correct");
        } else {
            userInput.classList.remove("correct");
            userInput.classList.add("wrong");
        }
    }
</script>

<style>
    /* Doğru ve yanlış metinleri renklendir */
    .correct {
        background-color: lightgreen;
    }

    .wrong {
        background-color: #ff9999;
    }
</style>
</body>
</html>
