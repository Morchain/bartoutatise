<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Machine à sous Astérix</title>
  <?php include 'header.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/sanglier.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #222;
      color: white;
      margin: 0;
      padding: 0;
    }

    h1 {
      margin-top: 30px;
    }

    .slot-machine {
      margin: 50px auto;
      width: 300px;
      position: relative;
    }

    .slots {
      display: flex;
      justify-content: space-between;
      background: #444;
      padding: 20px;
      border-radius: 10px;
      border: 4px solid gold;
    }

    .slot {
      font-size: 40px;
      width: 60px;
      height: 60px;
      background: white;
      color: black;
      border-radius: 10px;
      line-height: 60px;
      font-weight: bold;
    }

    .lever {
      margin-top: 20px;
      font-size: 40px;
      cursor: pointer;
      user-select: none;
      transition: transform 0.2s ease;
      display: inline-block;
    }

    .lever:active {
      transform: rotate(20deg);
    }

    #result {
      margin-top: 20px;
      font-size: 20px;
    }
  </style>
</head>
<body>
<br>
  <br>

  <br>
  <br>
  <br><br>
  <br>

  <br>
  <br>
  <br>

  <h1>⚔️ Machine à sous Astérix 🛡️</h1>

  <div class="slot-machine">
    <div class="slots">
      <div class="slot" id="slot1">❓</div>
      <div class="slot" id="slot2">❓</div>
      <div class="slot" id="slot3">❓</div>
    </div>
    <div class="lever" onclick="pullLever()">🕹️</div>
  </div>

  <p id="result"></p>

  <script>
    const symbols = ['🛡️', '🐗', '🍗', '⚡', '💪', '🪨']; // Thème Astérix

    function getRandomSymbol() {
      return symbols[Math.floor(Math.random() * symbols.length)];
    }

    function pullLever() {
      const slot1 = document.getElementById("slot1");
      const slot2 = document.getElementById("slot2");
      const slot3 = document.getElementById("slot3");
      const result = document.getElementById("result");

      let spins = 10;
      let counter = 0;

      const spin = setInterval(() => {
        slot1.textContent = getRandomSymbol();
        slot2.textContent = getRandomSymbol();
        slot3.textContent = getRandomSymbol();
        counter++;
        if (counter >= spins) {
          clearInterval(spin);
          checkWin(slot1.textContent, slot2.textContent, slot3.textContent);
        }
      }, 100);
    }

    function checkWin(s1, s2, s3) {
      const result = document.getElementById("result");
      if (s1 === s2 && s2 === s3) {
        result.textContent = "🎉 PAR TOUTATIS ! JACKPOT GAULOIS ! 🎉";
      } else {
        result.textContent = "Pas de potion magique cette fois... 🍷";
      }
    }
  </script>

</body>
</html>
