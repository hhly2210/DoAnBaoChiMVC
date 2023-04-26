<?php
ob_start();
// Đoạn mã HTML và PHP của bạn ở đây
?>
<!-- Đoạn mã HTML -->


<?php
include '../classes/category.php';

// View thêm thể loại
include 'addform.php';
?>

<!-- Hiển thị danh sách thể loại -->
<!-- <hr class="my-5" /> -->

<!-- Bootstrap Dark Table -->
<div class="grid_10">
    <div class="card box round first grid">
        <h5 class="card-header">Danh sách thể loại</h5>
        <div class="table-responsive text-nowrap">
            <?php include './JsTable.php';
                include './deletescript.php'; ?>
        </div>
    </div>
</div>
<!--/ Bootstrap Dark Table -->
<?php include 'editform.php'?>
<!-- / Content -->


<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
include_once '../views/template.php';
?>