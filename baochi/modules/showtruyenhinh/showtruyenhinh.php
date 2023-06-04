<?php
include_once __DIR__ . "/../../../admin/context/category.php";
include_once __DIR__ . "/../../../admin/context/post.php";
?>
<div class="world-latest-articles">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="title">
                <h5>Show truyền hình</h5>
            </div>
            <?php
            // show tryền hình 27
            $idtheloai = 27;
            $limit = 4;
            $postbycat = $post->get_post_by_category($idtheloai, $limit);
            if ($postbycat) {
                $datadelay = 0.1;
                while ($result = $postbycat->fetch_assoc()) {
                    $datadelay += 0.1;
            ?>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="<?php echo $datadelay ?>s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img style="height:200px;" src="<?php echo $result['Images'] ?>" alt="">
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
        <div class="col-12 col-lg-4">
            <div class="title">
                <h5>Yêu thích</h5>
            </div>
            <?php
            // show tryền hình 27
            $limit = 2;
            $postbycat = $post->get_post_by_random($limit);
            if ($postbycat) {
                $datadelay = 0.1;
                while ($result = $postbycat->fetch_assoc()) {
                    $datadelay += 0.1;
            ?>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="<?php echo $datadelay ?>s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img style="height:200px;" src="<?php echo $result['Images'] ?>" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="catagory.php?catID=<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></a></div>
                            <!-- Video Button -->
                            <!-- <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a> -->

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
</div>