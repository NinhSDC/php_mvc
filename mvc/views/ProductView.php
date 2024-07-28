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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/php_mvc/Public/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <?php require_once "./MVC/Views/pages/blocks/header.php"; ?>
        <main>
            <?php
            require_once "./MVC/Views/pages/detail/" . $data["page"] . ".php";
            ?>
        </main>
        <footer class="footer">
            <?php require_once "./MVC/Views/pages/blocks/footer.php"; ?>
        </footer>

    </div>
    <div onclick="block_tab()" class='block-tab' id="blockTab">
        <span class="close"><i class="fa-solid fa-xmark"></i></span>
        <div class='block-tab_img' onclick="stopPropagation(event)">
            <img src="" class="ProductImg-tab">
            <div class="detailProduct_buttons_navigation" style="position: absolute; z-index: 3001;">
                <button onclick="changeImages('Previous')" class="detailProduct_pre-btn">
                    &lt;
                </button>
                <button onclick="changeImages('Next')" class="detailProduct_nxt-btn">
                    &gt;
                </button>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='/php_mvc/Public/JS/select_thumbnails.js'></script>
<script src='/php_mvc/Public/JS/block_tab.js'></script>
<script src='/php_mvc/Public/JS/up-and-down-product.js'></script>
<script src='/php_mvc/Public/JS/Cart_Button.js'></script>
<script src='/php_mvc/Public/JS/get-ID-ProductCard.js'></script>
<script src='/php_mvc/Public/JS/toggleBtn.js'></script>


<!-- bootstrap -->

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>