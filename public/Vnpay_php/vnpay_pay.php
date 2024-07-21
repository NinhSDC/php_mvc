<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/php_mvc/Public/CSS/loading.css">
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    <?php require_once "./config.php"; ?>
    <div class="container_loading">
        <div class="loading">
            <div class="📦"></div>
            <div class="📦"></div>
            <div class="📦"></div>
            <div class="📦"></div>
            <div class="📦"></div>
        </div>
    </div>
    <div class="container">
        <h3>Tạo mới đơn hàng</h3>
        <div class="table-responsive">
            <?php
            if (isset($_SESSION['InfSubmitPay'])) {
                $Total = $_SESSION['InfSubmitPay'][0];
            } else if (isset($_POST['Total'])) {
                if (!isset($_SESSION['InfSubmitPay'])) {
                    $_SESSION['InfSubmitPay'] = [$_POST['Total'], $_POST['OrderId']];
                }
                if (!isset($_SESSION['ShowVNPAY'])) {
                    $_SESSION['ShowVNPAY'] = [$_POST['OrderId'], $_POST['NameOrder'], $_POST['PhoneNumber'], $_POST['Address'], $_POST['PaymentMethod'], 1];
                }
                var_dump($_SESSION['ShowVNPAY']);
                $Total = $_POST['Total'];
            }

            ?>
            <form action="/php_mvc/vnpay_php/vnpay_create_payment.php" id="frmCreateOrder" method="post">
                <div class="form-group">
                    <!-- <label for="amount">Số tiền</label> -->
                    <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="<?php echo $Total ?>" />
                </div>
                <!-- <h4>Chọn phương thức thanh toán</h4> -->
                <div class="form-group">
                    <!-- <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5> -->
                    <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                    <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>


                </div>
                <div class="form-group">
                    <!-- <h5>Chọn ngôn ngữ giao diện thanh toán:</h5> -->
                    <input type="radio" id="language" Checked="True" name="language" value="vn">
                    <!-- <label for="language">Tiếng việt</label><br> -->
                    <input type="radio" id="language" name="language" value="en">
                    <!-- <label for="language">Tiếng anh</label><br> -->

                </div>
                <button type="submit" class="btn btn-default" href>Thanh toán</button>
            </form>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY 2020</p>
        </footer>
    </div>

</body>

</html>
<script src='/php_mvc/Public/JS/loading.js'></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {

        var form = document.getElementById("frmCreateOrder");

        form.submit();
    });
</script>