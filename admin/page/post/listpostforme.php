<?php
ob_start();
// Đoạn mã HTML và PHP của bạn ở đây
include_once '../context/post.php';
?>
	<!-- Đoạn mã HTML -->
	<!-- Hiển thị danh sách thể loại -->
	<!-- <hr class="my-5" /> -->

	<!-- Bootstrap Dark Table -->
	<div class="card-header d-flex align-items-center justify-content-between p-0">
		<a class="btn btn-primary" href="addform.php">
			<h5 class="mb-0" style="color:white">Thêm bài viết mới</h5>
		</a>
	</div>
	<br>
	<div class="grid_10">
		<div class="card box round first grid">
			<h5 class="card-header">Danh sách bài viết của bạn</h5>
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