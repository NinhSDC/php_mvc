<?php

    $editLecturers = mysqli_fetch_array($data['editLecturers']);

?>
<div class="table_content">
  <button class="button_return" onclick="history.back()">TRỞ LẠI</button>

  <form onsubmit="return check_editLectures()" name="form_insertlectures" class="modal_form" method="POST"  enctype="multipart/form-data">
    <label for="TenGiangVien">Tên giảng viên:</label>
    <input value="<?= $editLecturers['user_name'] ?>" type="text" placeholder="Nhập tên giảng viên" required="true" name="user_name" id="user_name">
    <label for="TenGiangVien">Mã giảng viên:</label>
    <input value="<?= $editLecturers['user_code'] ?>" type="text" placeholder="Nhập mã giảng viên" required="true" name="user_code" id="user_code">
    <label for="TenGiangVien">Mật Khẩu :</label>

    <label for="fileUser_img">Chọn File Hình Ảnh:</label>
    <input type="file" id="fileUser_img" name="fileUser_img" >
    <input type="text" id="fileUser_img_tmp" name="fileUser_img_tmp" value="<?=$editLecturers['user_img']  ?>" readonly>

    <input value="<?= $editLecturers['user_password'] ?>" type="password" placeholder="Nhập mật khẩu" required="true" name="user_password" id="user_password">
    <label for="TenGiangVien">Mail giảng viên:</label>
    <input value="<?= $editLecturers['user_email'] ?>" type="email" placeholder="Nhập mail giảng viên" required="true" name="user_email" id="user_email">
    <label for="TenGiangVien">Số Điện Thoại:</label>
    <input value="<?= $editLecturers['user_tel'] ?>" type="text" placeholder="Nhập số điện thoại" required="true" name="user_tel" id="user_tel">
    <label style="padding:8px;"> Chọn khoa :</label>
    <select name="user_faculty" id="user_faculty">
      <?php
      while ($listFaculty = mysqli_fetch_array($data['listFaculty'])) {
      ?>
        <option id="<?= $listFaculty['faculty_name'] ?>" value="<?= $listFaculty['faculty_name'] ?>"><?= $listFaculty['faculty_name'] ?></option>
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

  </form>
</div>
<script src="/quanly_lv_tl/public/js/isnertLecturersAdmin.js"></script>
<script>
  var optionUserFaculty = "<?= $editLecturers['user_faculty']; ?>";
  var optionUserLecturer = "<?= $editLecturers['user_lecturer']; ?>";
  const selectUserFaculty = document.getElementById('user_faculty');
  const selectUserLecturer = document.getElementById('user_lecturer');
  const options1 = selectUserFaculty.options;
  const options2 = selectUserLecturer.options;

  for (let i = 0; i < options1.length; i++) {
    if (options1[i].value === optionUserFaculty) {
      options1[i].setAttribute('selected', true);
    } else {
      options1[i].removeAttribute('selected');
    }
  }
  for (let i = 0; i < options2.length; i++) {
    if (options2[i].value === optionUserLecturer) {
      options2[i].setAttribute('selected', true);
    } else {
      options2[i].removeAttribute('selected');
    }
  }
</script>