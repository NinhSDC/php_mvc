<?php while ($rowUser = sqlsrv_fetch_array($data['getInfoCustomer'])) {
    if ($rowUser['Phone'] == "") {
        $PhoneNumber = "null";
    } else {
        $PhoneNumber = $rowUser['Phone'];
    } {;
    }
?>
    <div class="UserInfo grid wide row">
        <div class="UserInfo_left l-3-8">
            <div class="UserInfo_left_Img">
                <img src="<?php echo $rowUser['Image'] ?>" alt="">
                <label class="file-input" for="file-input">
                    <i class="fa-regular fa-pen-to-square"></i>
                </label>
                <input id="file-input" data-id="<?php echo $_SESSION['accountTMP'][0] ?>" type="file" style="display: none;">
            </div>
            <div class="UserInfo_left_Name">
                <p>
                    <?php echo $rowUser['Name'];  ?>
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
            <div class="UserInfo_right_notification">
                <p id="notification">
                    <?php
                    if (isset($_COOKIE['True'])) {
                        $cookieValue = $_COOKIE['True'];
                        if ($cookieValue === "UpdateInfo") {
                            echo "Cập Nhật Thông Tin Thành Công";
                        }
                    }
                    if (isset($_COOKIE['False'])) {
                        $cookieValue = $_COOKIE['False'];
                        if ($cookieValue === "UpdateUserInfo_PassNew_False") {
                            echo "Mật Khẩu Hiện Tại Không Đúng";
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="UserInfo_right_content">
                <label for="">Họ Và Tên<p>*</p></label>
                <input id="User_Name" name="User_Name" class="custom-input" type="text" value="<?php echo $rowUser['Name']; ?>" onchange="checkChanges()">
                <label for="">Số Điện Thoại<p>*</p></label>
                <input id="User_PhoneNumber" name="User_PhoneNumber" class="custom-input" type="text" placeholder="" value="<?php echo  $PhoneNumber; ?>" onchange="checkChanges()">
                <label for="">Địa chỉ email<p>*</p></label>
                <input type="email" id="User_Email" name="User_Email" class="custom-input" type="text" value="<?php echo $rowUser['Email']; ?>" onchange="checkChanges()">
                <label for="">Địa Chỉ<p>*</p></label>
                <input type="" id="User_Address" name="User_Address" class="custom-input" type="text" value="<?php echo $rowUser['Address']; ?>" onchange="checkChanges()">
                <h4> THAY ĐỔI MẬT KHẨU </h4>
                <label for="">Mật khẩu hiện tại (bỏ trống nếu không đổi)</label>
                <input id="User_Pass" type="password" name="User_Pass" class="custom-input" type="text" value="" onchange="checkChanges()">
                <label for="">Xác nhận mật khẩu mới</label>
                <input id="User_PassNew" type="password" name="User_PassNew" class="custom-input" type="text" value="" oninput="checkPasswordStrength(this)">
                <div class="UserInfo_right_content_password-ColStrength"></div>
                <div class="UserInfo_right_content_Strength" id="password-strength"></div>
                <div class="UserInfo_right_content_button">
                    <button id="update_UserInfo" style="display: none; " onclick="update_UserInfo()">
                        Lưu Thay Đổi
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
}  ?>

<!-- <script src="https://example.com/path/to/zxcvbn.js"></script>
<script src="path/to/zxcvbn.js"></script> -->