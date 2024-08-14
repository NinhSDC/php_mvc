<div class="total_block">
  <div class="total_block-item">
    <p>Tổng số chuyên ngành </p>
    <?php
    $numberFaculty = 0;
    while ($listnumberFaculty = mysqli_fetch_array($data['numberFaculty'])) {
      $numberFaculty++;
    }
    ?>
    <h2><?= $numberFaculty; ?></h2>
  </div>
  <div class="total_block-item">
    <p>Tổng số đề tài </p>
    <?php
    $numberTopic = 0;
    while ($listnumberTopic = mysqli_fetch_array($data['numberTopic'])) {
      $numberTopic ++;
    }
    ?>
    <h2><?= $numberTopic; ?></h2>
  </div>
  <div class="total_block-item">
    <p>Tổng số giảng viên</p>
    <?php
    $numberUserGV = 0;
    while ($listNumberUserGV = mysqli_fetch_array($data['numberUserGV'])) {
      $numberUserGV++;
    }
    ?>
    <h2><?= $numberUserGV; ?></h2>
  </div>
  <div class="total_block-item">
    <p>Tổng số sinh viên</p>
    <?php
    $numberUser = 0;
    while ($listNumberUser = mysqli_fetch_array($data['numberUser'])) {
      $numberUser++;
    }
    ?>
    <h2><?= $numberUser; ?></h2>
  </div>
</div>