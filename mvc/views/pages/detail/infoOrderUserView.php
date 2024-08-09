<?php
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
$total_page = $data["totalPage"];
$current_page = $data['currentPage'];
?>
<div class="UserInfo grid wide row">
    <div class="UserInfo_left l-3-8">
        <div class="UserInfo_left_Img">
            <?php
            while ($row = mysqli_fetch_array($data['getInfoCustomer'])) {
            ?>
                <img src="<?php echo $row['img'] ?>" alt="">
            <?php
            }
            ?>
        </div>
        <div class="UserInfo_left_Name">
            <p>
            </p>
        </div>
        <div class="UserInfo_left_icon">
            <a href="/php_mvc/User/">
                <i class="fa-regular fa-pen-to-square fa-xl"></i>
                <p>
                    Sửa thông tin
                </p>
            </a>
        </div>
        <div class="UserInfo_left_icon">
            <a href="/php_mvc/User/InfoOrder/">
                <i class="fa-solid fa-chart-pie  fa-xl"></i>
                <p>
                    Thông tin đơn hàng
                </p>
            </a>
        </div>
    </div>

    <div class="UserInfo_right l-8">
        <div class="UserInfo_Order_right">
            <table class="UserInfo_Order_right_table">
                <tr class="UserInfo_Order_right_tr">
                    <th>Mã Đơn Hàng</th>
                    <th class="th1">Ảnh</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Trạng Thái Đơn Hàng</th>
                    <th>Chi Tiết</th>
                </tr>
                <?php
                if ($data['checkOrder'] != 0) {
                    while ($rowInfoOrderUser = mysqli_fetch_array($data['getOrderInfoUser'], MYSQLI_ASSOC)) {
                        $ShipStatus = $rowInfoOrderUser['status'];
                        $PaymentMethod = $rowInfoOrderUser['paymentMethod'];
                ?>
                        <tr class="UserInfo_Order_right_tr">
                            <th>#<?php echo $rowInfoOrderUser['Id']; ?></th>
                            <th class="th1">
                                <img class="img-thumbnail " width="100px" height="100px" src="<?php echo $rowInfoOrderUser['pathImg']; ?>" alt="">
                            </th>
                            <th><?php echo $PaymentMethod; ?></th>
                            <th><?php
                                if ($ShipStatus === 0 && $PaymentMethod === "VNPAY") {
                                ?>
                                    <form method="POST" action="/php_mvc/vnpay_php/vnpay_pay.php">
                                        <input type="hidden" name="OrderId" value="<?php echo $rowInfoOrderUser['Id'] ?>">
                                        <input type="hidden" name="NameOrder" value="<?php echo $rowInfoOrderUser['nameOrder'] ?>">
                                        <input type="hidden" name="PhoneNumber" value="<?php echo $rowInfoOrderUser['phoneNumber'] ?>">
                                        <input type="hidden" name="Address" value="<?php echo $rowInfoOrderUser['addRess'] ?>">
                                        <input type="hidden" name="PaymentMethod" value="<?php echo $PaymentMethod; ?>">
                                        <input type="hidden" name="Total" value="<?php echo $rowInfoOrderUser['totalAmount'] ?>">
                                        <button class="POST_Form_OrderUser_VNPay" type="submit" style="color: red; margin: 0 !important;">Đơn Hàng Chưa Được Thành
                                            Toán</button>
                                    </form>
                                <?php
                                } else {
                                    if ($ShipStatus === "0") {
                                        echo "Chờ Duyệt Đơn...";
                                    } elseif ($ShipStatus === "1") {
                                        echo "Đơn Hàng Đang Được Vận Chuyển...";
                                    } elseif ($ShipStatus === "2") {
                                        echo "Đã Nhận Hàng";
                                    } elseif ($ShipStatus === "-1") {
                                        echo "Đơn Hàng Đã Được Hủy";
                                    }
                                }
                                ?>
                            </th>
                            <th class="th4">
                                <i class="fa-solid fa-circle-info fa-xl DetailOrder" data-toggle="modal" data-target="#orderDetails" data-id="<?php echo $rowInfoOrderUser['Id'] ?>"></i>
                            </th>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>


            <!-- Modal -->
            <div class="modal fade" id="orderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-content-customs" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Đơn Hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div id="showDetailOrder"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pagination mt-2">
                <?php //HIỂN THỊ PHÂN TRANG
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    // echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
                    echo '<li class="page-item">
                                                        <a class="page-link" href="' . $actual_link . '/php_mvc/User/InfoOrder/' . ($current_page - 1) . '">Sau</a>
                                                    </li>';
                }
                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<li class="page-item"><a class="page-link active" href="' . $actual_link . '/php_mvc/User/InfoOrder/' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="' . $actual_link . '/php_mvc/User/InfoOrder/' . $i . '">' . $i . '</a></li>';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li class="page-item">
                                            <a class="page-link" href="' . $actual_link . '/php_mvc/User/InfoOrder/' . ($current_page + 1) . '">Trước</a>
                                        </li> ';
                }
                ?>
                <!-- <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li> -->
            </ul>
        </div>
    </div>
</div>