<div class="table_content">
    <button class="button_return" onclick="history.back()">TRỞ LẠI</button>

    <form onsubmit="return check_InsertFacultys()" name="form_insertfacultys" class="modal_form" method="POST">
        <label for="TenTenChuyenNganh">Tên Chuyên Ngành:</label>
        <input type="text" placeholder="Nhập Tên Chuyên Ngành" required="true" name="faculty_name" id="faculty_name">
        <label for="MaChuyenNganh">Mã Chuyên Ngành:</label>
        <input type="text" placeholder="Nhập Mã Chuyên Ngành" required="true" name="faculty_code" id="faculty_code">

        <button type="submit" id="submit" name="submit" class="modal_add-btn">Thêm</button>

    </form>
</div>
<script src="/quanly_lv_tl/public/js/isnertFacultysAdmin.js"></script>