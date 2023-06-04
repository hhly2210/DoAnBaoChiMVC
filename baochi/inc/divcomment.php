<?php
include_once __DIR__ . "/../../admin/context/comment.php";
function xuLyBinhLuan($postID)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $comment = new comment();
        $userName = $_POST['userName'];
        $commentForPost = $_POST['comment'];
        $insertComment = $comment->insert_comment($postID, $userName, $commentForPost);
        http_response_code(303);
        // status_header(303);
        header("Location:{$_SERVER['REQUEST_URI']}");
        die();
    }
}

/**
 * inBinhLuan
 * tạo mục hiện bình luận
 * @param  int $postID
 * @return void
 */

function inBinhLuan($postID)
{
    $comment = new comment();
    $result = $comment->show_comment_for_post($postID);
    ?>
    <div class="col-12 col-lg-8">
        <!-- Comment Area Start -->
        <div class="comment_area clearfix mt-70">
            <ol>
                <?php
                    foreach ($result as $value) {
                        taoBinhLuan($value['userName'], $value['createdDate'], $value['comment']);
                    }
                ?>
            </ol>
        </div>
    </div>
<?php
}


/**
 * taoBinhLuan
 * tạo <li> bình luận
 * @param  string $name
 * cái rất big
 * @param  string $time
 * @param  string $content
 * @return void
 */
function taoBinhLuan($name, $time, $content)
{
?>
    <li class="single_comment_area">
        <div class="comment-content">
            <div class="comment-meta d-flex align-items-center justify-content-between">
                <p><a class="post-author"><?php echo $name; ?></a> on <a class="post-date"> <?php echo $time ?> </a></p>
                <!-- <a href="#" class="comment-reply btn world-btn">Trả lời</a> -->
            </div>
            <?php echo $content; ?>
        </div>
    </li>
<?php
}
?>

<!-- <ol class="children">
    <li class="single_comment_area">
        <div class="comment-content">
            <div class="comment-meta d-flex align-items-center justify-content-between">
                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                <a href="#" class="comment-reply btn world-btn">Trả lời</a>
            </div>
            <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
        </div>
    </li>
</ol> -->