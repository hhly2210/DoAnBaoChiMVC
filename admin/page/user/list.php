<?php
ob_start();

include_once './component/addform.php';
?>

<!-- Hiển thị danh sách thể loại -->
<!-- <hr class="my-5" /> -->

<!-- Bootstrap Dark Table -->
<div class="grid_10">
	<div class="card box round first grid">
		<h5 class="card-header">Danh sách người dùng</h5>
		<div class="table-responsive text-nowrap">
			<?php
			include_once './component/JsTable.php';
			include_once './component/deletescript.php';
			?>
		</div>
	</div>
</div>
<!--/ Bootstrap Dark Table -->
<?php include_once './component/editform.php' ?>
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