<div class="table_content" style="max-height: 68.5%;">

    <button class="button_return" onclick="history.back()">TRỞ LẠI</button>

    <form id="check_userCodeAccount" class="modal_form" method="POST" enctype="multipart/form-data">


        <?php
        $infPostTopic = mysqli_fetch_array($data['infPostTopic']);
        ?>

        <label for="topic_name">Tên Đề Tài:</label>
        <input type="text" placeholder="Tên Đề Tài" required="true" name="topic_name" id="topic_name" value="<?= $infPostTopic['topic_name'] ?>" readonly>
        <!------------------------------------------------------------------------------------------------>
        <div class="radio">
            <label>Loại đề tài</label>
            <input type="text" value="<?= $infPostTopic['topic_sort'] ?>" readonly>
        </div>
        <!------------------------------------------------------------------------------------------------>



        <div class="radio">
            <label>Kiểu </label>
            <?php
            if ($infPostTopic['topic_gr-personal'] == 1) {
                $topic_gr_personal = "Cá Nhân";
                echo "<input type='text' value='$topic_gr_personal' readonly>";
            } else {
                $topic_gr_personal = "Nhóm";
                echo "<input type='text' value='$topic_gr_personal' readonly>";
            }
            ?>
        </div>
        <!------------------------------------------------------------------------------------------------>

        <label for="topic_img">Hình Ảnh Đề Tài:</label>
        <input type="text" placeholder="Hình Ảnh Chủ Đề" required="true" name="topic_img" id="topic_img" readonly value="https://site-images.similarcdn.com/image?url=ctuet.edu.vn&t=1&s=1&h=7504dcb8ee19f103b25fb873de0358b34210f2de6031607acd3f730267047359">
        <!------------------------------------------------------------------------------------------------>



        <label for="lecturer_id">Tên Giảng Viên Hướng Dẫn Đề Tài:</label>
        <select name="lecturer_id" id="lecturer_id" disabled>
            <?php

            while ($listLecturer = mysqli_fetch_array($data['listLecturer'])) {
            ?>
                <option id="<?= $listLecturer['user_id'] ?>">
                    <?= $listLecturer['user_name'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <!------------------------------------------------------------------------------------------------>

        <label for="faculty_id">Lớp học hiện tại:</label>
        <select name="faculty_id" id="faculty_id" disabled>
            <?php

            while ($listFaculty = mysqli_fetch_array($data['listFaculty'])) {
            ?>
                <option id="<?= $listFaculty['faculty_id'] ?>">
                    <?= $listFaculty['faculty_name'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <!------------------------------------------------------------------------------------------------>

        <label for="schoolyear_id">Sinh viên thuộc khóa mấy:</label>
        <input type="text" readonly value="<?= $infPostTopic['schoolyear_code']; ?>">
        <!------------------------------------------------------------------------------------------------>

        <label>Mô Tả Đề Tài:</label>
        <textarea rows="3" cols="100" readonly>
            <?= $infPostTopic['topic_description'] ?>
        </textarea>

        <!------------------------------------------------------------------------------------------------>
        <label for="topic_detail">Nội Dung Chi Tiết Đề Tài :</label>
        <textarea rows="10" cols="100" type="text" readonly>
             <?= $infPostTopic['topic_detail'] ?>
        </textarea>

    </form>
</div>
<style>
    textarea {
        margin-left: 15px;
        margin-bottom: 15px;
        border: 1px solid #838383;
        width: 97%;
        padding: 0.6rem;
    }


    .span {
        margin-left: 15px;
        color: red;
        font-size: 15px;
        line-height: 0.5;
        display: block;
    }
</style>
<script>
    var optionUserFaculty = "<?= $infPostTopic['faculty_id']; ?>";
    var optionUserLecturer = "<?= $infPostTopic['lecturer_id']; ?>";

    const selectUserFaculty = document.getElementById('faculty_id');
    const options1 = selectUserFaculty.options;

    for (let i = 0; i < options1.length; i++) {
        if (options1[i].id === optionUserFaculty) {
            options1[i].setAttribute('selected', true);
        } else {
            options1[i].removeAttribute('selected');
        }
    }
    const selectUserLecturer = document.getElementById('lecturer_id');
    const options2 = selectUserLecturer.options;

    for (let i = 0; i < options2.length; i++) {
        if (options2[i].id === optionUserLecturer) {
            options2[i].setAttribute('selected', true);
        } else {
            options2[i].removeAttribute('selected');
        }

    }
</script>