<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Chasse au Sanglier 🐗</title>
  <?php include 'header.php'; ?>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      background: url('https://images.unsplash.com/photo-1508610048659-a06b669e6003?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Arial', sans-serif;
      color: #FFD700;
      text-align: center;
      text-shadow: 1px 1px 3px #000000cc;
    }

    h1 {
      margin-top: 20px;
      font-size: 2em;
      text-shadow: 2px 2px 5px #000;
    }

    .game-info {
      margin: 10px;
      font-size: 1.2em;
      color: #FFD700;
      text-shadow: 1px 1px 2px #000000cc;
    }

    #game-area {
      position: relative;
      margin: 20px auto;
      width: 90vw;
      max-width: 800px;
      height: 400px;
      border: 4px solid gold;
      background-color: rgba(0, 0, 0, 0.5);
      overflow: hidden;
      border-radius: 10px;
    }

    .boar {
      position: absolute;
      font-size: 40px;
      cursor: pointer;
      user-select: none;
      transition: transform 0.1s;
    }

    .boar:active {
      transform: scale(1.2);
    }

    #start-btn {
      background-color: #ffcc00;
      border: none;
      padding: 10px 20px;
      font-size: 1em;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 20px;
      color: #663300;
      font-weight: bold;
    }

    #start-btn:hover {
      background-color: #ffdd33;
      color: #331a00;
    }
  </style>
</head>
<body>

  <h1>🐗 Chasse au Sanglier ! 🍗</h1>

  <div class="game-info">
    ⏱️ Temps : <span id="timer">30</span>s | 🎯 Score : <span id="score">0</span>
  </div>

  <div id="game-area"></div>

  <button id="start-btn" onclick="startGame()">Commencer la chasse</button>

  <script>
    const gameArea = document.getElementById('game-area');
    const scoreDisplay = document.getElementById('score');
    const timerDisplay = document.getElementById('timer');
    const startBtn = document.getElementById('start-btn');

    let score = 0;
    let timeLeft = 30;
    let gameInterval;
    let boarInterval;
    let difficulty = 1200;
    let gameRunning = false;

    function startGame() {
      if (gameRunning) return;
      gameRunning = true;

      score = 0;
      timeLeft = 30;
      difficulty = 1200;
      scoreDisplay.textContent = score;
      timerDisplay.textContent = timeLeft;
      gameArea.innerHTML = '';
      startBtn.disabled = true;

      gameInterval = setInterval(() => {
        timeLeft--;
        timerDisplay.textContent = timeLeft;
        if (timeLeft <= 0) {
          endGame();
        }

        if (timeLeft % 5 === 0 && difficulty > 300) {
          difficulty -= 200;
          resetBoarInterval();
        }
      }, 1000);

      boarInterval = setInterval(spawnBoar, difficulty);
    }

    function resetBoarInterval() {
      clearInterval(boarInterval);
      if (gameRunning) {
        boarInterval = setInterval(spawnBoar, difficulty);
      }
    }

    function endGame() {
      gameRunning = false;
      clearInterval(gameInterval);
      clearInterval(boarInterval);
      startBtn.disabled = false;
      alert("🛑 Temps écoulé ! Score final : " + score);
      gameArea.innerHTML = '';
    }

    function spawnBoar() {
      if (!gameRunning) return;

      const boar = document.createElement('div');
      boar.classList.add('boar');
      boar.textContent = '🐗';

      const maxX = gameArea.clientWidth - 50;
      const maxY = gameArea.clientHeight - 50;
      const x = Math.random() * maxX;
      const y = Math.random() * maxY;

      boar.style.left = `${x}px`;
      boar.style.top = `${y}px`;

      boar.addEventListener('click', () => {
        score++;
        scoreDisplay.textContent = score;
        boar.remove();
      });

      gameArea.appendChild(boar);

      setTimeout(() => {
        boar.remove();
      }, difficulty - 200);
    }
  </script>

</body>
</html>
