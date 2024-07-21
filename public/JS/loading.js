// Hiển thị hiệu ứng loading khi trang được tải
document.addEventListener("DOMContentLoaded", function () {
    // Lấy thẻ div có class "container_loading"
    var containerLoading = document.querySelector(".container_loading");

    // Hiển thị thẻ div
    containerLoading.style.display = "flex";

    // Mờ dần thẻ div sau 2 giây và sau đó ẩn nó đi
    setTimeout(function () {
        containerLoading.style.opacity = "0";
        setTimeout(function () {
            containerLoading.style.display = "none";
        }, 1000); // 1 giây cho hiệu ứng mờ dần kết thúc
    }, 2000); // 2 giây
});