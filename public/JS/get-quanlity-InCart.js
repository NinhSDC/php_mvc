window.onload = function () {
  GetQuanlityInCart();
};

function GetQuanlityInCart() {
  $.ajax({
    type: "GET",
    url: "/php_mvc/home/GetQualityInCart",
    data: {},
    success: function (response) {
      $("#cartQuantity").text(response);
    },
  });
}
