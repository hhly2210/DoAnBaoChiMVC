<?php
ob_start();
// Đoạn mã HTML và PHP của bạn ở đây
include_once __DIR__ . '/../../context/user.php';
session_start();
$id = $_SESSION["adminID"];
$user = new user();
if (count($_POST) > 0) {
    $result = $user->show_user_one($id);
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["adminPass"] && $_POST["currentPassword"] != $_POST["newPassword"] && $_POST["newPassword"] == $_POST["confirmPassword"]) {
        $insertUser = $user->update_pass($id, $_POST["newPassword"]);
        $message = "Thay đổi mật khẩu thành công👍";
    } else {
        $message = "Mật khẩu không chính xác";
    }
}
?>
	<!-- Đoạn mã HTML -->

	<!-- <hr class="my-5" /> -->

	<div class="card">
		<div class="row card-body">
			<div class="card box round first grid col shadow-none">
				<div class="card-header">
					<h4>Đổi mật khẩu</h4>
				</div>
				<div class="card-body">
					<div><?php if (isset($message)) {
                            echo $message;
                        } ?></div>
					<form method="post" action="" data-align="center">
						<div class="mb-3">
							<label for="currentPassword" class="form-label">Nhập mật khẩu cũ: </label>
							<input class="form-control" type="password" id="currentPassword" name="currentPassword"/>
						</div>
						<div class="mb-3">
							<label for="newPassword" class="form-label">Nhập mật khẩu mới: </label>
							<input class="form-control" type="password" id="newPassword" name="newPassword"/>
						</div>
						<div class="mb-3">
							<label for="confirmPassword" class="form-label">Xác nhận mật khẩu mới: </label>
							<input class="form-control" type="password" id="confirmPassword" name="confirmPassword"/>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Lưu</button>
							<!--<button type="reset" class="btn btn-outline-secondary">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
			<div class="card col shadow-none">
				<div class="card-header">
					<h4>Yêu cầu về mật khẩu</h4>
				</div>
				<div class="card-body">
					Sử dụng tối thiểu 8 ký tự, và tối đa 15 ký tự.<br>
					+ Bao gồm số, chữ thường, chữ in hoa và ký tự đặc biệt.<br>
					+ Duy nhất, không dùng chung cho các tài khoản khác.<br>
					+ Không được mang ý nghĩa đi kèm(số điện thoại, ngày sinh, tên địa danh...).<br>
					+ Không sử dụng tên riêng.<br>
					+ Không sử dụng các con số nổi tiếng, vd: 113, 115, 12345678...<br>
					Một số mật khẩu gợi ý cho tiêu chuẩn trên: Oaz1bc2@, Ab2467@@...<br>
				</div>
			</div>
		</div>
	</div>
	<!--/ Bootstrap Dark Table -->
	<!-- / Content -->


	<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
include_once '../../layout/template.php';
?>