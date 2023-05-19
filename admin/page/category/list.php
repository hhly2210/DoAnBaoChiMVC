<?php
ob_start();
// Đoạn mã HTML và PHP của bạn ở đây
?>
	<!-- Đoạn mã HTML -->


<?php
include_once '../../context/category.php';

// View thêm thể loại
include_once 'addform.php';
?>

	<!-- Hiển thị danh sách thể loại -->
	<!-- <hr class="my-5" /> -->

	<!-- Bootstrap Dark Table -->
	<div class="grid_10">
		<div class="card box round first grid">
			<h5 class="card-header">Danh sách thể loại</h5>
			<div class="table-responsive text-nowrap">
                <?php include_once './component/JsTable.php';
                include_once './component/deletescript.php'; ?>
			</div>
		</div>
	</div>
	<!--/ Bootstrap Dark Table -->
<?php include_once 'editform.php' ?>
	<!-- / Content -->


	<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
ob_start();
?>
	<script src="/admin/js/chucnanganhienbutton.js"></script>
<?php
$scripts = ob_get_clean();
include_once __DIR__ . '/../../layout/template.php';
?>