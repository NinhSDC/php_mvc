<?php
if (isset($_SESSION['accountTMP'])) {
?>
    <input id="CustomerId" type="hidden" value="<?php echo $_SESSION['accountTMP'][0]; ?>">
    <input id="UserId" type="hidden" value="<?php echo $_SESSION['accountTMP'][1]; ?>">
<?php
} else {
?>
    <input id="CustomerId" type="hidden" value="">
    <input id="UserId" type="hidden" value="">
<?php
}
while ($row = mysqli_fetch_array($data['Detailproduct'])) {
    $Percent = $row["percent"];
    $Price = $row["price"];

    if ($Percent != 0) {
        $newPrice = $Price - ($Price * $Percent / 100);
    } else {
        $newPrice = $Price;
    }
?>
    <div class='detailProduct grid wide row'>
        <div class="detailProduct_left l-6">
            <div onclick="block_tab_show()" class="detailProduct_left_Img">
                <span class="detailProduct_left_Img_IconView">
                    <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                </span>
                <?php
                if ($Percent != 0) {
                ?>
                    <span class="detailProduct_left_Img_Discount"><?php echo $Percent; ?>%</span>
                <?php
                }
                ?>
                <img src="" alt="Mô tả hình ảnh" class="ProductImg">
                <div class="detailProduct_buttons_navigation">
                    <button class="detailProduct_pre-btn">
                        &lt;
                    </button>
                    <button class="detailProduct_nxt-btn">
                        &gt;
                    </button>
                </div>
            </div>
            <div class="detailProduct_left_Thumbnails">
                <?php while ($getImgDetailproduct = mysqli_fetch_array($data['getImgDetailproduct'])) {

                ?>

                    <div id="" class="detailProduct_Thumbnail hoverEffect " onmouseover="ProductImg('<?php echo $getImgDetailproduct['path'];  ?>')">
                        <img src="<?php echo $getImgDetailproduct['path'];  ?>" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="detailProduct_right  l-5-5 ">
            <h1 class="detailProduct_right_truncate"><?php echo $row['productName']; ?></h1>
            <div class="detailProduct_right_is-divider">
            </div>
            <div class="detailProduct_right_price">
                <?php
                if ($row['status'] === 0) {

                ?>

                    <span class="detailProduct_right_price-sale">Sản phẩm ngừng kinh doanh</span>

                <?php

                } else {
                ?>
                    <?php
                    if ($Percent != 0) {
                    ?>
                        <span class="detailProduct_right_price-initial"><?php echo number_format($Price, 0, ',', '.') . '₫'; ?></span>
                    <?php
                    }
                    ?>

                    <span class="detailProduct_right_price-sale"><?php echo number_format($newPrice, 0, ',', '.') . '₫'; ?></span>

                <?php
                }
                ?>

            </div>
            <div class="detailProduct_right_short_description">
                <div class='detailProduct_description_top'>
                    <div class='detailProduct_description_top-1'>
                        <img src="/php_mvc/Public/assets/img/iconProducts/support-1.gif" alt="">
                        <p>Tư vấn cấu hình miễn phí</p>
                    </div>
                    <div class='detailProduct_description_top-2'>
                        <img src="/php_mvc/Public/assets/img/iconProducts/money-bag-1.gif" alt="">
                        <p>Hỗ trợ thanh toán Online</p>
                    </div>
                </div>
                <div class='detailProduct_description_botton'>
                    <div class='detailProduct_description_botton-1'>
                        <img src="/php_mvc/Public/assets/img/iconProducts/truck-1.gif" alt="">
                        <p>Hỗ trợ giao hàng tận nơi</p>
                    </div>
                    <div class='detailProduct_description_botton-2'>
                        <img src="/php_mvc/Public/assets/img/iconProducts/loading-1.gif" alt="">
                        <p>Hỗ trợ cài đặt phần mềm</p>
                    </div>
                </div>
            </div>
            <div class="detailProduct_right_add_to_cart">
                <?php
                if ($row['status'] != 0) {
                ?>
                    <input id="ProductId" class='ProductId' type="hidden" value='<?php echo $row['Id']; ?>'>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" onclick="tru(this)" value="-">
                        <input id="quantity" style="pointer-events: none;" class="input_quantity txtbox" name="Quantity[]" type="text" pattern="[0-9]\d*" title="Vui lòng nhập số từ 0 đến 9" value="1">
                        <input class="minus is-form" type="button" onclick="cong(this)" value="+">
                        <span id="so"></span>
                    </div>
                    <div class="detailProduct_right_button">

                        <div class="detailProduct_right_add-to-cart">
                            <a class="detailProduct_right_add-to-cart-button" onclick="detailProduct_addToCart(event)">
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

                        <!-- Button trigger modal -->
                        <button type="button" class="btn_custom_inventory btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa-solid fa-location-dot"></i>
                        </button>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="detailProduct_footer grid wide row ">
        <div class="detailProduct_footer_left l-8">
            <h5 style="color : red "> MÔ TẢ </h5>
        </div>
        <div class="detailProduct_footer_right l-3-8">
            <h5 style="color : red "> THÔNG SỐ KỸ THUẬT </h5>
            <div class="detailProduct_footer_right_board">
                <table>
                    <?php $getProductDetailedConfigs = mysqli_fetch_array($data['getProductDetailedConfigs'])
                    ?>
                    <tr>
                        <td class="key_first">Material</td>
                        <td class="key_Value"><?php echo $getProductDetailedConfigs['material']; ?></td>
                    </tr>
                    <tr>
                        <td class="key_first">Size</td>
                        <td class="key_Value"><?php echo $getProductDetailedConfigs['size']; ?></td>
                    </tr>
                    <tr>
                        <td class="key_first">Color</td>
                        <td class="key_Value"><?php echo $getProductDetailedConfigs['color']; ?></td>
                    </tr>
                    <?php
                    ?>
                </table>
            </div>
        </div>
    </div>
<?php
}
?>