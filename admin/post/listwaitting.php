<?php
ob_start();
// Đoạn mã HTML và PHP của bạn ở đây
include_once '../classes/post.php';
?>
<!-- Đoạn mã HTML -->
<!-- Hiển thị danh sách thể loại -->
<!-- <hr class="my-5" /> -->

<!-- Bootstrap Dark Table -->

<br>
<div class="grid_10">
    <div class="card box round first grid">
        <h5 class="card-header">Danh sách bài viết chờ duyệt </h5>
            <div class="table-responsive text-nowrap">
                <?php include_once './component/JsTable.php';
                include_once './component/deletescript.php'; ?>
            </div>
    </div>
</div>
<!--/ Bootstrap Dark Table -->
<!-- / Content -->


<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
include_once '../layout/template.php';
?>