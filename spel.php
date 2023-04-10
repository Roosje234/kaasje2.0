<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title>Kaas Spel</title>
    <style>
      #kaas {
        width: 50px;
        height: 50px;
        position: absolute;
      }
    </style>
  </head>
  <body>
    <?php require_once('header.php')?>
    <h1>Kaas Spel</h1>
    <p>Vang zoveel mogelijk kaas voordat ze van het scherm verdwijnen!</p>
    <div id="game-board">
      <img id="kaas" name="kaas" src="img/kaasje.png">
    </div>
    
      <script>
        // Verkrijg referentie naar de kaas
        const kaas = document.getElementById('kaas');
        
        // Houdt bij hoeveel kaas er is gevangen
        let score = 0;
        
        // Beweeg de kaas
        function beweegKaas() {
          // Verplaats de kaas een willekeurige afstand naar links of rechts
          const beweging = Math.floor(Math.random() * 40) - 20;
          let links = parseInt(kaas.style.left);
          links += beweging;
          kaas.style.left = `${links}px`;
          
          // Verplaats de kaas omhoog op het scherm
          let top = parseInt(kaas.style.top);
          top -= 5;
          kaas.style.top = `${top}px`;
          
          // Controleer of de kaas van het scherm is verdwenen
          if (top < -50) {
            resetKaas();
          }
        }
        
        // Reset de positie van de kaas
        function resetKaas() {
          // Stel de positie van de kaas willekeurig in binnen het spelbord
          let links = Math.floor(Math.random() * (window.innerWidth - 50));
          kaas.style.left = `${links}px`;
          kaas.style.top = '100%';
        }
        
        // Voeg een click event listener toe aan de kaas
        kaas.addEventListener('click', () => {
          // Tel de score op
          score++;
          document.getElementById('score').innerText = score;
          
          // Reset de positie van de kaas
          resetKaas();
        });
        
        // Start de game loop
        setInterval(beweegKaas, 50);
      </script>
  </body>
</html>
