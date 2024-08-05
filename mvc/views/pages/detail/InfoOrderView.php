<div style="margin-top: 20px ;" class="container">
    <div class="container-left">
        <form onsubmit="return check_FormSubmit_Pay() " name="Submit_Pay" action="/php_mvc/Cart/updatesCartAndPay" method="post">
            <input type="hidden" name='StaffId' value="null">
            <h2 class="lable">Thông Tin Giao Hàng</h2>
            <input type="hidden" name="createdTime" value="">
            <div class="form-group">
                <input type="text" class="input" name="NameOrder" placeholder="Họ Và Tên" required="true">
                <div class="input1">
                    <div class="input1-left">
                        <input type="email" class="input" name="emailCustomer" placeholder="Email" required="true">
                    </div>
                    <div class="input1-right">
                        <input type="tel" class="input" name="PhoneNumber" placeholder="Số Điện Thoại" required="true">
                        <span style="color : red ;" id="so"></span>
                    </div>
                </div>

                <input type="text" class="input" name="Address" placeholder="Địa Chỉ" required="true">

                <div class="radio">
                    <input checked="checked" name="PaymentMethod" type="radio" value="COD" />Thanh Toán Khi Nhận Hàng
                </div>
                <div class="radio">
                    <input name="PaymentMethod" type="radio" value="VNPAY" />Thanh Toán Qua VNPAY
                </div>

            </div>

            <div style="margin-left: 90px;" class="btn_cart">
                <div class="btn_order">
                    <input type="submit" name="Submit_Pay" value="Thanh Toán ">
                </div>
            </div>
    </div>
    <div class="container-right">
        <div class="infCart">
            <div class="cartTMP">
                <div class="header_plus_cart">
                    <table>
                        <?php
                        $total = 0;
                        $total_all = 0;
                        $total_all_tmp = 0;
                        $vouCher_tmp = 0;
                        $total_all_addVoucher = 0;
                        $vouCher;
                        if (isset($_SESSION['accountTMP'])) {
                            while ($rowProduct = mysqli_fetch_array($data['GetCart'])) {
                                $Price_view = ($rowProduct['percent'] != null && $rowProduct['percent'] > 0) ?
                                    $rowProduct['price'] - ($rowProduct['price'] * $rowProduct['percent'] / 100) :
                                    $rowProduct['price'];

                                $total_tmp = $Price_view * $rowProduct['Quantity'];
                        ?>
                                <input type="hidden" name='ProductId[]' value="<?php echo $rowProduct['ProductId']; ?>">
                                <input type="hidden" name='Path[]' value="<?php echo $rowProduct['pathImg']; ?>">
                                <input type="hidden" name='ProductName[]' value="<?php echo $rowProduct['productName']; ?>">
                                <input type="hidden" name='Quantity[]' value="<?php echo $rowProduct['Quantity'] ?>">
                                <input type="hidden" name='PromotionPrice[]' value="<?php echo $Price_view; ?>">

                                <tr>
                                    <td>
                                        <div>
                                            <p href=""><?php echo $rowProduct['productName'];  ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="<?php echo $rowProduct['pathImg'];  ?>" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>x<?php echo $rowProduct['Quantity'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <span><?php echo number_format($Price_view, 0, ',', '.') . '₫'; ?></span>
                                    </td>
                                </tr>
                            <?php
                                $total_all_tmp += $total_tmp;
                            }
                            ?>
                        <?php
                        } else {
                            echo "
                          alert('Lỗi Hệ Thống , Rất Xin Lỗi Về Vấn Đề Ngoài Ý Muốn Này');
                          window.location = '/php_mvc/Cart/';
                        ";
                        }
                        if ($total_all_tmp > 0 && $vouCher_tmp > 0) {
                            $total_all = $total_all_tmp;
                            $total_all_addVoucher = $total_all_tmp - $vouCher_tmp;
                        } else {
                            $total_all = $total_all_tmp;
                            $total_all_addVoucher = $total_all_tmp;
                        }
                        ?>
                    </table>
                </div>
                <div class="plus_cart">
                    <table>
                        <tr>
                            <th style="text-align: left;">
                                Tạm Tính
                            </th>
                            <th style="text-align: right;">
                                <span><?php echo number_format($total_all, 0, ',', '.') . '₫'; ?></span>
                                <input type="hidden" name="total_all" value="">
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: left;">
                                Phí Vận Chuyển
                            </th>
                            <th style="text-align: left;">
                                <span> Free </span>
                            </th>
                        </tr>
                        <tr class="tr_">
                            <th style="text-align: left;">
                                Tổng
                            </th>
                            <th style="text-align: right; ">
                                <span><?php echo number_format($total_all_addVoucher, 0, ',', '.') . '₫'; ?></span>
                                <input type="hidden" name="total_all_addVoucher" value="<?php echo $total_all; ?>">
                            </th>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<style>
    .container {
        display: flex;
        justify-content: center;
        margin: 0;
        padding: 0;
        width: 100%;
        min-height: 300px;
    }

    .radio {
        display: block;
    }

    .container-left {
        text-align: center;
        width: 50%;
        margin-right: 30px;
        border-right: 1px solid #ccc;
    }

    .container-right {
        /* text-align: center; */
        width: 50%;
        /* margin-right: 30px; */
    }

    .lable {
        margin: 15px 25px;
        font-weight: 500;
    }

    .input1 {
        display: flex;
        width: 100%;
    }

    .input1-left {
        width: 60%;
        margin-right: 12px;
    }

    .input1-right {
        width: 34%;
    }

    .input {
        border: none;
        box-shadow: 0 0 0 1px #d9d9d9;
        transition: all 0.2s ease-out;
        background-color: white;
        color: #333333;
        border-radius: 4px;
        display: block;
        box-sizing: border-box;
        width: 94%;
        height: 50px;
        /* margin-left: 35px; */
        margin-top: 6px;
        margin-bottom: 6px;
        padding: 15px;
        /* padding: 0.94em 2.8em 0.94em 0.8em; */
        word-break: normal;
    }

    .input:focus {
        box-shadow: 0 0 0 2px #338dbc;
        outline: none;
    }


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
        width: 100%;
    }

    span {
        color: red;
        text-align: right;
    }

    .tr_>th {
        border-bottom: 2px solid white;

    }
</style>
<script>
    function check_FormSubmit_Pay() {
        var userPhone = document.Submit_Pay.phone_User.value;
        var nameUser = document.Submit_Pay.name_User.value;
        var addRessUser = document.Submit_Pay.addRess_User.value;
        if (isNaN(userPhone)) {
            document.getElementById("so").innerHTML = "Chỉ Được Nhập Số ";
            return false;
        } else if (userPhone.length > 10) {
            alert("Số Điện Thoại Không Quá 10 Số !!!");
            return false;
            // die(); 
        } else if (userPhone.length < 10) {
            alert("Số Điện Thoại Phải Đủ 10 Số !!!");
            return false;
            // die(); 
        } else if (nameUser.length < 2) {
            alert("Tên Không ít Hơn 1 ký tự !!!");
            return false;
            // die(); 
        } else if (nameUser.length > 200) {
            alert("Tên Không Lớn Hơn 200 ký tự !!!");
            return false;
            // die(); 
        } else if (addRessUser.length < 2) {
            alert("Địa Chỉ Không ít Hơn 1 ký tự !!!");
            return false;
            // die(); 
        } else if (addRessUser.length > 200) {
            alert("Địa Chỉ Không Lớn Hơn 200 ký tự !!!");
            return false;
            // die();  
        }
    }
</script>