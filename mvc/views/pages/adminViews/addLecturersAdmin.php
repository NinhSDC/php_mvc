<div class="table_content">
    <button class="button_return" onclick="history.back()">TRỞ LẠI</button>

    
    <form onsubmit=" return check_InsertLectures() " name="form_insertlectures" class="modal_form" method="POST" enctype="multipart/form-data">
        <label for="TenGiangVien">Tên giảng viên:</label>
        <input type="text" placeholder="Nhập tên giảng viên" required="true" name="user_name" id="user_name">
        <label for="TenGiangVien">Mã giảng viên:</label>
        <input type="text" placeholder="Nhập tên giảng viên" required="true" name="user_code" id="user_code">
        <label for="TenGiangVien">Tài Khoản :</label>
        <input type="text" placeholder="Nhập tên giảng viên" required="true" name="user_account" id="user_account">
        <label for="TenGiangVien">Mật Khẩu :</label>
        <input type="password" placeholder="Nhập tên giảng viên" required="true" name="user_password" id="user_password">

        <label for="fileUser_img">Chọn File Hình Ảnh:</label>
        <input type="file" id="fileUser_img" name="fileUser_img" required="true" >
       
        <label for="TenGiangVien">Mail giảng viên:</label>
        <input type="email" placeholder="Nhập tên giảng viên" required="true" name="user_email" id="user_email">
        <label for="TenGiangVien">Số Điện Thoại:</label>
        <input type="text" placeholder="Nhập tên giảng viên" required="true" name="user_tel" id="user_tel">
        <label style="padding:8px;"> Chọn khoa :</label>
        <select name="user_faculty" id="user_faculty">
            <?php
            while ($listFaculty = mysqli_fetch_array($data['listFaculty'])) {
            ?>
                <option value="<?= $listFaculty['faculty_name'] ?>">
                     <?= $listFaculty['faculty_name'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <label style="padding:8px;"> Chức Vụ :</label>
        <select value="Giảng Viên" name="user_lecturer" id="user_lecturer">
            <option value="Giảng Viên">Giảng Viên</option>
            <option value="Phó Khoa">Phó Khoa</option>
            <option value="Trưởng Khoa">Trưởng Khoa</option>
        </select>

        <button type="submit" id="submit" name="submit" class="modal_add-btn">Thêm</button>
        <!-- <button class="modal_cancel-btn">Hủy</button> -->

    </form>
</div>
<script src="/quanly_lv_tl/public/js/isnertLecturersAdmin.js"></script>