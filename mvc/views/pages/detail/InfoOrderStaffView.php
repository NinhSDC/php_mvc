<div style="margin-top: 20px ;" class="container">
    <div class="container-left">
        <form id="myForm" onsubmit="return check_FormSubmit_Pay() " name="Submit_Pay" action="/php_mvc/Cart/updatesCartAndPay" method="post">
            <h1 class="lable">Thông Tin Giao Hàng</h1>

            <div class="form-group">
                <input type="text" class="input" name="NameOrder" placeholder="Họ Và Tên" required="true">
                <div class="input1">
                    <div class="input1-left">
                        <input type="email" class="input" name="Email" placeholder="Email" required="true">
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
                    <input type="submit" name="Submit_Pay" value="Thanh Toán" onclick="return validateForm()">
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
                        foreach ($data['GetCartSession'] as $key => $value) {
                            $total_tmp = $value['price'] * $value['quantity'];

                        ?>
                            <input type="hidden" name='ProductId[]' value="<?php echo $key; ?>">
                            <input type="hidden" name='Path[]' value="<?php echo $value['Path']; ?>">
                            <input type="hidden" name='ProductName[]' value="<?php echo $value['nameProduct']; ?>">
                            <input type="hidden" name='Quantity[]' value="<?php echo $value['quantity'] ?>">
                            <input type="hidden" name='ProducPrice[]' value="<?php echo $value['price'] ?>">

                            <tr>
                                <td>
                                    <div>
                                        <p href=""><?php echo $value['nameProduct'];  ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <img src="<?php echo $value['Path'];  ?>" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>x<?php echo $value['quantity'] ?></p>
                                    </div>
                                </td>
                                <td>
                                    <span><?php echo number_format($value['price'], 0, ',', '.') . '₫'; ?></span>
                                </td>
                            </tr>
                        <?php
                            $total_all_tmp += $total_tmp;
                        }
                        ?>
                        <?php
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
                                <input type="hidden" id="total_all" name="total_all" value="<?php echo $total_all; ?>">
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

                    <?php


                    if (isset($_SESSION['accountTMP'])) {
                        $lenght = count($_SESSION['accountTMP']);
                    } else {
                        $lenght = 0;
                    }

                    if ($lenght == 7) {
                    ?>
                        <div class='MoneyReceived-MoneyRefund'>
                            <div class='MoneyReceived'>
                                <p>Số Tiền Nhận Của Khác :</p>
                                <input oninput="validateInput(this)" id="inputTotal" class="input" type="text" name="MoneyReceivedTMP" placeholder="Số Tiền Nhận Của Khác" required="true">
                            </div>
                            <div class='MoneyRefund'>
                                <p>Số Tiền Cần Hoàn Lại Cho Khách :</p>
                                <input id="negativeTotalTMP" class="input" type="text" name="negativeTotal" placeholder="Số Tiền Cần Hoàn Lại Cho Khách" readonly>
                            </div>
                            <input type="hidden" value='' name="MoneyReceived" id='MoneyReceived' required="true">
                            <input type="hidden" value='' name="MoneyRefund" id='MoneyRefund' required="true">
                        </div>
                    <?php
                    }
                    ?>
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

    .input[readonly] {
        pointer-events: none;
    }

    .header_plus_cart {
        width: 98%;
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
<script>
    const form = document.getElementById('myForm');
    const inputTotal = document.getElementById('inputTotal');
    const negativeTotalTMP = document.getElementById('negativeTotalTMP');
    const total_all = document.getElementById('total_all');

    const MoneyReceived = document.getElementById('MoneyReceived');
    const MoneyRefund = document.getElementById('MoneyRefund');


    // Parse giá trị ban đầu của total_all và tempTotal
    let total = parseFloat(total_all.value);
    let tempTotal = -total;

    // Gán giá trị ban đầu cho negativeTotal
    negativeTotalTMP.value = formatCurrency(tempTotal);

    inputTotal.addEventListener('input', function() {
        // Parse giá trị nhập vào từ inputTotal
        const inputValue = parseFloat(inputTotal.value);


        // Kiểm tra nếu inputValue là một số hợp lệ
        if (!isNaN(inputValue)) {

            inputTotal.value = formatCurrency(inputValue);
            // Cộng giá trị của inputValue và giá trị hiện tại của negativeTotal
            const newTotal = inputValue + tempTotal;

            // Cập nhật giá trị của negativeTotal
            negativeTotalTMP.value = formatCurrency(newTotal);

            //giữ giá trị ban đầu 
            MoneyRefund.value = newTotal;
            MoneyReceived.value = inputValue;
        } else {
            // Không có giá trị hợp lệ trong inputTotal, trả về giá trị tạm thời
            negativeTotalTMP.value = formatCurrency(tempTotal);
        }
    });

    form.addEventListener('submit', function(event) {
        const inputNegativeTotal = parseFloat(negativeTotalTMP.value);

        if (isNaN(inputNegativeTotal) || inputNegativeTotal < 0) {
            alert('Số tiền hoàn lại cho khách không được nhỏ hơn 000.000 ₫');
            event.preventDefault();
        }
    });

    function validateInput(input) {
        // Lấy giá trị của input và loại bỏ bất kỳ ký tự không phải số từ 0 đến 9
        input.value = input.value.replace(/[^0-9]/g, '');
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(amount);
    }
</script>