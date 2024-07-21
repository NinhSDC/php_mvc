// Chờ 2 giây trước khi ẩn phần tử loader
setTimeout(function() {
  var loader = document.querySelector(".loaderShowBill");
  if (loader) {
    loader.classList.add("fadeOut");
  }
}, 2000); // 2 giây

