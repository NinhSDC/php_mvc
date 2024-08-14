<div class="total_block">
  <div class="total_block-item">
    <p>Tổng số đơn hàng </p>
    <?php
    $NumberOrders = $data['NumberOrders'];
    ?>
    <h2><?= $NumberOrders; ?></h2>
  </div>
  <div class="total_block-item">
    <p>Tổng sản phẩm còn hàng</p>
    <?php
    $NumberProductsActive = $data['NumberProductsActive'];
    $NumberProductsNoActive = $data['NumberProductsNoActive'];
    ?>
    <h2><?= $NumberProductsActive; ?> </h2>
  </div>
  <div class="total_block-item">
    <p>Tổng số người dùng </p>
    <?php
    $NumberUsers = $data['NumberUsers'];
    ?>
    <h2><?= $NumberUsers; ?></h2>
  </div>
  <div class="total_block-item">
    <p style="color: red;">Tổng đơn hàng chờ duyệt</p>
    <?php
    $NumberOrderPendingApproval = $data['NumberOrderPendingApproval'];
    ?>
    <h2 style="color: red;"><?= $NumberOrderPendingApproval; ?></h2>
  </div>
</div>