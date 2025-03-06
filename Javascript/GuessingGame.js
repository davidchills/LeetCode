class GuessingGame {
	constructor() {
		this.minGenNum = 0;
		this.maxGenNum = 100;
		this.guessesMax = 10;
		this.guessesMade = 0;
		this.numOfWins = 0;
		this.numOfLosses = 0;
		this.randomNumber = 0;
		this.feedbackNumberOfGuessesText = document.getElementById("feedbackNumberOfGuesses");
		this.instructionsTextElement = document.getElementById("instructions");
		this.inputField = document.getElementById("numberInput");
		this.feedbackElement = document.getElementById("feedback");
		this.fetchFromLocal();
		this.setInstructions();
		this.addEventHandlers();
		this.enabledInput();
		this.inputField.value = "";
		this.inputField.focus();
	}
	
	addEventHandlers() {
		this.inputField.addEventListener("keydown", function(event) {
			if (event.key === "Enter") { handleNumberInput(); }
		});
		document.getElementById("sendButton").addEventListener("click", game.handleNumberInput);
		document.getElementById("sendRest").addEventListener("click", game.reset);
	}
	
	setInstructions() {
		this.instructionsTextElement.textContent = `Guess a number between ${this.minGenNum} and ${this.maxGenNum}`;
	}
	
	disableInput() {
		this.inputField.setAttribute("disabled", true);
		document.getElementById("sendButton").setAttribute("disabled", true);
	}
	
	enabledInput() {
		this.inputField.setAttribute("disabled", "");
		document.getElementById("sendButton").setAttribute("disabled", true);
	}
	
	handleNumberInput() {
		let userGuess = parseInt(this.inputField.value, 10);
		// Bad inpit from user
		if (isNaN(userGuess) || userGuess < this.minGenNum || userGuess > this.maxGenNum) {
			this.feedbackElement.textContent = `Please enter a valid number between ${this.minGenNum} and ${this.maxGenNum}.`;
			this.feedbackElement.style.color = "red";
			this.inputField.focus();
			return;
		}	
		
		this.guessesMade++;
		
		// Exceeded the number of guesses allowed.
		if (this.guessesMade > this.guessesMax) {
			this.numOfLosses++;
			this.saveToLocal();
			//this.reset();
			this.disableInput();
			this.feedbackElement.textContent = `I'm sorry, you lost. Exceeded the max (${this.guessesMax}) number of guesses.`;;
		}
		
		
		if (userGuess > this.randomNumber) {
			this.feedbackElement.textContent = `Your guess of ${userGuess}, is Too high! Try again.`;
			this.feedbackElement.style.color = "orange";
		} 
		else if (userGuess < this.randomNumber) {
			this.feedbackElement.textContent = `Your guess of ${userGuess}, is Too low! Try again.`;
			this.feedbackElement.style.color = "blue";
		} 
		else {
			this.numOfWins++;
			this.saveToLocal();
			this.reset();
			this.feedbackElement.textContent = `Your guess of ${userGuess}, is Correct! You guessed the number!`;
			this.feedbackElement.style.color = "green";
		}	
		this.feedbackNumberOfGuessesText.textContent = `You have made ${this.guessesMade} of ${this.guessesMax} guesses allowed.`;
		this.inputField.value = "";
		this.inputField.focus();
	}
	
	saveToLocal() {
		const data = {};
		data.minGenNum = this.minGenNum;
		data.maxGenNum = this.maxGenNum;
		data.guessesMax = this.guessesMax;
		data.guessesMade = this.guessesMade;
		data.numOfWins = this.numOfWins;
		data.numOfLosses = this.numOfLosses;
		data.randomNumber = this.randomNumber;
		localStorage.setItem("stats", JSON.stringify(data));
	}
	
	fetchFromLocal() {
		if (!localStorage.getItem("stats")) {
			// Just use default values, but with a new random number
			this.genRandomNumber();
		} 
		else {
			const data = JSON.parse(localStorage.getItem("stats"));
			this.minGenNum = data.minGenNum;
			this.maxGenNum = data.maxGenNum;
			this.guessesMax = data.guessesMax;
			this.guessesMade = data.guessesMade;
			this.numOfWins = data.numOfWins;
			this.numOfLosses = data.numOfLosses;
			this.randomNumber = data.randomNumber;
			this.inputField.setAttribute("min", this.minGenNum);
			this.inputField.setAttribute("max", this.maxGenNum);
			this.inputField.setAttribute("placeholder", `From ${this.minGenNum} To ${this.maxGenNum}`);
		}		
	}
	
	reset() {
		this.genRandomNumber(); 
		this.guessesMade = 0;
		this.saveToLocal();
		this.feedbackNumberOfGuessesText.textContent = "";
		this.feedbackElement.textContent = "Make your guess!";
		this.inputField.value = "";
		this.inputField.focus();
		this.setInstructions();
		this.enableInput();
	}
	
	genRandomNumber() {
		this.randomNumber = Math.floor(Math.random() * (this.maxGenNum - this.minGenNum) + this.minGenNum);
	}
}

const game = new GuessingGame();
