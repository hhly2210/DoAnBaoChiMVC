<?php
include_once __DIR__ . "/../../../admin/context/category.php";
include_once __DIR__ . "/../../../admin/context/post.php";
?>

<div class="world-catagory-area">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="title">Đời sống</li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="world-catagory-slider owl-carousel wow fadeInUpBig" data-wow-delay="0.1s">
                        <?php
                        // Đời sống 23
                        $idtheloai = 23;
                        $limit = 4;
                        $postbycat = $post->get_post_by_category($idtheloai, $limit);
                        if ($postbycat) {
                            while ($result = $postbycat->fetch_assoc()) {
                        ?>
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
                        <?php

                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <?php
                    // Đời sống 23
                    $limit = 5;
                    $postbycat = $post->get_post_by_category($idtheloai, $limit);
                    if ($postbycat) {
                        $datadelay = 0.1;
                        while ($result = $postbycat->fetch_assoc()) {
                            $datadelay += 0.1;
                    ?>
                            <!-- Single Blog Post -->
                            <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="<?php echo $datadelay ?>s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?php echo $result['Images'] ?>" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="single-blog.php?postID=<?php echo $result['postID'] ?>" class="headline">
                                        <h5 class="rutgon3dong"><?php echo $result['Title'] ?></h5>
                                    </a>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p><?php echo $result['adminName'] ?> on <a href="#" class="post-date"><?php echo $result['CreatedDate'] ?></a></p>
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