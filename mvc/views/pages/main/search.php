<?php
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";

$total_page = null;
if (isset($data["totalPage"])) {
    $total_page = $data["totalPage"];
}

$current_page  = null;
if (isset($data['currentPage'])) {
    $data['currentPage'];
}

$products = [];
if (isset($data['products'])) {
    $products = $data['products'];
}

if (isset($data['results'])) {
    $results = $data['results'];
}

$error = null;
if (isset($data['error'])) {
    $error = $data['error'];
}

$brands = null;
if (isset($data['brands'])) {
    $brands = $data['brands'];
}

?>
<div class="KeySearchProducts grid wide row">
    <div style="display: none;" class="KeySearch l-12">
        <div class="KeySearch_1">
            <p>
                Tìm Kiếm :
            </p>
        </div>
        <div class="KeySearch_2">
            <div class="KeySearch_2_Content">
                <p>
                    Tìm Kiếm
                </p>
            </div>
        </div>
    </div>
    <div class="KeySearchTMP l-12">
        <div class="KeySearchTMP_1">
            <h2>Tìm Kiếm : <?php echo $_SESSION['Live_Search'] ?> </h2>
        </div>
    </div>
    <?php
    if ($products !== null && count($products) > 0) {
    ?>

        <div class="Sorted_By l-12">

        </div>
        <div class="resultKeySearch l-12">
            <div class="list_resultKeySearch l-12">
                <?php
                if ($products !== null && count($products) > 0) {
                    foreach ($data['products'] as $rowPoduct) {
                        if ($rowPoduct['PromotionPrice'] === null) {
                            $rowPoduct['PromotionPrice'] = $rowPoduct['Price'];
                            $Percent = 0;
                        } else {
                            $Percent = ($rowPoduct['Price'] - $rowPoduct['PromotionPrice']) / $rowPoduct['Price'] * 100;
                        }
                ?>
                        <div class="product_card customs_card_search l-2-8" onclick="viewProductSearch(this) " id="<?php echo $rowPoduct["Id"]; ?>">
                            <div class="product_card-img">
                                <?php
                                if ($Percent != 0) {
                                ?>
                                    <span class="product_card-img-discount"><?php echo $Percent; ?>%</span>
                                <?php
                                }
                                ?>
                                <span class="product_card-img-iconView">
                                    <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                </span>
                                <img src="<?php echo $rowPoduct['Path'] ?>" alt="">
                            </div>
                            <div class="product_card-info">
                                <div class="product_card-info-title">
                                    <div class="product_card-info-title-category-Search">
                                        <p class="info_p"><?php echo $rowPoduct['CategoryName'] ?></p>
                                    </div>
                                    <div class="product_card-info-title-name">
                                        <p><?php echo $rowPoduct["Name"]; ?></p>
                                    </div>
                                </div>
                                <div class="product_card-info-price">
                                    <?php
                                    if ($rowPoduct['Status'] === 0) {
                                    ?>
                                        <span class="info-price-sale">Sản phẩm ngừng kinh doanh</span>
                                    <?php
                                    } else {
                                    ?>

                                        <?php
                                        if ($Percent != 0) {
                                        ?>
                                            <span class="info-price-initial"><?php echo number_format($rowPoduct['Price'], 0, ',', '.') . '₫'; ?></span>
                                        <?php
                                        }
                                        ?>
                                        <span class="info-price-sale"><?php echo number_format($rowPoduct['PromotionPrice'], 0, ',', '.') . '₫'; ?>
                                            ₫</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <ul class="pagination mt-2 ml-2">
                <?php
                //HIỂN THỊ PHÂN TRANG
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    // echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
                    echo '<li class="page-item">
                                                            <a class="page-link" href="' . $actual_link . '/php_mvc/Search/Search_live/' . ($current_page - 1) . '">Sau</a>
                                                        </li>';
                }
                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<li class="page-item"><a class="page-link active" href="' . $actual_link . '/php_mvc/Search/Search_live/' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="' . $actual_link . '/php_mvc/Search/Search_live/' . $i . '">' . $i . '</a></li>';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li class="page-item">
                                                <a class="page-link" href="' . $actual_link . '/php_mvc/Search/Search_live/' . ($current_page + 1) . '">Trước</a>
                                            </li> ';
                }

                ?>
            </ul>
        </div>
    <?php
    } else {
        echo "
        <div style='height: 400px' class='container'>
            <h5 class='text-center'>Không tìm thấy sản phẩm phù hợp, vui lòng nhập từ khóa khác</h5>
        </div>
        ";
    }
    ?>
</div>