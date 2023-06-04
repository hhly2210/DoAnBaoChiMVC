<?php
include_once __DIR__ . '/inc/header.php';
include_once __DIR__ . '/inc/slider.php';

?>

<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- ============= Post Content Area Start ============= -->
            <div class="col-12 col-lg-8">
                <div class="post-content-area mb-50">
                    <!-- Catagory Area -->
                    <?php
                    include_once __DIR__ . "/modules/doisong/doisong.php";
                    include_once __DIR__ . "/modules/thoisu/thoisu.php"
                    ?>
                </div>
            </div>

            <!-- ========== Sidebar Area ========== -->
            <?php
            include_once __DIR__ . '/inc/sidebar.php';
            ?>

        </div>
        <?php
            include_once __DIR__ . "/modules/showtruyenhinh/showtruyenhinh.php";
        ?>
        <!-- Load More btn -->
        <div class="row">
            <div class="col-12">
                <div class="load-more-btn mt-50 text-center">
                    <a href="#" class="btn world-btn">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . '/inc/footer.php';
?>