<form name="listProduct" action="/php_mvc/Cart/updatesCartAndPay" method="POST" style="width: 100%;" onsubmit="return validateForm()">

    <div class="form_cart">
        <div class="form_cart-left">
            <p id="error-message" style="display:none; color : red ;"> Số lượng sản phẩm cần mua nhiều hơn số lượng kho
                hàng </p>

            <table>
                <tr>
                    <th>&nbsp;</th>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>&nbsp;</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                </tr>
                <?php
                $num = 1;
                $total = 0;
                $total_all = 0;

                if (isset($_SESSION['accountTMP'])) {
                    while ($rowProduct = mysqli_fetch_array($data['GetCart'])) {
                        $Price_view = ($rowProduct['percent'] != null && $rowProduct['percent'] > 0) ?
                        $rowProduct['price'] - ($rowProduct['price'] * $rowProduct['percent'] / 100) :
                        $rowProduct['price'];
                        $total_tmp =  $Price_view * $rowProduct['Quantity'];

                ?>

                        <input type="hidden" name='CartDetailId[]' value="<?php echo $rowProduct['CartDetailId']; ?>">
                        <input type="hidden" name='CartId[]' value="<?php echo $rowProduct['CartId']; ?>">
                        <input type="hidden" name='ProductId[]' value="<?php echo $rowProduct['ProductId']; ?>">
                        <tr>
                            <td>
                                <a class="delProductToCart" data-id="<?php echo $rowProduct['ProductId']; ?>" href="">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>
                                <?php echo $num; ?>
                            </td>
                            <td class="td_2">
                                <div class="a">
                                    <a href="/php_mvc/Product/ProductDetail/<?php echo $rowProduct['ProductId']; ?>"><?php echo $rowProduct['productName'];  ?></a>
                                </div>

                            </td>
                            <td>
                                <div class="img">
                                    <img src="<?php echo $rowProduct['pathImg'] ?>" alt="">
                                </div>
                            </td>
                            <td>
                                <span><?php echo number_format($Price_view, 0, ',', '.') . '₫'; ?></span>
                            </td>
                            <td>
                                <div class="buttons_added">
                                    <input class="minus is-form" type="button" onclick="tru(this)" value="-">
                                    <input id="quantity" style="pointer-events: none;" class="input_quantity txtbox" name="Quantity[]" type="text" pattern="[0-9]\d*" title="Vui lòng nhập số từ 0 đến 9" value="<?php echo $rowProduct['Quantity'] ?>">
                                    <input class="minus is-form" type="button" onclick="cong(this)" value="+">
                                    <span id="so"></span>
                                </div>
                            </td>
                            <td>
                                <span><?php echo number_format($total_tmp, 0, ',', '.') . '₫'; ?></span>
                            </td>

                        </tr>
                <?php
                        $num++;
                        $total_all += $total_tmp;
                    }
                } else {
                    header('location: /php_mvc/Login');
                }
                ?>
            </table>
            <div class="btn_cart">
                <div class="btn-return_products">
                    <a href="/php_mvc/"><i class="fas fa-sign-out-alt"></i> Tiếp Tục Mua Hàng </a>
                </div>
                <div class="btn_update">
                    <input type="submit" onclick="checkQuantity(event)" id="update_click" name="update_click" value="Cập Nhật Giỏ Hàng">
                </div>
            </div>
            <div class="form_info-order">

            </div>

        </div>
        <div class="form_cart-right">
            <div class="plus_cart">
                <div class="header_plus_cart">
                    <h2>CỘNG GIỎ HÀNG</h2>
                </div>
                <table>
                    <tr>
                        <th style="text-align: left;">
                            Tạm Tính
                        </th>
                        <th style="text-align: right;">
                            <input type="hidden" name="total_all_addVoucher" value="<?php echo $total_all; ?>">
                            <span><?php echo number_format($total_all, 0, ',', '.') . '₫'; ?></span>
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: left;">
                            Tổng
                        </th>
                        <th style="text-align: right;">
                            <span><?php echo number_format($total_all, 0, ',', '.') . '₫'; ?></span>
                        </th>
                    </tr>
                </table>

                <div class="btn_cart">
                    <div class="btn_order">
                        <input type="submit" name="order_click" value="Tiến Hành Thanh Toán ">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    // }
    ?>
</form>
<style>
    img {
        width: 75px;
    }

    table {
        padding: 0;
        border: none;
        border-collapse: collapse;
    }

    th {
        height: 50px;
        border-bottom: 2px solid #ccc;
    }

    td {
        padding: 0 12px;
        border-bottom: 1px solid #ccc;
    }

    span {
        color: red;
    }
</style>