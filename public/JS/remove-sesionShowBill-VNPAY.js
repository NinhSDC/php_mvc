// Đặt hẹn giờ để kiểm tra và chuyển hướng sau khi cả hai biến session bị xóa
setTimeout(function () {
  if (
    !sessionStorage.getItem("ShowBill") &&
    !sessionStorage.getItem("ShowVNPAY")
  ) {
    window.location.href = "/php_mvc/";
  }
}, 610000); // 120000 mili giây tương đương 2 phút
