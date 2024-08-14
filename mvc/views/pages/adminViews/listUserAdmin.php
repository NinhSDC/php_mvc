<div class="middle_option_bar">
  <form id="Search_Key" onsubmit="return check_Search_Key()" action="" method="POST" class="middle_option_block">
    <div class="middle_option_block-item">
      <span><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>
      <input name="search" id="search" type="text" placeholder="Tìm kiếm.." />
      <input id="category" name="category"  type="hidden">
      <input id="year" name="year"  type="hidden">
    </div>
  </form>

  <div class="middle_option_block">
    <select id="select-category" onchange="Category()">
      <option selected disabled>Bộ Lọc</option>
      <option id="1" value="user_name">A-Z</option>
      <option id="2" value="user_id">Mới Nhất</option>
    </select>
  </div>

  <div class="middle_option_block">
    <select id="select-schoolYear" onchange="SchoolYear()">
      <option selected disabled>Niên khóa</option>
      <?php
      while ($listSchoolYear = mysqli_fetch_array($data['listSchoolYear'])) {
      ?>
        <option id="<?= $listSchoolYear['schoolyear_id'] ?>" value="<?= $listSchoolYear['schoolyear_name'] ?>">
          <?= $listSchoolYear['schoolyear_name'] ?>
        </option>
      <?php
      }
      ?>
    </select>
  </div>

</div>
<div class="table_content" style = "max-height : 72%;">

  <table>
    <thead>
      <tr>
        <th>MSSV</th>
        <th>Tên SV </th>
        <th>Mail</th>
        <th>Tài Khoản</th>
        <th>Số Điện Thoại </th>
        <th>Cập Nhật </th>
        <th>Chi Tiết </th>
        <th>Khóa</th>
      </tr>
    </thead>
    <tbody>
      <?php

      while ($row = mysqli_fetch_array($data['listUserSV'])) {
      ?>
        <tr>
          <td><?= $row['user_code'] ?></td>
          <td><?= $row['user_name'] ?></td>
          <td><?= $row['user_email'] ?></td>
          <td><?= $row['user_account'] ?></td>
          <td><?= $row['user_tel'] ?></td>
          <td><a class="td_hover" href="/quanly_lv_tl/admin/editUserAdmin/<?= $row['user_id'] ?>">
              <i class="fa-regular fa-pen-to-square icons"></i>
            </a></td>
          <td><a class="td_hover" href="/quanly_lv_tl/admin/detailUserAdmin/<?= $row['user_id'] ?>">
              <i class="fa fa-info-circle icons" aria-hidden="true"></i>
            </a></td>
          <td><a class="td_hover" href="/quanly_lv_tl/admin/lockUser/<?= $row['user_id'] ?>">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </a></td>

        </tr>
      <?php
      }

      ?>



    </tbody>
  </table>
</div>
<style>
  .icons {
    font-size: 18px;
  }

  .td_hover {
    color: var(--color-primary);
  }

  .td_hover:hover {
    opacity: 0.75;
  }
</style>

<script>
  var selectedValueCategoryTMP;

  function check_CategoryTMP() {
    let category = document.getElementById('category');
    selectedValueCategoryTMP = "<?= $data['selectedValueCategory'] ?>";
    document.getElementById("select-category").value = selectedValueCategoryTMP;
    category.value = selectedValueCategoryTMP;
    return this.selectedValueCategoryTMP;
  }
</script>

<script>
  var selectedValueYearTMP;

  function check_SchoolYearTMP() {
    var year = document.getElementById('year');
    
    selectedValueYearTMP = "<?= $data['selectedValueYear'] ?>";
    document.getElementById("select-schoolYear").value = selectedValueYearTMP;
    year.value = selectedValueYearTMP;
    const select = document.getElementById('select-schoolYear');
    const options = select.options;
    for (let i = 0; i < options.length; i++) {
      if (options[i].value === selectedValueYearTMP) {
        options[i].setAttribute('selected', true);
      } else {
        options[i].removeAttribute('selected');
      }
    }
    return this.selectedValueYearTMP;

  }
</script>

<script>
  var inputValueSearchTMP ;
  function check_SearchTMP(){
    inputValueSearchTMP = "<?= $data['selectedValueSearch'] ?>";
    document.getElementById("search").value = inputValueSearchTMP;
    return this.inputValueSearchTMP;
  }
</script>