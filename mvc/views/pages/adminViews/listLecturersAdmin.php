<h1 >Danh sách giảng viên</h1>
<div class="middle_option_bar">
  <form action="" method="POST" class="middle_option_block">
    <div class="middle_option_block-item">
      <span><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>
      <input name="search" id="search" type="text" placeholder="Tìm kiếm.." />
    </div>
  </form>

  <div class="middle_option_block">
    <select id="select-category" onchange="Category()">
      <option selected disabled>Bộ Lọc</option>
      <option id="1" value="user_name">A-Z</option>
      <option id="2" value="user_id" >Mới Nhất</option>
    </select>
  </div>


</div>
<div class="table_content" style = "max-height : 35.5%;">
  <div class="heading-btn">
    <a href="/quanly_lv_tl/admin/addLecturersAdmin/" class="add-btn js-add-btn"><i class="fa-sharp fa-solid fa-plus" style="padding: 2px;"></i>Thêm giảng viên</a>
  </div>
  <table class="table-2_col">
    <thead>
      <tr>
        <th>Mã giảng viên</th>
        <th>Ảnh đại diện</th>
        <th>Tên giảng viên</th>
        <th>Chức vụ</th>
        <th>Cập Nhật</th>
        <th>Khóa</th>
      </tr>
    </thead>
    <tbody>
      <?php

        while ($listLecturers = mysqli_fetch_array($data['listLecturersGV'])) {
          ?>
            <tr>
              <td><?= $listLecturers['user_code'] ?></td>
              <td>
                <img style="height:150px;" src="/quanly_lv_tl/upfile/fileImg/<?= $listLecturers['user_img'] ?> " alt="">
              </td>
              <td><?= $listLecturers['user_name'] ?></td>
              <th><?= $listLecturers['user_lecturer'] ?></th>
              <td><a href="/quanly_lv_tl/admin/editLecturers/<?= $listLecturers['user_id'] ?>">
                   <i class="fa-sharp fa-solid fa-pen-to-square js-update-btn"></i>
              </a></td>
              <td><a href="/quanly_lv_tl/admin/lockLecturers/<?= $listLecturers['user_id'] ?>">
                  <i class="fa fa-lock"></i>
                </a></td>
            </tr>
          <?php
        }

      ?>

    </tbody>
  </table>
</div>
<script>
  selectedValueTMP = "<?=$data['selectedValue']?>";
  document.getElementById("select-category").value = selectedValueTMP;
</script>