<?php
include_once __DIR__ . "/../admin/context/post.php";
include_once __DIR__ . "/inc/divcomment.php";

if (!isset($_GET['postID']) || $_GET['postID'] == NULL) {
    header('Location: /baochi/pages-404.php');
    die();
}
$id = $_GET['postID'];
xuLyBinhLuan($id);
include_once __DIR__ . '/inc/header.php';
?>
<!-- Preloader Start -->
<div id="preloader">
    <div class="preload-content">
        <div id="world-load"></div>
    </div>
</div>
<!-- Preloader End -->
<?php
$showname = $post->show_post_one_by_cat($id);
if ($showname) {
    while ($result = $showname->fetch_assoc()) {
?>
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-600 bg-img background-overlay" style="background-image: url(<?php echo $result['Images'] ?>);">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="single-blog-title text-center">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="catagory.php?catID=<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></a></div>
                            <h3><?php echo $result['Title'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
?>
<!-- ********** Hero Area End ********** -->

<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $show = $post->show_post_one_by_cat($id);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
                    <!-- ============= Post Content Area ============= -->
                    <div class="col-12 col-lg-8">
                        <div class="single-blog-content mb-100">
                            <!-- Post Content -->
                            <div class="post-content">
                                <?php echo $result['Contents'] ?>
                                <!-- Post Meta -->
                                <div class="post-meta second-part">
                                    <p><?php echo $result['adminName'] ?> on <a href="#" class="post-date"><?php echo $result['CreatedDate'] ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <!-- ========== Sidebar Area ========== -->
            <?php
            include_once __DIR__ . '/inc/sidebar.php';
            ?>
            <!-- ========== End Sidebar Area ========== -->

            <!-- ============== Related Post ============== -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="title"><h5>Các bài viết cùng thể loại</h5></li>
            </ul>
            <div class="row">
                <?php
                $limit = 3;
                $show = $post->get_post_by_new($limit);
                if ($show) {
                    while ($result = $show->fetch_assoc()) {
                ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <!-- Single Blog Post -->
                            <div class="single-blog-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img style="height:235px;" src="<?php echo $result['Images'] ?>" alt="">
                                    <!-- Catagory -->
                                    <div class="post-cta"><a href="catagory.php?catID=<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></a></div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="single-blog.php?postID=<?php echo $result['postID'] ?>" class="headline">
                                        <h5 class="rutgon2dong"><?php echo $result['Title'] ?></h5>
                                    </a>
                                    <p class="rutgon3dong"><?php echo $result['Abstract'] ?></p>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p><?php echo $result['adminName'] ?> on <a href="#" class="post-date"><?php echo $result['CreatedDate'] ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="post-a-comment-area mt-70">
                        <h5>Bình luận</h5>
                        <!-- Contact Form -->
                        <form method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="userName" id="name" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nhập tên của bạn</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="comment" id="message" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nhập comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn world-btn">Đăng tải</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php inBinhLuan($id); ?>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/inc/footer.php';
    ?>