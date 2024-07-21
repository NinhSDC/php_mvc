var counter = 1;
var intervalId;
function updateCounter(newCounter) {
    if (newCounter < 1) {
        newCounter = 4; // Quay lại ảnh cuối cùng nếu đang ở ảnh đầu
    } else if (newCounter > 4) {
        newCounter = 1; // Quay lại ảnh đầu nếu đang ở ảnh cuối cùng
    }
    counter = newCounter;
    document.getElementById("radio" + counter).checked = true;
}

function nextImage() {
    updateCounter(counter + 1);
}

function prevImage() {
    updateCounter(counter - 1);
}

document.getElementById("prev").addEventListener("click", prevImage);
document.getElementById("next").addEventListener("click", nextImage);

// Tự động chuyển ảnh
intervalId = setInterval(nextImage, 5000);