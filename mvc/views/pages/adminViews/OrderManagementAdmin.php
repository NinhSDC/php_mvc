<h1 style="padding: 10px;">Danh sách chuyên ngành</h1>
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
      <option id="1" value="faculty_name">A-Z</option>
      <option id="2" value="faculty_id">Mới Nhất</option>
    </select>
  </div>


</div>
<div class="table_content" style="max-height:65%; ">
  <div class="heading-btn">
    <a href='/quanly_lv_tl/admin/addFacultyAdmin/' class="add-btn js-add-btn"><i class="fa-sharp fa-solid fa-plus" style="padding: 2px;"></i>Thêm chuyên ngành</a>
  </div>
  <table class="table-2_col">
    <thead>
      <tr>
        <th>Mã đơn hàng</th>
        <th>Trạng thái</th>
        <th>Sửa</th>
      </tr>
    </thead>
    <tbody>
      <?php

      while ($listFaculty = mysqli_fetch_array($data['getAllOrder'])) {
      ?>
        <tr>
          <td><?= $listFaculty['faculty_code'] ?></td>
          <td><?= $listFaculty['faculty_name'] ?></td>
          <td>
            <a href="/quanly_lv_tl/admin/editFacultyAdmin/<?= $listFaculty['faculty_id'] ?>">
              <i class="fa-sharp fa-solid fa-pen-to-square js-update-btn"></i>
            </a>
          </td>
        </tr>
      <?php
      }

      ?>
    </tbody>
  </table>
</div>
<script>
  selectedValueTMP = "<?= $data['selectedValue'] ?>";
  document.getElementById("select-category").value = selectedValueTMP;
</script>