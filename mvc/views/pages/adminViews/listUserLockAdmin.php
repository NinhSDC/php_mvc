<div class="middle_option_bar">
  <form id="Search_Key" onsubmit="return check_Search_Key()" action="" method="POST" class="middle_option_block">
    <div class="middle_option_block-item">
      <span><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>
      <input name="search" id="search" type="text" placeholder="Tìm kiếm.." />
      <input id="category" name="category"  type="hidden">
      <input id="year" name="year"  type="hidden">
    </div>
  </form>

</div>
<div class="table_content" >

  <table>
    <thead>
      <tr>
        <th>MSSV</th>
        <th>Tên SV </th>
        <th>Mail</th>
        <th>Tài Khoản</th>
        <th>Số Điện Thoại </th>
        <th>Chi Tiết </th>
        <th>Mở Khóa</th>
      </tr>
    </thead>
    <tbody>
      <?php

      while ($row = mysqli_fetch_array($data['listUserLockSV'])) {
      ?>
        <tr>
          <td><?= $row['user_code'] ?></td>
          <td><?= $row['user_name'] ?></td>
          <td><?= $row['user_email'] ?></td>
          <td><?= $row['user_account'] ?></td>
          <td><?= $row['user_tel'] ?></td>
          <td><a class="td_hover" href="/quanly_lv_tl/admin/infUserLockAdmin/<?= $row['user_id'] ?>">
              <i class="fa fa-info-circle icons" aria-hidden="true"></i>
            </a></td>
          <td><a class="td_hover" href="/quanly_lv_tl/admin/unlockUser/<?= $row['user_id'] ?>">
              <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            </a></td>

        </tr>
      <?php
      }

      ?>



    </tbody>
  </table>
</div>
<script>
  var inputValueSearchTMP ;
  function check_SearchTMP(){
    inputValueSearchTMP = "<?= $data['selectedValueSearch'] ?>";
    document.getElementById("search").value = inputValueSearchTMP;
    return this.inputValueSearchTMP;
  }
</script>
