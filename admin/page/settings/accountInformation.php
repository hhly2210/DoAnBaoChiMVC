<?php
ob_start();
include_once __DIR__ . '/../../context/user.php';
include_once __DIR__ . '/../../../lib/session.php';
include_once __DIR__ .'/../user/component/editform.php';
// Đoạn mã HTML và PHP của bạn ở đây
?>
<!-- Đoạn mã HTML -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cài đặt/</span>Thông tin tài khoản</h4>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<h5 class="card-header">Chi tiết hồ sơ</h5>
			<!-- Account -->
			<div class="card-body">
				<div class="d-flex align-items-start align-items-sm-center gap-4">
					<!-- src="/admin/resource/assets/img/avatars/1.png" -->
					<img alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" src="/admin/resource/assets/img/avatars/<?php echo Session::get('Avatar'); ?>" />
					<div class="button-wrapper">
						<label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
							<span class="d-none d-sm-block">Thay đổi ảnh đại diện</span>
							<i class="bx bx-upload d-block d-sm-none"></i>
							<input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
						</label>
						<p class="text-muted mb-0">JPG, GIF, PNG. Kích thước lớn nhất là 1MB</p>
					</div>
				</div>
			</div>
			<hr class="my-0" />
			<div class="card-body">
				<form id="formAccountSettings" method="post" onsubmit="return false">
					<div class="row">
						<div class="mb-3 col-md-6">
							<label for="firstName" class="form-label">Họ tên</label>
							<input class="form-control" type="text" id="firstName" value="<?php echo Session::get('adminName'); ?>" readonly />
						</div>
						<div class="mb-3 col-md-6">
							<label for="email" class="form-label">E-mail</label>
							<input class="form-control" type="text" id="email" value="<?php echo Session::get('adminName'); ?>" readonly />
						</div>
						<div class="mb-3 col-md-6">
							<label for="organization" class="form-label">Tên tài khoản</label>
							<input type="text" class="form-control" id="organization" value="<?php echo Session::get('adminUser'); ?>" readonly />
						</div>
						<div class="mb-3 col-md-6">
							<label for="state" class="form-label">Quyền hạn</label>
							<input class="form-control" type="text" id="state" value="<?php echo Session::get('roleName'); ?>" readonly />
						</div>
					</div>
					<div class="mt-2">
						<button type="submit" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#ModalEdit" onclick="sua(<?php echo 'cc';?>)">Thay đổi thông tin</button>
					</div>
				</form>
			</div>
			<!-- /Account -->
		</div>
		</div>
</div>
<!-- / Content -->

<!--/ Bootstrap Dark Table -->

<!-- / Content -->


<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
include_once '../../layout/template.php';
?>