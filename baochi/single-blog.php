<?php
include_once __DIR__ . '/inc/header.php';
include_once __DIR__ . "/../admin/context/post.php";
if (!isset($_GET['postID']) || $_GET['postID'] == NULL) {
    header('Location: /baochi/pages-404.php');
    die();
} else {
    $id = $_GET['postID'];
}
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
                                    <img src="<?php echo $result['Images'] ?>" alt="">
                                    <!-- Catagory -->
                                    <div class="post-cta"><a href="#"><?php echo $result['catName'] ?></a></div>
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
                <div class="col-12 col-lg-8">
                    <div class="post-a-comment-area mt-70">
                        <h5>Bình luận</h5>
                        <!-- Contact Form -->
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="name" id="name" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nhập tên của bạn</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="message" id="message" required></textarea>
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

                <div class="col-12 col-lg-8">
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mt-70">
                        <ol>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content">
                                    <!-- Comment Meta -->
                                    <div class="comment-meta d-flex align-items-center justify-content-between">
                                        <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                        <a href="#" class="comment-reply btn world-btn">Trả lời</a>
                                    </div>
                                    <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
                                </div>
                                <ol class="children">
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <!-- Comment Meta -->
                                            <div class="comment-meta d-flex align-items-center justify-content-between">
                                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                <a href="#" class="comment-reply btn world-btn">Trả lời</a>
                                            </div>
                                            <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
                                        </div>
                                    </li>
                                </ol>
                            </li>

                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content">
                                    <!-- Comment Meta -->
                                    <div class="comment-meta d-flex align-items-center justify-content-between">
                                        <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                        <a href="#" class="comment-reply btn world-btn">Reply</a>
                                    </div>
                                    <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
                                </div>
                            </li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/inc/footer.php';
    ?>