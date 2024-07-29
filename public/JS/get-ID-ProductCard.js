function viewProduct(productCard) {
  var productId = productCard.getAttribute("id");
  var productDetailUrl = "Product/ProductDetail/" + productId;
  window.location.href = productDetailUrl;
}
function addToCart(event, button) {
  event.stopPropagation();
  // Ngăn chặn sự kiện click lan ra và chỉ thực hiện hành động của nút "Thêm vào giỏ hàng".
  $.ajax({
    type: "GET",
    url: "/php_mvc/home/checkAccountExists",
    success: function (response) {
      if (response !== null) {
        if (response !== undefined && response === "null") {
          doSomethingWithCustomerId(check);
        } else {
          var check = JSON.parse(response); // đây là một mảng
          if (Array.isArray(check)) {
            doSomethingWithCustomerId(check);
          } else {
            console.log("Biến check không phải là một mảng bú ");
          }
        }
      }
    },
    error: function (xhr, status, error) {
      console.log("Lỗi trong quá trình gửi yêu cầu AJAX");
    },
  });

  function doSomethingWithCustomerId(check) {
    var customerIdTMP = check;
    var productCard = button.closest(".product_card");
    var productId = productCard.getAttribute("id");
    
    if (Array.isArray(customerIdTMP)) {
      var UserId = customerIdTMP[0];

       //console.log('ID sản phẩm: ' + productId);

      var data = {
        productId: productId,
        userId: UserId,
        quantityProduct: 1,
      };

      //console.log(data);

      $.ajax({
        type: "POST",
        url: "/php_mvc/Cart/addToCart",
        data: data,
        success: function (response) {
          var AddToCartTMP = response;
          console.log(AddToCartTMP);
          if (AddToCartTMP !== undefined && AddToCartTMP === "null") {
            console.log("Lỗi trong quá trình gửi yêu cầu AddToCart");
          } else {
            if (AddToCartTMP === "1") {
              alert("Hết Hàng Trong Kho Hiện Tại");
            } else if (AddToCartTMP === "2") {
              alert("Sản Phẩm Không Có Trong Kho Hiện Tại");
            }
          }
        },
        error: function (xhr, status, error) {
          console.error("Lỗi trong quá trình gửi yêu cầu AJAX", error);
        },
      });

      $.ajax({
        type: "POST",
        url: "/php_mvc/home/GetQualityInCart",
        data: data,
        success: function (response) {
          $("#cartQuantity").text(response);
        },
      });
    } else {
      var data = {
        productId: productId,
      };
      $.ajax({
        type: "POST",
        url: "/php_mvc/Cart/addToCart",
        data: data,
        success: function (response) {},
      });

      $.ajax({
        type: "POST",
        url: "/php_mvc/home/GetQualityInCart",
        data: data,
        success: function (response) {
          $("#cartQuantity").text(response);
        },
      });
    }
  }

  // Ngăn chặn hành vi mặc định của form
  event.preventDefault();
}
function detailProduct_addToCart(event) {
  event.stopPropagation();

  var productId = document.getElementById("ProductId").value;
  var QuantityProduct = document.getElementById("quantity").value;

  var CustomerId = document.getElementById("CustomerId").value;
  var UserId = document.getElementById("UserId").value;

  var data = {
    productId: productId,
    quantityProduct: QuantityProduct,
    customerId: CustomerId,
    userId: UserId,
  };

  $.ajax({
    type: "POST",
    url: "/php_mvc/Cart/addToCart",
    data: data,
    success: function (response) {},
  });
  $.ajax({
    type: "POST",
    url: "/php_mvc/home/GetQualityInCart",
    data: data,
    success: function (response) {
      $("#cartQuantity").text(response);
    },
  });

  event.preventDefault();
}
