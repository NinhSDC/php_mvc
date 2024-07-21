function viewProductSearch(productCard) {
  var productId = productCard.getAttribute("id");
  var productDetailUrl = "/php_mvc/Product/ProductDetail/" + productId;
  window.location.href = productDetailUrl;
}
