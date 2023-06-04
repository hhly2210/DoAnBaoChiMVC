<div class="row">
    <div class="col-12">
        <div class="load-more-btn mt-50 text-center">
            <?php
            include_once __DIR__ . "/../../admin/context/category.php";
            include_once __DIR__ . "/../../admin/context/post.php";
            $postAll = $post->get_all_post_by_search_paging($limit, $s);
            $postCount = mysqli_num_rows($postAll);
            $postButton = ceil($postCount / $limit);
            echo "<p>Trang: ";
            for ($trang = 1; $trang <= $postButton; $trang++) {
                echo '<a class="btn world-btn" style="margin: 0 5px" href="catagory.php?trang=' . $trang . '">' . $trang . '  </a>';
            }
            echo "</p>";
            ?>
        </div>
    </div>
</div>