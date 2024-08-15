<?php

$GetAllOrder = $data['GetAllOrder'];
$currentStatus = $GetAllOrder['status'];
?>
<div class="table_content">
  <button class="button_return" onclick="history.back()">TRỞ LẠI</button>

  <form action="/php_mvc/Admin/EditOrder" method="POST" name="form_insertlectures" class="modal_form" enctype="multipart/form-data">
    <label for="TenGiangVien">Mã đơn hàng:</label>
    <input value="<?= $GetAllOrder['Id'] ?>" type="text" required="true" name="Id" id="Id" readonly>
    <label for="TenGiangVien">Tên người dùng:</label>
    <input value="<?= $GetAllOrder['nameOrder'] ?>" type="text" required="true" name="nameOrder" id="nameOrder">
    <label for="TenGiangVien">Phương thức thanh toán:</label>
    <input value="<?= $GetAllOrder['paymentMethod'] ?>" type="text" required="true" name="paymentMethod" id="paymentMethod" readonly>
    <label for="TenGiangVien">Số Điện Thoại:</label>
    <input value="<?= $GetAllOrder['phoneNumber'] ?>" type="text" required="true" name="phoneNumber" id="phoneNumber">
    <label for="TenGiangVien">Gmail:</label>
    <input value="<?= $GetAllOrder['email'] ?>" type="email" required="true" name="email" id="email">
    <label for="TenGiangVien">Tổng giá đơn hàng:</label>
    <input value="<?php echo number_format($GetAllOrder['totalAmount'], 0, ',', '.') . '₫'; ?>" required="true" name="totalAmount" id="totalAmount" readonly>

    <label style="padding:8px;"> Chọn trạng thái đơn hàng :</label>
    <select name="status" id="status">
      <option value="-1" <?= $currentStatus == -1 ? 'selected' : '' ?>>Hủy Đơn Hàng</option>
      <option value="0" <?= $currentStatus == 0 ? 'selected' : '' ?>>Chờ Duyệt Đơn</option>
      <option value="1" <?= $currentStatus == 1 ? 'selected' : '' ?>>Đơn Hàng Đang Được Vận Chuyển</option>
      <option value="2" <?= $currentStatus == 2 ? 'selected' : '' ?>>Đơn Hàng Được Giao Thành Công</option>
    </select>

    <input type="hidden" value="<?= $GetAllOrder['Id'] ?>" name="IdOrder" id="IdOrder">

    <button type="submit" id="submit" name="submit" class="modal_add-btn">Cập nhật </button>

  </form>
</div>
<script src="/quanly_lv_tl/public/js/isnertLecturersAdmin.js"></script>