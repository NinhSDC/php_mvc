<?php 

if(isset($_SESSION['ShowBill'])) {
    $_SESSION['ShowBill'][5] = 1 ;
    $data = $_SESSION['ShowBill'];
    unset($_SESSION['ShowBill']);
} elseif(isset($_SESSION['ShowVNPAY'])) {
    $data = $_SESSION['ShowVNPAY'];
    $checkPaymentShowVNPAY = $_SESSION['ShowVNPAY'][5];
    unset($_SESSION['ShowVNPAY']);
} else {
    $data = null;
}

if ($data) {
    $OrderId = $data[0];
    $NameOrder = $data[1];
    $PhoneNumber = $data[2];
    $Address = $data[3];
    $PaymentMethod = $data[4];
    $checkPayment = $data[5];
} else {
    $OrderId = "";
    $NameOrder = "";
    $PhoneNumber = "";
    $Address = "";
    $PaymentMethod = "";
    $checkPayment = "";
}   
?>
<div class="ShowBill">

    <div class="grid wide row">
        <div class="ShowBillDetail l-12">

            <div class="CompletedShowBill">
                <div class="CompletedShowBill-Top"></div>
            </div>
            <?php
            if($checkPayment === 0) {
                ?>
            <div class="ShowBillDetail-icon">
                <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
            </div>
                <?php
            }else{
                ?>
            <div class="ShowBillDetail-icon">
                <i class="fa-solid fa-circle-check fa-fade" style="color: #4dc534;"></i>
            </div>
                <?php
            }
            ?>


            <div class='ShowBillDetail-Content'>
                <?php
                if($checkPayment === 0) {
                    ?>
                <h2>Quá trình thanh toán thất bại</h2>
                    <?php
                }else{
                    ?>
                <h2>Đặt hàng thành công </h2>
                    <?php
                }
                ?>
                <p>Mã đơn hàng : #<?php echo $OrderId ;?> </p>
                <p> ********************************</p>
                <h3>Thông tin giao hàng</h3>
                <p>Họ và Tên : <?php echo $NameOrder ;?> </p>
                <p>Số điện thoại : <?php echo $PhoneNumber;?> </p>
                <p>Địa chỉ :<?php echo $Address;?></p>
                <p>Phương thức thanh toán : (<?php echo $PaymentMethod;?>) </p>
            </div>
            <div class="loaderShowBill">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
        </div>

    </div>
</div>
<?php
if(isset($_SESSION['UpdateTransactionId'])) {
    unset($_SESSION['UpdateTransactionId']);
}
?>
