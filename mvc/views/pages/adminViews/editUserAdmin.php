<?php

$editLecturers = mysqli_fetch_array($data['editUserAdmin']);

?>
<div class="table_content">

    <button class="button_return" onclick="history.back()">TRỞ LẠI</button>
    
    <form onsubmit="return check_editUser()" name="form_insertlectures" class="modal_form" method="POST">
        <label for="user_name">Tên sinh viên:</label>
        <input value="<?= $editLecturers['user_name'] ?>" type="text" placeholder="Nhập tên giảng viên" required="true" name="user_name" id="user_name">
        <label for="user_code">Mã sinh viên:</label>
        <input value="<?= $editLecturers['user_code'] ?>" type="text" placeholder="Nhập mã giảng viên" required="true" name="user_code" id="user_code">
        <label for="user_account">Tài Khoản :</label>
        <input value="<?= $editLecturers['user_account'] ?>" type="text" placeholder="Nhập tài khoản" required="true" readonly name="user_account" id="user_account">
        <label for="user_password">Mật Khẩu :</label>
        <input value="<?= $editLecturers['user_password'] ?>" type="password" placeholder="Nhập mật khẩu" required="true" name="user_password" id="user_password">
        <label for="user_email">Mail sinh viên:</label>
        <input value="<?= $editLecturers['user_email'] ?>" type="email" placeholder="Nhập mail giảng viên" required="true" name="user_email" id="user_email">
        <label for="user_tel">Số Điện Thoại:</label>
        <input value="<?= $editLecturers['user_tel'] ?>" type="text" placeholder="Nhập số điện thoại" required="true" name="user_tel" id="user_tel">

        <button type="submit" id="submit" name="submit" class="modal_add-btn">Cập Nhật</button>
    </form>
</div>
<script src="/quanly_lv_tl/public/js/isnertLecturersAdmin.js"></script>