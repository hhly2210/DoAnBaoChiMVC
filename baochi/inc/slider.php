<?php
include_once __DIR__ . "/../../admin/context/category.php";
include_once __DIR__ . "/../../admin/context/post.php";
?>
<!-- ********** Hero Area Start ********** -->
<div class="hero-area">

    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">
        <?php
        $postbyrandom = $post->get_post_by_random();
        if ($postbyrandom) {
            while ($result = $postbyrandom->fetch_assoc()) {
        ?>
                <!-- Single Slide -->
                <div class="single-hero-slide bg-img background-overlay" style="background-image: url(<?php echo $result['Images'] ?>);"></div>

        <?php
            }
        }
        ?>
    </div>

    <!-- Hero Post Slide -->
    <div class="hero-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-post-slide">
                        <?php
                        // Đời sống 23
                        $idtheloai = 23;
                        $limit = 5;
                        $postbycat = $post->get_post_by_category($idtheloai, $limit);
                        if ($postbycat) {
                            $datadelay = 0;
                            while ($result = $postbycat->fetch_assoc()) {
                                $datadelay += 1;
                        ?>
                                <!-- Single Slide -->
                                <div class="single-slide d-flex align-items-center">
                                    <div class="post-number">
                                        <p><?php echo $datadelay ?></p>
                                    </div>
                                    <div class="post-title">
                                        <a class="rutgon2dong" href="single-blog.php?postID=<?php echo $result['postID'] ?>"><?php echo $result['Title'] ?></a>
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
<!-- ********** Hero Area End ********** -->