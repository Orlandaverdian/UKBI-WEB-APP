var timer;
var timeRemaining;

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    timerInterval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            // Timer countdown selesai
            clearInterval(timerInterval);
            display.textContent = "Time's up!";
            disableAnswer();
        }
    }, 1000);
}

function disableAnswer() {
    var checkButton = document.querySelector("button");
    checkButton.disabled = true;
}

window.onload = function () {
    var fiveMinutes = 5 * 60; // Durasi countdown (dalam detik)
    var display = document.querySelector("#timer");
    startTimer(fiveMinutes, display);

    displayQuestion(questions[currentQuestion].question);
};