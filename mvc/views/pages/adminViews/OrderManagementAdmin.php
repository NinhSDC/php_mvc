<?php
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
$total_page = $data["totalPage"];
$current_page = $data['currentPage'];
?>
<h1 style="padding: 10px;">Quản lý đơn hàng</h1>
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
<div class="table_content">
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

      foreach ($data['GetAllOrder'] as $order) {
        $ShipStatus = $order['status']
      ?>
        <tr>
          <td>#<?= $order['Id'] ?></td>
          <td>
            <?php
            if ($ShipStatus === "0") {
              echo "Chờ Duyệt Đơn...";
            } elseif ($ShipStatus === "1") {
              echo "Đơn Hàng Đang Được Vận Chuyển...";
            } elseif ($ShipStatus === "2") {
              echo "Đã Nhận Hàng";
            } elseif ($ShipStatus === "-1") {
              echo "Đơn Hàng Đã Được Hủy";
            } ?>
          </td>
          <td>
            <a href="/php_mvc/admin/InfoOrderAdmin/<?= $order['Id'] ?>">
              <i class="fa-sharp fa-solid fa-pen-to-square js-update-btn"></i>
            </a>
          </td>
        </tr>
      <?php
      }

      ?>
    </tbody>
    <ul class="pagination mt-2">
      <?php //HIỂN THỊ PHÂN TRANG
      // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
      if ($current_page > 1 && $total_page > 1) {
        // echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
        echo '<li class="page-item">
               <a class="page-link" href="' . $actual_link . '/php_mvc/admin/OrderManagementAdmin/' . ($current_page - 1) . '">Sau</a>
              </li>';
      }
      // Lặp khoảng giữa
      for ($i = 1; $i <= $total_page; $i++) {
        // Nếu là trang hiện tại thì hiển thị thẻ span
        // ngược lại hiển thị thẻ a
        if ($i == $current_page) {
          echo '<li class="page-item"><a class="page-link active" href="' . $actual_link . '/php_mvc/admin/OrderManagementAdmin/' . $i . '">' . $i . '</a></li>';
        } else {
          echo '<li class="page-item"><a class="page-link" href="' . $actual_link . '/php_mvc/admin/OrderManagementAdmin/' . $i . '">' . $i . '</a></li>';
        }
      }

      // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
      if ($current_page < $total_page && $total_page > 1) {
        echo '<li class="page-item">
                                            <a class="page-link" href="' . $actual_link . '/php_mvc/admin/OrderManagementAdmin/' . ($current_page + 1) . '">Trước</a>
                                        </li> ';
      }
      ?>
    </ul>
  </table>
</div>
<script>
  selectedValueTMP = "<?= $data['selectedValue'] ?>";
  document.getElementById("select-category").value = selectedValueTMP;
</script>