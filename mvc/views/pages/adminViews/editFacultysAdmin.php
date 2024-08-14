<?php
    $editFaculty = mysqli_fetch_array($data['editFaculty']);
?>
<div class="table_content">
    <button class="button_return" onclick="history.back()">TRỞ LẠI</button>
    <form onsubmit="return check_InsertFacultys()" name="form_insertlectures" class="modal_form" method="POST">
        <label for="faculty_code">Mã chuyên ngành:</label>
        <input type="text" placeholder="Mã chuyên ngành" required="true" name="faculty_code" id="faculty_code" value="<?=$editFaculty['faculty_code']?>" >
        <label for="faculty_name">Tên chuyên ngành:</label>
        <input type="text" placeholder="Tên chuyên ngành" required="true" name="faculty_name" id="faculty_name" value="<?=$editFaculty['faculty_name']?>" >
        
        <button type="submit" id="submit" name="submit" class="modal_add-btn">Cập Nhật</button>
    </form>
</div>
<script src="/quanly_lv_tl/public/js/isnertFacultysAdmin.js"></script>