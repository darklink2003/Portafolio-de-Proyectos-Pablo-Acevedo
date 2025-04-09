document.addEventListener('DOMContentLoaded', () => {
    const choices = document.querySelectorAll('.choice');
    const resultDisplay = document.getElementById('result');
    const computerChoiceDisplay = document.getElementById('computer-choice');
    const computerHand = document.getElementById('computer-hand');
    const playerScoreDisplay = document.getElementById('player-score');
    const computerScoreDisplay = document.getElementById('computer-score');
    const resetBtn = document.getElementById('reset-btn');
    const countdownDisplay = document.getElementById('countdown');
    const startBtn = document.getElementById('start-btn');
    const choicesContainer = document.querySelector('.choices');
    
    let playerScore = 0;
    let computerScore = 0;
    let gameActive = false;
    let animationInterval;
    
    // Emojis para las opciones
    const choiceEmojis = {
        rock: '✊',
        paper: '✋',
        scissors: '✌'
    };
    
    // Event listeners
    startBtn.addEventListener('click', initGame);
    resetBtn.addEventListener('click', resetGame);
    
    choices.forEach(choice => {
        choice.addEventListener('click', () => {
            if (gameActive) {
                const playerChoice = choice.dataset.choice;
                playGame(playerChoice);
            }
        });
    });
    
    function initGame() {
        startBtn.disabled = true;
        gameActive = false;
        computerHand.style.display = 'block';
        computerChoiceDisplay.classList.remove('reveal');
        computerChoiceDisplay.textContent = '';
        resultDisplay.textContent = '';
        
        // Iniciar cuenta regresiva
        startCountdown();
    }
    
    function startCountdown() {
        let count = 3;
        countdownDisplay.textContent = count;
        countdownDisplay.style.display = 'block';
        
        // Opciones para la animación
        const options = ['✊', '✋', '✌'];
        let optionIndex = 0;
        computerHand.textContent = options[optionIndex];
        computerHand.classList.add('shake');
        
        // Animación rápida de cambio de opciones
        animationInterval = setInterval(() => {
            optionIndex = (optionIndex + 1) % options.length;
            computerHand.textContent = options[optionIndex];
        }, 100);
        
        const countdownInterval = setInterval(() => {
            count--;
            if (count > 0) {
                countdownDisplay.textContent = count;
                computerHand.classList.remove('shake');
                void computerHand.offsetWidth; // Trigger reflow
                computerHand.classList.add('shake');
            } else {
                // Detener ambas animaciones
                clearInterval(animationInterval);
                clearInterval(countdownInterval);
                
                countdownDisplay.textContent = '¡Juega!';
                setTimeout(() => {
                    countdownDisplay.style.display = 'none';
                    computerHand.classList.remove('shake');
                    gameActive = true;
                    choicesContainer.classList.add('active');
                }, 800);
            }
        }, 1000);
    }
    
    function playGame(playerChoice) {
        if (!gameActive) return;
        
        gameActive = false;
        choicesContainer.classList.remove('active');
        startBtn.disabled = false;
        
        // Elección aleatoria de la computadora
        const choices = ['rock', 'paper', 'scissors'];
        const computerChoice = choices[Math.floor(Math.random() * 3)];
        
        // Ocultar mano y mostrar elección de computadora
        computerHand.style.display = 'none';
        computerChoiceDisplay.textContent = choiceEmojis[computerChoice];
        computerChoiceDisplay.classList.add('reveal');
        
        // Determinar el resultado
        let result;
        
        if (playerChoice === computerChoice) {
            result = "¡Empate!";
        } else {
            switch (playerChoice) {
                case 'rock':
                    result = (computerChoice === 'scissors') ? "¡Ganaste! 🎉" : "¡Perdiste! 😢";
                    break;
                case 'paper':
                    result = (computerChoice === 'rock') ? "¡Ganaste! 🎉" : "¡Perdiste! 😢";
                    break;
                case 'scissors':
                    result = (computerChoice === 'paper') ? "¡Ganaste! 🎉" : "¡Perdiste! 😢";
                    break;
            }
        }
        
        // Actualizar el resultado
        resultDisplay.textContent = result;
        
        // Actualizar el marcador
        if (result.includes("Ganaste")) {
            playerScore++;
            playerScoreDisplay.textContent = playerScore;
        } else if (result.includes("Perdiste")) {
            computerScore++;
            computerScoreDisplay.textContent = computerScore;
        }
    }
    
    function resetGame() {
        // Limpiar intervalos si existen
        if (animationInterval) clearInterval(animationInterval);
        
        playerScore = 0;
        computerScore = 0;
        playerScoreDisplay.textContent = '0';
        computerScoreDisplay.textContent = '0';
        resultDisplay.textContent = '';
        computerChoiceDisplay.textContent = '';
        computerChoiceDisplay.classList.remove('reveal');
        computerHand.style.display = 'block';
        computerHand.textContent = '🤖';
        computerHand.classList.remove('shake');
        countdownDisplay.style.display = 'none';
        choicesContainer.classList.remove('active');
        startBtn.disabled = false;
        gameActive = false;
    }
});