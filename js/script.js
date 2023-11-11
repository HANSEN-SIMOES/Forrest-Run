
   function updatePoints() {
      var totalPoints = 30;
      var strength = parseInt(document.getElementById("strength").value);
      var dexterity = parseInt(document.getElementById("dexterity").value);
      var constitution = parseInt(document.getElementById("constitution").value);
      var intelligence = parseInt(document.getElementById("intelligence").value);
      var wisdom = parseInt(document.getElementById("wisdom").value);
      var charisma = parseInt(document.getElementById("charisma").value);
  
      var calculateCost = function (value) {
        if (value <= 8) return 0;
        else if (value <= 12) return value - 8;
        else if (value == 13) return 5;
        else if (value == 14) return 7;
        else if (value == 15) return 9;
        else return 0;
      };
  
      var usedPoints =
        calculateCost(strength) +
        calculateCost(dexterity) +
        calculateCost(constitution) +
        calculateCost(intelligence) +
        calculateCost(wisdom) +
        calculateCost(charisma);
  
      var remainingPoints = totalPoints - usedPoints;
  
      document.getElementById("remaining-points").value = remainingPoints;
  
      // Habilita ou desabilita os campos de acordo com os pontos restantes
      document.getElementById("strength").max = Math.min(strength + remainingPoints, 15);
      document.getElementById("dexterity").max = Math.min(dexterity + remainingPoints, 15);
      document.getElementById("constitution").max = Math.min(constitution + remainingPoints, 15);
      document.getElementById("intelligence").max = Math.min(intelligence + remainingPoints, 15);
      document.getElementById("wisdom").max = Math.min(wisdom + remainingPoints, 15);
      document.getElementById("charisma").max = Math.min(charisma + remainingPoints, 15);
    }
  
    // Adiciona os listeners para os eventos de mudança nos campos
    document.getElementById("strength").addEventListener("input", updatePoints);
    document.getElementById("dexterity").addEventListener("input", updatePoints);
    document.getElementById("constitution").addEventListener("input", updatePoints);
    document.getElementById("intelligence").addEventListener("input", updatePoints);
    document.getElementById("wisdom").addEventListener("input", updatePoints);
    document.getElementById("charisma").addEventListener("input", updatePoints);
  
    // Chama a função inicialmente para configurar os campos corretamente
    updatePoints();
