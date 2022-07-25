<?php
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }

    $this->clickLogin();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Vouchery</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/ulg/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/form_style.css">
    <script src="/scripts/script.js"></script>
</head>

<body>
    <div class="wrapper">

        <header class="header">
            <div class="dynamic-container">
                <a href="index.php" style="color: black;">
                    <h3 class="my-title">Vouchery</h3>
                </a>
                <div class="menu-group">
                    <form class="form-group form-outline float-left" action="search.php" method="$_GET">
                        <div class="form-group form-outline float-left">
                            <input type="text" id="search" name="keyword" class="form-control float-left"
                                placeholder="Tìm kiếm sản phẩm..." />
                        </div>
                        <button type="submit" class="btn my-button float-left">
                            <i class="bi-search"></i>
                            <span class="top-button-text">Tìm kiếm</span>
                        </button>
                    </form>
                    <button type="button" class="btn my-button float-left">
                        <i class="bi-cart"></i>
                        <a href="cart_invoke.php">
                            <span class="top-button-text">Giao dịch</span>
                        </a>
                    </button>
                    <button type="button" class="btn my-button float-left">
                        <i class="bi-person"></i>
                        <a href="user_invoke.php">
                            <span class="top-button-text">Tài khoản</span>
                        </a>
                    </button>
                </div>
            </div>
        </header>

        <nav class="nav-bar">
            <div class="dynamic-container">
                <div class="row">
                <div class="col-4 col-lg-2 nav-element">
                            <label>Shopee</label>
                            <a href="category.php?placeid=1" class="stretched-link"></a>
                        </div>
                        <div class="col-4 col-lg-2 nav-element">
                            <label>Lazada</label>
                            <a href="category.php?placeid=2" class="stretched-link"></a>
                        </div>
                        <div class="col-4 col-lg-2 nav-element">
                            <label>Tiki</label>
                            <a href="category.php?placeid=3" class="stretched-link"></a>
                        </div>
                        <div class="col-4 col-lg-2 nav-element">
                            <label>Sendo</label>
                            <a href="category.php?placeid=4" class="stretched-link"></a>
                        </div>
                        <div class="col-4 col-lg-2 nav-element">
                            <label>Freeship</label>
                            <a href="category.php?typeid=1" class="stretched-link"></a>
                        </div>
                        <div class="col-4 col-lg-2 nav-element">
                            <label>Giảm giá</label>
                            <a href="category.php?typeid=2" class="stretched-link"></a>
                        </div>
                </div>
            </div>
        </nav>

        <main class="content dynamic-container">
            <section class="h-100">
                <div class="container h-100">
                    <div class="row justify-content-md-center h-100">
                        <div class="card-wrapper">
                            <div class="card fat">
                                <div class="card-body">
                                    <h4 class="card-title">Đăng nhập</h4>
                                    <form method="POST" action="user_invoke.php">
                                        <div class="form-group">
                                            <label for="user_phone">Số điện thoại</label>
                                            <input id="user_phone" type="tel" class="form-control" name="user_phone"
                                                required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_password">Mật khẩu</label>
                                            <input id="user_password" type="password" class="form-control"
                                                name="user_password" required data-eye>
                                        </div>
                                        <?php
                                        if(isset($_GET["msg"]) && (($_GET["msg"] == "loginfail") || $_GET["msg"] == "loginusernotfound"))
                                        {
                                            echo '<span style="color: red;">Thông tin đăng nhập không đúng!</span>';
                                        }
                                        ?>
                                        <div class="form-group m-0">
                                            <button type="submit" name="login" class="btn btn-primary btn-block"
                                                value="login">
                                                Đăng nhập
                                            </button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            Chưa có tài khoản? <a href="signup.php">Đăng ký</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="dynamic-container">
                <div class="float-left">
                    <h6>CÔNG TY CỔ PHẦN VĂN A</h6>
                    <label>123 - 124 Nguyễn Văn A, Phường 2, Quận 10, TP. Hồ Chí Minh</label>
                    <h6>Liên hệ:</h6>
                    <label>0901 0000 - 0902 0000</label><br />
                    <label>cskh@mobileplanet.com</label><br />
                </div>
                <div id="social-media-logo" class="float-right">
                    <a class="mr-2" href="https://www.facebook.com/" target="_blank">
                        <i class="bi-facebook" style="color: black; font-size: 1.5rem;"></i>
                    </a>
                    <a class="mr-2" href="https://twitter.com/" target="_blank">
                        <i class="bi-twitter" style="color: black; font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank">
                        <i class="bi-youtube" style="color: black; font-size: 1.5rem;"></i>
                    </a>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>