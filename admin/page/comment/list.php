<?php
ob_start();
// Đoạn mã HTML và PHP của bạn ở đây
?>
	<!-- Đoạn mã HTML -->


<?php
include_once __DIR__. '/../../context/comment.php';
?>

	<!-- Hiển thị danh sách comment -->
	<!-- <hr class="my-5" /> -->

	<!-- Bootstrap Dark Table -->
	<div class="grid_10">
		<div class="card box round first grid">
			<h5 class="card-header">Danh sách bình luận</h5>
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
ob_start();
?>
<?php
$scripts = ob_get_clean();
include_once __DIR__ . '/../../layout/template.php';
?>