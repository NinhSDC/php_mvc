<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="/quanly_lv_tl/public/css/admin.css">
  <link rel="stylesheet" href="/quanly_lv_tl/public/fontawesome-free-6.1.1-web/css/all.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <title>Document</title>
</head>

<body>

  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <img src="/quanly_lv_tl/public/images/logo.png" alt="" />
          <h2>Admin</h2>
        </div>
        <div class="close" id="close-btn">
          <span class="material-symbols-sharp">close</span>
        </div>
      </div>

      <div class="sidebar">

        <a href="/php_mvc/admin/OrderManagementAdmin/" class="">
          <span class="material-symbols-sharp"> library_books </span>
          <h3>Quản lý đơn hàng</h3>
        </a>
        <a href="/php_mvc/admin/checkPostTopicAdmin/" class="">
          <span class="material-symbols-sharp">event</span>
          <h3>Đăng Bài</h3>
        </a>
        <a href="/php_mvc/admin/listLecturersAdmin/" class="">
          <span class="material-symbols-sharp">group</span>
          <h3>Quản lý giảng viên</h3>
        </a>
        <a href="/php_mvc/admin/listUserAdmin/" class="">
          <span class="material-symbols-sharp">group</span>
          <h3>Quản lý Sinh Viên</h3>
        </a>
        <a href="/php_mvc/admin/listUserLockAdmin/" class="">
          <span class="material-symbols-sharp">block</span>
          <h3>Quản lý Tài Khoản Khóa </h3>
        </a>
        <a href="/php_mvc/admin/listPostTopicAdmin/" class="">
          <span class="material-symbols-sharp"> folder </span>
          <h3>Quản lý Các Đề Tài</h3>
        </a>
        <a href="/php_mvc/Logout/">
          <span class="material-symbols-sharp">logout</span>
          <h3>Đăng xuất</h3>
        </a>
      </div>
    </aside>
    <!--*****************Hết thanh bên**************** -->

    <!--*****************Top Container**************** -->


    <main>
      <?php
      require_once "./mvc/views/pages/adminViews/TopContainer.php";
      require_once "./mvc/views/pages/adminViews/" . $data['page'] . ".php";
      ?>
    </main>
  </div>
</body>

</html>
<script src="../../public/js/admin.js"> </script>