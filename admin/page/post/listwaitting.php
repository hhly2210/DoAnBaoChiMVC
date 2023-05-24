<?php
ob_start();
?>
	<br>
	<div class="grid_10">
		<div class="card box round first grid">
			<h5 class="card-header">Danh sách bài viết chờ duyệt </h5>
			<div class="table-responsive text-nowrap">
			<?php
			include_once __DIR__ . '/component/JsTablewatting.php';
			tao_bang('/admin/api/post/getWaitingAll.php');
			?>
			</div>
		</div>
	</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../../layout/template.php';
?>