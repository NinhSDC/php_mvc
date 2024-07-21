<?php
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
$total_page = $data["totalPage"];
$current_page = $data['currentPage'];

?>
<div id="wrapper">

    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
                <div class="first-slot">
                    <div class="masonry-box post-media">
                        <img src="<?php echo $actual_link ?>/php_mvc/Public/khoa/images/OIG_1.jpg" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange"><a href="tech-category-01.html" title="">Technology</a></span>
                                    <h4><a href="tech-single.html" title="">Say hello to truly high-tech office
                                            furniture! Top design and convenience</a></h4>
                                    <small><a href="tech-single.html" title="">24 October, 2023</a></small>
                                    <small><a href="tech-author.html" title="">by Amanda</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end first-side -->

                <div class="second-slot">
                    <div class="masonry-box post-media">
                        <img src="<?php echo $actual_link ?>/php_mvc/Public/khoa/images/OIG_2.jpg" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange"><a href="tech-category-01.html" title="">Gadgets</a></span>
                                    <h4><a href="tech-single.html" title="">Do not make mistakes when choosing web
                                            hosting</a></h4>
                                    <small><a href="tech-single.html" title="">03 July, 2017</a></small>
                                    <small><a href="tech-author.html" title="">by Jessica</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end second-side -->

                <div class="last-slot">
                    <div class="masonry-box post-media">
                        <img src="<?php echo $actual_link ?>/php_mvc/Public/khoa/images/OIG_3.jpg" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange"><a href="tech-category-01.html" title="">Technology</a></span>
                                    <h4><a href="tech-single.html" title="">Rise of Artificial Intelligence: Exciting
                                            Applications and Limitless Potential</a></h4>
                                    <small><a href="tech-single.html" title="">01 Octoer, 2023</a></small>
                                    <small><a href="tech-author.html" title="">by Jessica</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end second-side -->
                <div class="second-slot">
                    <div class="masonry-box post-media">
                        <img src="<?php echo $actual_link ?>/php_mvc/Public/khoa/images/OIG_4.jpg" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange"><a href="tech-category-01.html" title="">Gadgets</a></span>
                                    <h4><a href="tech-single.html" title="">Intel Application Optimizer helps Core
                                            i9-14900K increase up to 31% fps</a></h4>
                                    <small><a href="tech-single.html" title="">03 July, 2017</a></small>
                                    <small><a href="tech-author.html" title="">by Jessica</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end second-side -->

                <div class="last-slot">
                    <div class="masonry-box post-media">
                        <img src="<?php echo $actual_link ?>/php_mvc/Public/khoa/images/OIG_5.jpg" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange"><a href="tech-category-01.html" title="">Technology</a></span>
                                    <h4><a href="tech-single.html" title="">Innovations in Electronics: The Rise of
                                            Eco-Friendly Tech Products</a></h4>
                                    <small><a href="tech-single.html" title="">01 October, 2023</a></small>
                                    <small><a href="tech-author.html" title="">by Jessica</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end second-side -->
            </div><!-- end masonry -->

        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-top clearfix">
                            <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                        </div><!-- end blog-top -->

                        <div class="blog-list clearfix">
                            <?php
                            while ($row = sqlsrv_fetch_array($data['news'], SQLSRV_FETCH_ASSOC)) {

                                $datetime = "2022-05-10 20:08:08";
                                $date = (new DateTime($datetime))->format('Y-m-d');

                                $imgPath =  $row["Image"]  ?? "<?=$actual_link?>/php_mvc/Public/khoa/images/anonymous_1.jpg";
                            ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="<?php echo $actual_link ?>/php_mvc/TechnologyInf/Detail/<?php echo $row["Id"] ?>" title="">
                                                <img src="<?php echo $imgPath ?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="<?php echo $actual_link ?>/php_mvc/TechnologyInf/Detail/<?php echo $row["Id"] ?>" title=""><?php echo $row["Title"] ?></a></h4>
                                        <p class="limited-content"><?php echo $row["Description"] ?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">Gadgets</a></small>
                                        <small><a href="tech-single.html" title=""><?php echo $date ?></a></small>
                                        <small><a href="tech-author.html" title="">by Admin</a></small>
                                        <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i>
                                                1114</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                            <?php
                            } ?>


                            <hr class="invis">


                        </div><!-- end blog-list -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-start">
                                    <?php //HIỂN THỊ PHÂN TRANG
                                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                    if ($current_page > 1 && $total_page > 1) {
                                        // echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
                                        echo '<li class="page-item">
                                                        <a class="page-link" href="' . $actual_link . '/php_mvc/TechnologyInf/Index/' . ($current_page - 1) . '">Prev</a>
                                                    </li>';
                                    }


                                    // Lặp khoảng giữa
                                    for ($i = 1; $i <= $total_page; $i++) {
                                        // Nếu là trang hiện tại thì hiển thị thẻ span
                                        // ngược lại hiển thị thẻ a
                                        if ($i == $current_page) {
                                            echo '<li class="page-item"><a class="page-link active" href="' . $actual_link . '/php_mvc/TechnologyInf/Index/' . $i . '">' . $i . '</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="' . $actual_link . '/php_mvc/TechnologyInf/Index/' . $i . '">' . $i . '</a></li>';
                                        }
                                    }

                                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                    if ($current_page < $total_page && $total_page > 1) {
                                        echo '<li class="page-item">
                                            <a class="page-link" href="' . $actual_link . '/php_mvc/TechnologyInf/Index/' . ($current_page + 1) . '">Next</a>
                                        </li> ';
                                    }
                                    ?>
                                    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
                                    <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li> -->
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="<?php echo $actual_link ?>/php_mvc/Public/khoa/images/banner_2.jpg" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Trending</h2>
                            <div class="trend-videos">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="#" title="">
                                            <img src="/php_mvc/Public/khoa/images/OIG_6.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <!-- <span class="videohover"></span> -->
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="#" title="">We prepared the best 10 laptop presentations for
                                                you</a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="tech-single.html" title="">
                                            <img src="/php_mvc/Public/khoa/images/OIG_7.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <!-- <span class="videohover"></span> -->
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="#" title="">We are guests of ABC Design Studio - Vlog</a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="tech-single.html" title="">
                                            <img src="/php_mvc/Public/khoa/images/OIG_8.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <!-- <span class="videohover"></span> -->
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="tech-single.html" title="">Both blood pressure monitor and
                                                intelligent clock</a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end videos -->
                        </div><!-- end widget -->

                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var contentDiv = document.querySelectorAll(".limited-content");
        var maxWords = 35; // Số từ tối đa

        console.log(contentDiv);

        contentDiv.forEach(i => {
            const content = i.textContent.trim().split(/\s+/);
            if (content.length > maxWords) {
                i.textContent = content.slice(0, maxWords).join(" ") + " ...";
            }
        })

    });
</script>