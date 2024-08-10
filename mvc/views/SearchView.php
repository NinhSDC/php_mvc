<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmallHall</title>
    <link rel="WebSite icon" type="png" href="/php_mvc/Public/Assets/img/LOGO-fix-07.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/base.css">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/main.css">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/Cart_Button.css">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/toggleBtn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/php_mvc/Public/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .limited-content {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            display: inline-block;
        }

        input[type="checkbox"][id^="myCheckbox"] {
            display: none;
        }

        label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
        }

        label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }

        label img {
            height: 50px;
            width: auto;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
        }

        :checked+label {
            border-color: #ddd;
        }

        :checked+label:before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
        }

        :checked+label img {
            transform: scale(0.9);
            /* box-shadow: 0 0 5px #333; */
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <menu>
            <a href="#" class="action"><img class="img_logo_shoppe"
                    src="/php_mvc/Public/Assets/img/logo-shopee-764x800.png" alt=""></a>
            <a href="#" class="action"><img class="img_logo_zalo" src="/php_mvc/Public/Assets/img/logo-zalo.jpg"
                    alt=""></a>
            <a href="https://www.facebook.com/profile.php?id=61551923407887" class="action"><i
                    class="fa-brands fa-facebook" style="color: #0866ff ; font-size: 34px; "></i></a>
            <a href="#" class="action icon_phone"><i class="fa-solid fa-phone-volume"
                    style="color: #ffffff;"></i></i></a>
            <a href="" class="trigger"><i class="fa-solid fa-plus"></i></a>
        </menu>
        <?php
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='/php_mvc/Public/JS/Cart_Button.js'></script>
    <script src='/php_mvc/Public/JS/toggleBtn.js'></script>
    <script src='/php_mvc/Public/JS/hoverfa-fade.js'></script>
    <script src='/php_mvc/Public/JS/Search.js'></script>
    <script src='/php_mvc/Public/JS/get-ID-ProductCard-Search.js'></script>


</body>

</html>