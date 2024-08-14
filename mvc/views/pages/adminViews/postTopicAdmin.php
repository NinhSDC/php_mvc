<div  class="table_content" style = "max-height: 67%;">

    <form id="check_userCodeAccount" class="modal_form" method="POST" enctype="multipart/form-data">

        <label for="topic_name">Tên Đề Tài:</label>
        <input type="text" placeholder="Tên Đề Tài" required="true" name="topic_name" id="topic_name">
        <!------------------------------------------------------------------------------------------------>
        <div class="radio">
            <label>Luận Văn</label>
            <input name="topic_sort" id="topic_sort" type="radio" value="Luận Văn" checked="checked" />
            <label>Tiểu Luận</label>
            <input name="topic_sort" id="topic_sort" type="radio" value="Tiểu Luận" />
        </div>
        <!------------------------------------------------------------------------------------------------>

        

        <div class="radio">
            <label>Cá nhân</label>
            <input name="topic_gr-personal" id="topic_gr-personal" type="radio" value="1" checked="checked" />
            <label>Nhóm</label>
            <input name="topic_gr-personal" id="topic_gr-personal" type="radio" value="2" />
        </div>
        <!------------------------------------------------------------------------------------------------>

        <label for="topic_img">Hình Ảnh Đề Tài:</label>
        <input type="text" placeholder="Hình Ảnh Chủ Đề" required="true" name="topic_img" id="topic_img" readonly value="https://site-images.similarcdn.com/image?url=ctuet.edu.vn&t=1&s=1&h=7504dcb8ee19f103b25fb873de0358b34210f2de6031607acd3f730267047359">
        <!------------------------------------------------------------------------------------------------>

       

        <label for="lecturer_id">Tên Giảng Viên Hướng Dẫn Đề Tài:</label>
        <select name="lecturer_id" id="lecturer_id">
            <?php
            while ($listLecturers = mysqli_fetch_array($data['listLecturers'])) {
            ?>
                <option id="<?= $listLecturers['user_id'] ?>" value="<?= $listLecturers['user_id'] ?>">
                    <?= $listLecturers['user_name'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <!------------------------------------------------------------------------------------------------>

        <label for="faculty_id">Lớp học hiện tại:</label>
        <select name="faculty_id" id="faculty_id">
            <?php
            while ($listFaculty = mysqli_fetch_array($data['listFaculty'])) {
            ?>
                <option id="<?= $listFaculty['faculty_id'] ?>" value="<?= $listFaculty['faculty_id'] ?>">
                    <?= $listFaculty['faculty_name'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <!------------------------------------------------------------------------------------------------>

        <label for="schoolyear_id">Sinh viên thuộc khóa mấy:</label>
        <select name="schoolyear_id" id="schoolyear_id">
            <?php
            while ($listSchoolyear = mysqli_fetch_array($data['listSchoolyear'])) {
            ?>
                <option id="<?= $listSchoolyear['schoolyear_id'] ?>" value="<?= $listSchoolyear['schoolyear_id'] ?>">
                    <?= $listSchoolyear['schoolyear_code'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <!------------------------------------------------------------------------------------------------>
        
        
        <label for="fileUpload">Chọn File tài liệu đính kèm:</label>
        <input type="file" id="fileUpload" name="fileName[]" required="true" multiple>
        <div class="radio">
            <label for="">
             <span id="fileName"></span>
            </label>
        </div>
        
        <label for="topic_description">Mô Tả Đề Tài:</label>
        <textarea rows="5" cols="100" placeholder="Nội Dung" required="true" name="topic_description" id="topic_description"></textarea>
        <!------------------------------------------------------------------------------------------------>

        <label for="topic_detail">Nội Dung Chi Tiết Đề Tài :</label>
        <textarea rows="5" cols="100" type="text" placeholder="Nội Dung " required="true" name="topic_detail" id="topic_detail"></textarea>
        <!------------------------------------------------------------------------------------------------>

        <span class="span">Định Dạng File Cho Phép : '.zip','.docx','.doc','.xls','.xlsx'.,'.png','.jpg','.jpeg','.ppt','.pttx' . </span></br>
        <span class="span">Tổng Kích Cỡ File Cho Phép Không Vượt Quá 25MB . </span></br>
        <span class="span">Không Bỏ Trống File tài Liệu Đính Kèm . </span></br>
        

        <button type="submit" id="submit" name="submit" class="modal_add-btn">Đăng Bài</button>
    </form>
</div>
<style>

    textarea {
        margin-left: 15px;
        margin-bottom: 15px;
        border: 1px solid #838383;
        width: 97%;
        padding:0.6rem;
    }
    

    .span {
        margin-left: 15px;
        color: red;
        font-size: 15px;
        line-height:0.5;
        display:block;
    }
</style>
<script>
    const input = document.querySelector('#fileUpload');
    const fileListDisplay = document.querySelector('#fileName');

    input.addEventListener('change', () => {
        fileListDisplay.innerHTML = '';
        for (const file of input.files) {
            fileListDisplay.innerHTML += `<p>${file.name}</p>`;
        }
    });
</script>