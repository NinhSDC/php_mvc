<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/loginRegister.css">
    <link rel="stylesheet" href="/php_mvc/Public/CSS/loading.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <title>SmallHall</title>
    <link rel="WebSite icon" type="png" href="/php_mvc/Public/Assets/img/LOGO-fix-07.png">
</head>

<body>
    <div class="container_loading">
        <div class="loading">
            <div class="📦"></div>
            <div class="📦"></div>
            <div class="📦"></div>
            <div class="📦"></div>
            <div class="📦"></div>
        </div>
    </div>
    <div class="auth-wrapper">

        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Đăng Nhập
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">Hoặc đăng nhập bằng:</p>
                        <p style="color : red ; ">
                            <?php
                            if (isset($_COOKIE['error'])) {
                                $cookieValue = $_COOKIE['error'];
                                if ($cookieValue === "AccountNULL") {
                                    echo "Tài Khoản Không Tồn Tại";
                                } elseif ($cookieValue === "AccountFalse") {
                                    echo "Sai Tài Khoản Hoặc Mật Khẩu";
                                }elseif ($cookieValue === "errorSystem") {
                                    echo "Lỗi Hệ Thống ,chúng tôi sẽ khắc phụ sự cố sớm nhất có thể !!!";
                                }
                            }
                            ?>
                        </p>
                        <p style="color : #228B22;  font-weight: bold; ">
                            <?php
                            if (isset($_COOKIE['success'])) {
                                $cookieValue = $_COOKIE['success'];
                                if ($cookieValue === "AccountSuccess") {
                                    echo "Đăng Ký Tài Khoản Thành Công .";
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <form class="login-form" name="form_login" action="/php_mvc/Login" method="POST">
                        <input type="email" name="username" class="auth-form-input" placeholder="Email" required="true">
                        <div class="input-icon">
                            <input type="password" name="password" class="auth-form-input" placeholder="Password" required="true">
                            <i class="fa fa-eye show-password" onclick="togglePasswordVisibility(this)"></i>
                        </div>
                        <label class="btn active">
                            <input type="checkbox" name="email1" checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i>
                            <span> Nhớ mật khẩu.</span>
                        </label>
                        <div class="footer-action">
                            <input type="submit" name="submit" value="Đăng Nhập" class="auth-submit">
                            <a href="/php_mvc/Register" class="auth-btn-direct">Đăng ký</a>
                        </div>
                    </form>

                    <div class="auth-forgot-password">
                        <a href="#">Quên mật khẩu</a>
                    </div>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <a href="/php_mvc/">
                        <img src="/php_mvc/Public/Assets/img/imgLogo/Logo.png" alt="login">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    $_POST = array();
    ?>
    <script src="/php_mvc/Public/JS/loginRegister.js"></script>
    <script src='/php_mvc/Public/JS/loading.js'></script>

</body>

</html>