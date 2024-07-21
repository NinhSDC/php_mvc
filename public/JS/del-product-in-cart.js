// Lấy tất cả các thẻ có lớp "delProductToCart"
var deleteButtons = document.querySelectorAll(".delProductToCart");

// Lặp qua từng nút và gắn sự kiện click cho mỗi nút
deleteButtons.forEach(function (button) {
  button.addEventListener("click", function (event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ "a"

    // Lấy giá trị ID từ thuộc tính data-id của nút
    var productId = button.getAttribute("data-id");

    var data = {
      productId: productId,
    };

    $.ajax({
      type: "POST",
      url: "/php_mvc/Cart/delProductToCart",
      data: data,
      success: function (response) {
        document.cookie =
          "SuccessDel=successDelProduct; expires=" +
          new Date(new Date().getTime() + 1000).toUTCString();
        window.location.reload();
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.error("Lỗi trong quá trình gửi yêu cầu AJAX", error);
      },
    });

    // console.log("Nút xóa sản phẩm có ID " + productId + " đã được bấm!");
  });
});
