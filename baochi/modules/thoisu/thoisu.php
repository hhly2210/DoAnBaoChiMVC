<?php
include_once __DIR__ . "/../../../admin/context/category.php";
include_once __DIR__ . "/../../../admin/context/post.php";
?>
<div class="world-catagory-area mt-50">
    <ul class="nav nav-tabs" id="myTab2" role="tablist">
        <li class="title">Thời sự</li>
    </ul>

    <div class="tab-content" id="myTabContent2">

        <div class="tab-pane fade show active" id="world-tab-10" role="tabpanel" aria-labelledby="tab10">
            <div class="row">

                <!-- Single Blog Post -->
                <?php
                // Thời sự 30
                $idtheloai = 30;
                $limit = 2;
                $postbycat = $post->get_post_by_category($idtheloai, $limit);
                if ($postbycat) {
                    $datadelay = 0.1;
                    while ($result = $postbycat->fetch_assoc()) {
                        $datadelay += 0.1;
                ?>
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post wow fadeInUpBig" data-wow-delay="<?php echo $datadelay ?>s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img style="height:225px;" src="<?php echo $result['Images'] ?>" alt="">
                                    <!-- Catagory -->
                                    <div class="post-cta"><a href="catagory.php?catID=<?php echo $result['catID']?>"><?php echo $result['catName'] ?></a></div>
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

                <div class="col-12">
                    <div class="world-catagory-slider2 owl-carousel wow fadeInUpBig" data-wow-delay="0.4s">
                        <!-- ========= Single Catagory Slide ========= -->
                        <div class="single-cata-slide">
                            <div class="row">
                                <?php
                                // Thời sự 30
                                $limit = 4;
                                $postbycat = $post->get_post_by_category($idtheloai, $limit);
                                if ($postbycat) {
                                    while ($result = $postbycat->fetch_assoc()) {
                                ?>
                                        <div class="col-12 col-md-6">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="<?php echo $result['Images'] ?>" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="single-blog.php?postID=<?php echo $result['postID'] ?>" class="headline">
                                                        <h5 class="rutgon2dong"><?php echo $result['Title'] ?></h5>
                                                    </a>
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
                        </div>
                        <!-- ========= Single Catagory Slide ========= -->
                        <div class="single-cata-slide">
                            <div class="row">
                                <?php
                                // Thời sự 30
                                $limit = 4;
                                $postbycat = $post->get_post_by_category($idtheloai, $limit);
                                if ($postbycat) {
                                    while ($result = $postbycat->fetch_assoc()) {
                                ?>
                                        <div class="col-12 col-md-6">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="<?php echo $result['Images'] ?>" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="single-blog.php?postID=<?php echo $result['postID'] ?>" class="headline">
                                                        <h5 class="rutgon2dong"><?php echo $result['Title'] ?></h5>
                                                    </a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>