<?php
include_once __DIR__ . "/../../admin/context/category.php";
include_once __DIR__ . "/../../admin/context/post.php";
?>
<!-- ========== Sidebar Area ========== -->
<div class="col-12 col-md-8 col-lg-4">
    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Các bài viết nổi bật</h5>
            <div class="widget-content">
                <?php
                $postbyrandom = $post->get_post_by_random();
                if ($postbyrandom) {
                    while ($result = $postbyrandom->fetch_assoc()) {
                ?>
                        <!-- Single Blog Post -->
                        <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="<?php echo $result['Images'] ?>" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="single-blog.php?postID=<?php echo $result['postID'] ?>" class="headline">
                                    <h5 class="mb-0 rutgon3dong"><?php echo $result['Title'] ?></h5>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Bài viết mới nhất</h5>
            <div class="widget-content">
                <?php
                $limit = 3;
                $postbynew = $post->get_post_by_new($limit);
                if ($postbynew) {
                    while ($result = $postbynew->fetch_assoc()) {
                ?>
                        <!-- Single Blog Post -->
                        <div class="single-blog-post todays-pick">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="<?php echo $result['Images'] ?>" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content px-0 pb-0">
                                <a href="single-blog.php?postID=<?php echo $result['postID'] ?>" class="headline">
                                    <h5 class="rutgon2dong"><?php echo $result['Title'] ?></h5>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

        </div>
    </div>
</div>