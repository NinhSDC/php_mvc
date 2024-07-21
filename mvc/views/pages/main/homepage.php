<?php
$banners = [];
if (isset($data["banners"])) {
    $banners = $data["banners"];
}
?>


<section class="section__banner">
    <div class="grid wide row">
        <div class="category l-3">
            <?php require './MVC/Views/pages/blocks/sidebar.php' ?>
        </div>
        <div class="banner__img l-6">
            <div class="slider ">
                <div class="slide">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="st first">
                        <a href="">
                            <img src="/php_mvc/Public/Assets/img/imgBanners/bannerRolex.jpg" alt="">
                        </a>
                    </div>
                    <div class="st">
                        <a href="">
                            <img src="/php_mvc/Public/Assets/img/imgBanners/bannerOmega.png" alt="">
                        </a>
                    </div>
                    <div class="st">
                        <a href="">
                            <img src="/php_mvc/Public/Assets/img/imgBanners/bannerCasio.jpg" alt="">
                        </a>
                    </div>
                    <div class="st">
                        <a href="">
                            <img src="/php_mvc/Public/Assets/img/imgBanners/bannerTagHeuer.jpg" alt="">
                        </a>
                    </div>
                    <div class="nav-auto">
                        <div class="a-b1"></div>
                        <div class="a-b2"></div>
                        <div class="a-b3"></div>
                        <div class="a-b4"></div>
                    </div>
                    <div class="buttons_navigation">
                        <button id="prev">
                            < </button>
                                <button id="next">
                                    >
                                </button>
                    </div>
                </div>

                <div class="nav-m">
                    <label for="radio1" class="m-btn"></label>
                    <label for="radio2" class="m-btn"></label>
                    <label for="radio3" class="m-btn"></label>
                    <label for="radio4" class="m-btn"></label>
                </div>
            </div>
        </div>
        <div class="right_KeyProducts__img l-3">
            <div class="KeyProducts">
                <div class="right__img" id="">
                    <a href="">
                        <img src="../php_mvc/Public/Assets/img/imgBanners/banner_1.jpg" alt="">
                    </a>
                </div>
                <div class="right__img" id="">
                    <a href="">
                        <img src="../php_mvc/Public/Assets/img/imgBanners/banner_2.jpg" alt="">
                    </a>
                </div>
                <div class="right__img" id="">
                    <a href="">
                        <img src="../php_mvc/Public/Assets/img/imgBanners/banner_3.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section__product-featured">
    <div class="section__product grid wide row line-height">
        <div class="l-2-8 product-featured">
            <a href="">
                <img src="../php_mvc/Public/Assets/img/imgBanners/banner_4.jpg" alt="">
            </a>
        </div>
        <div class="l-2-8 product-featured">
            <a href="">
                <img src="../php_mvc/Public/Assets/img/imgBanners/banner_5.jpg" alt="">
            </a>
        </div>
        <div class="l-2-8 product-featured">
            <a href="">
                <img src="../php_mvc/Public/Assets/img/imgBanners/banner_6.jpg" alt="">
            </a>
        </div>
        <div class="l-2-8 product-featured">
            <a href="">
                <img src="../php_mvc/Public/Assets/img/imgBanners/banner_7.jpg" alt="">
            </a>
        </div>
    </div>
</section>
<section class="section_sale ProductNew">

    <div class="section_sale grid wide row">
        <div class="section_title l-12">
            <a href="">
                <img src="/php_mvc/Public/Assets/img/imgBanners/bannerSanPhamMoi.jpg" alt="">
            </a>
        </div>
        <div class="section_sale-product l-12">
            <div class="buttons_navigation">
                <button class="pre-btn">
                    < </button>
                        <button class="nxt-btn">
                            >
                        </button>
            </div>
            <div class="product_slider" style="transition: 3s;">
                <?php
                while ($ProductNewHome = mysqli_fetch_array($data['ProductNewHome'])) {
                    $Percent = $ProductNewHome["percent"];
                    $Price = $ProductNewHome["price"];

                    if ($Percent != 0) {
                        $newPrice = $Price - ($Price * $Percent / 100);
                    } else {
                        $newPrice = $Price;
                    }
                ?>
                    <div class="product_card l-2-8" onclick="viewProduct(this)" id="<?php echo $ProductNewHome["Id"]; ?>">
                        <div class="product_card-img">
                            <?php
                            if ($Percent != 0) {
                            ?>
                                <span class="product_card-img-discount"><?php echo $Percent; ?>%</span>
                            <?php
                            }
                            ?>
                            <span class="product_card-img-iconView">
                                <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                            </span>
                            <img src="<?php echo $ProductNewHome['imageURL'] ?>" alt="">
                        </div>
                        <div class="product_card-info">
                            <div class="product_card-info-title">
                                <div class="product_card-info-title-category">
                                    <p><?php echo $ProductNewHome["categoryName"]; ?></p>
                                </div>
                                <div class="product_card-info-title-name">
                                    <p><?php echo $ProductNewHome["productName"]; ?></p>
                                </div>
                            </div>
                            <div class="product_card-info-price">
                                <?php
                                if ($Percent != 0) {
                                ?>
                                    <span class="info-price-initial"><?php echo number_format($ProductNewHome['price'], 0, ',', '.') . '₫'; ?></span>
                                <?php
                                }
                                ?>

                                <span class="info-price-sale"><?php echo number_format($newPrice, 0, ',', '.') . '₫'; ?></span>

                            </div>
                        </div>
                        <div class="product_card-add-to-cart">
                            <a class="add-to-cart-button" onclick="addToCart(event, this)">
                                <button class="bt-add-to-cart">
                                    <span>Thêm Vào Giỏ Hàng</span>
                                    <div class="cart">
                                        <svg viewBox="0 0 36 26">
                                            <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
                                            <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                        </svg>
                                    </div>
                                </button>
                            </a>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</section>

<script src="/php_mvc/Public/JS/auto-img-banner.js"></script>
<script src="/php_mvc/Public/JS/get-ID-ProductCard.js"></script>
<script src="/php_mvc/Public/JS/aotu-product_slider.js"></script>