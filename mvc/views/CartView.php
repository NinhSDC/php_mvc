<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmallHall</title>
    <link rel="WebSite icon" type="png" href="/php_mvc/Public/Assets/img/imgLogo/logo.png">
    <link rel="stylesheet" href="/php_mvc/public/css/base.css">
    <link rel="stylesheet" href="/php_mvc/public/css/main.css">
    <link rel="stylesheet" href="/php_mvc/public/css/loaderShowBill.css">
    <link rel="stylesheet" href="/php_mvc/public/css/toggleBtn.css">
    <link rel="stylesheet" href="/php_mvc/public/fontawesome-free-6.1.1-web/css/all.min.css">
</head>

<body>
    <div class="wapper">
        <menu>
            <a href="#" class="action"><img class="img_logo_shoppe" src="/php_mvc/Public/Assets/img/logo-shopee-764x800.png" alt=""></a>
            <a href="#" class="action"><img class="img_logo_zalo" src="/php_mvc/Public/Assets/img/logo-zalo.jpg" alt=""></a>
            <a href="#" class="action"><i class="fa-brands fa-facebook" style="color: #0866ff ; font-size: 34px; "></i></a>
            <a href="#" class="action icon_phone"><i class="fa-solid fa-phone-volume" style="color: #ffffff;"></i></i></a>
            <a href="#" class="trigger"><i class="fa-solid fa-plus"></i></a>
        </menu>
        <?php require_once "./MVC/Views/pages/blocks/header.php"; ?>
        <main>
            <div class="cart_header">
                <a class="cart_link" href="/php_mvc/Cart/">GIỎ HÀNG</a>
                <i class="fas fa-long-arrow-alt-right"></i>
                <a class="payment_link" href="#">THANH TOÁN</a>
                <i class="fas fa-long-arrow-alt-right"></i>
                <a class="complete_link" href="#">HOÀN TẤT</a>
            </div>
            <p style="display: flex; justify-content: center; color : #2dcb33; ">
                <?php
                if (isset($_COOKIE['SuccessTMP'])) {
                    $cookieValue = $_COOKIE['SuccessTMP'];
                    if ($cookieValue === "updatesCartSuccess") {
                        echo "Cập Nhật Giỏ Hàng Thành Công";
                    } elseif ($cookieValue === "CartNull") {
                        echo "Giỏ Hàng Rỗng Không Thể Cập Nhật";
                    } elseif ($cookieValue === "CartNull2") {
                        echo "Giỏ Hàng Rỗng Không Thể Thanh Toán";
                    }
                }
                if (isset($_COOKIE['SuccessDel'])) {
                    $cookieValue = $_COOKIE['SuccessDel'];
                    if ($cookieValue === "successDelProduct") {
                        echo "Xóa Giỏ Sản Phẩm Khỏi Giỏ Hàng Thành Công";
                    }
                }

                ?>
            </p>
            <div class="cart_layout grid wide row">
                <div class="cart_content">
                    <?php
                    require_once "./mvc/views/pages/detail/" . $data["page"] . ".php";
                    ?>
                </div>
            </div>
        </main>

        <footer class="footer">
            <?php require_once "./mvc/views/pages/blocks/footer.php"; ?>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='/php_mvc/Public/JS/del-product-in-cart.js'></script>
<script src='/php_mvc/Public/JS/auto-process-cart-order-pay.js'></script>
<script src='/php_mvc/Public/JS/up-and-down-product.js'></script>
<script src='/php_mvc/Public/JS/fade-Out-icon-ShowBill.js'></script>
<script src='/php_mvc/Public/JS/hidden-icon-ShowBill.js'></script>
<script src='/php_mvc/Public/JS/remove-sesionShowBill-VNPAY.js'></script>
<script src='/php_mvc/Public/JS/check-update-click-cart.js'></script>
<script src='/php_mvc/Public/JS/toggleBtn.js'></script>


</html>