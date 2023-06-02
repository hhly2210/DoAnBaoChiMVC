<?php
include_once __DIR__ . '/inc/header.php';
include_once __DIR__ . '/inc/slider.php';
include_once __DIR__ . "/../admin/context/post.php";
include_once __DIR__ . "/../admin/context/category.php";
if (!isset($_GET['catID']) || $_GET['catID'] == NULL) {
    header('Location: /baochi/pages-404.php');
    die();
}else{
    $id = $_GET['catID'];
}
?>
<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- ============= Post Content Area Start ============= -->
            <div class="col-12 col-lg-8">
                <div class="post-content-area mb-100">
                    <!-- Catagory Area -->
                    <div class="world-catagory-area">
                        <?php
                        $showname = $cat->show_category_one($id);
                        if ($showname) {
                            while ($result = $showname->fetch_assoc()) {
                        ?>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="title">
                                        <?php echo $result['catName'] ?>
                                    </li>
                                </ul>
                        <?php

                            }
                        }
                        ?>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                <?php
                                $limit = 7;
                                $postbycat = $post->get_post_by_category($id, $limit);
                                if ($postbycat) {
                                    while ($result = $postbycat->fetch_assoc()) {
                                ?>
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-4 d-flex align-items-center">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="<?php echo $result['Images'] ?>" alt="">
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
                                <?php
                                    }
                                }else{
                                    echo '<h4>Hiện chưa có bài viết nào cho thể loại trên</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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

            <!-- ========== Sidebar Area ========== -->
            <?php
            include_once __DIR__ . '/inc/sidebar.php';
            ?>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/inc/footer.php';
    ?>