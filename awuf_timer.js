const endDate = new Date('2025-02-07T00:00:00');
function countDown() {
    const now = new Date();
    const timeLeft = endDate - now;
    const AwufEndMsg = document.getElementById('col_awuf_sales');

    if (timeLeft <= 0) {
        AwufEndMsg.innerHTML = '<center>AWUF SALES HAS ENDED <br>Kindly be on the look-out for the next one</center>';
        clearInterval(timerInterval); // Stop the timer when it reaches zero
    } else {
        const hours = Math.floor(timeLeft / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('mins').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('secs').textContent = seconds.toString().padStart(2, '0');
    }
}

const timerInterval = setInterval(countDown, 1000);
countDown(); // Call immediately to avoid initial delay