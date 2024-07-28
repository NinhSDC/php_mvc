<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmallHall</title>
    <link rel="WebSite icon" type="png" href="/php_mvc/Public/Assets/img/imgLogo/logo.png">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/base.css">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/main.css">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/Cart_Button.css">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/toggleBtn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/php_mvc/Public/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="wrapper">
        <menu>
            <a href="#" class="action"><img class="img_logo_shoppe" src="/php_mvc/Public/Assets/img/logo-shopee-764x800.png" alt=""></a>
            <a href="#" class="action"><img class="img_logo_zalo" src="/php_mvc/Public/Assets/img/logo-zalo.jpg" alt=""></a>
            <a href="https://www.facebook.com/profile.php?id=61551923407887" class="action"><i class="fa-brands fa-facebook" style="color: #0866ff ; font-size: 34px; "></i></a>
            <a href="tel:0967311513" class="action icon_phone"><i class="fa-solid fa-phone-volume" style="color: #ffffff;"></i></i></a>
            <a href="" class="trigger"><i class="fa-solid fa-plus"></i></a>
        </menu>
        <?php
        // var_dump($_SESSION['accountTMP']);
        require_once "./MVC/Views/pages/blocks/header.php"; ?>
        <main>
            <?php
            require_once "./MVC/Views/pages/main/" . $data["page"] . ".php";
            ?>
        </main>

        <footer class="footer">
            <?php require_once "./MVC/Views/pages/blocks/footer.php"; ?>
        </footer>
    </div>
    <script>
        if (window.location.pathname === '/php_mvc/home' || window.location.pathname === '/php_mvc/home/') {
            var defaultUrl = '/php_mvc/'; // Thay đổi thành URL mặc định của bạn
            window.location.href = defaultUrl;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='/php_mvc/Public/JS/Cart_Button.js'></script>
    <script src='/php_mvc/Public/JS/toggleBtn.js'></script>
    <script src='/php_mvc/Public/JS/hoverfa-fade.js'></script>
    <script src='/php_mvc/Public/JS/Category_POST.js'></script>


</body>

</html>