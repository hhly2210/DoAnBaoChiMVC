<?php
include_once __DIR__ . '/inc/header.php';
include_once __DIR__ . '/inc/slider.php';
include_once __DIR__ . "/../admin/context/post.php";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Lấy tham số từ khóa tìm kiếm
    $s = trim(htmlspecialchars(addslashes($_GET['search'])));
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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="title">
                                <?php
                                    echo "Kết quả tìm kiếm cho từ khóa <strong>\"" . $search . "\"</strong>:";
                                ?>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                <?php
                                $limit = 7;
                                $postbysearch = $post->get_all_post_by_search_paging($limit, $s);
                                if ($postbysearch) {
                                    while ($result = $postbysearch->fetch_assoc()) {
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
                                    include_once __DIR__ . "/inc/paging.php";
                                } else {
                                    echo '<h4>Không tìm thấy kết quả nào.</h4>';
                                }
                                ?>
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