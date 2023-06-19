<?php
ob_start();
?>
	<div class="card-header d-flex align-items-center justify-content-between p-0">
		<a class="btn btn-primary" href="addform.php">
			<h5 class="mb-0" style="color:white">Thêm menu mới</h5>
		</a>
	</div>
	<br>
	<div class="grid_10">
		<div class="card box round first grid">
			<h5 class="card-header">Danh sách admin menu</h5>
			<div class="table-responsive text-nowrap">
			<?php
			include_once __DIR__ . '/component/JsTable.php';
			tao_bang('/admin/api/adminmenu/getAll.php');
			?>
			</div>
		</div>
	</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../../layout/template.php';
?>