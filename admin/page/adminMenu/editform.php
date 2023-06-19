<?php
ob_start();
$idscript = "n" . strval(random_int(0, 99));
// Đoạn mã HTML và PHP của bạn ở đây
// include_once __DIR__ . '/../../context/adminmenudata.php';
?>
<!-- <hr class="my-5" /> -->
<div class="card box round first grid">

	<div class="card-header">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Chỉnh sửa bài viết</h4>
	</div>
	<!--Chỉnh sửa bài viết -->

	<div class="card-body" id="ModalEdit">
		<form id="edit-form" action="api/edit.php" method="POST" enctype="multipart/form-data">
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="edit-adminMenuName">Tên menu<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="adminMenuName" id="edit-adminMenuName" placeholder="Nhập vào đây👉👈" required />
				</div>
			</div>
			<div class="row mb-3">
				<label for="edit-ParentLevel" class="col-sm-2 col-form-label">Thuộc menu<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select class="select2 form-select" name="ParentLevel" id="edit-ParentLevel">
						<option value="">Menu riêng biệt(mới)</option>
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="edit-MenuOrder">Thứ tự menu<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="MenuOrder" id="edit-MenuOrder" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="edit-Icon">Icon</label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="Icon" id="edit-Icon" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="edit-Link">Đường dẫn</label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="Link" id="edit-Link" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="edit-ClassName">Tên Class<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="ClassName" id="edit-ClassName" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-2"></div>
				<div class="col-sm-10">
					<label class="form-check-label" for="IsActive"> Trạng thái </label>
					<input class="form-check-input" type="checkbox" name="IsActive" id="IsActive" checked />
				</div>
			</div>
			<div class="row justify-content-end mb-3">
				<div class="col-sm-10">
					<button type="button" class="btn btn-primary" onclick="submit_sua()">Cập nhập</button>
				</div>
			</div>
		</form>
	</div>


	<div id='$idscript' class='alert alert-dismissible d-none fade'>
		<button type='button' class='btn-close' data-bs-dismiss='alert'></button>
		<span class="noi-dung"></span>
	</div>

	<script>
		function sua(id) {
			let form = document.getElementById('edit-form')
			fetch('/admin/api/adminmenu/get.php?adminMenuID=' + id)
				.then(res => {
					if (res.status === 200) {
						res.json().then(obj => {
							form.elements.adminMenuName.value = obj.adminMenuName
							form.elements.ParentLevel.value = obj.ParentLevel
							form.elements.MenuOrder.value = obj.MenuOrder
							form.elements.Icon.value = obj.Icon
							form.elements.Link.value = obj.Link
							form.elements.ClassName.value = obj.ClassName
							form.elements.IsActive.value = obj.IsActive
						})
					}
				})
		}

		function submit_sua() {
			let form = document.getElementById('edit-form')
			let formData = new FormData(form)
			if (formData.has('IsActive'))
				formData.set('IsActive', '1')
			else
				formData.append('IsActive', '0')

			let thongBao = document.getElementById('$idscript')
			thongBao.noiDung = thongBao.querySelector('.noi-dung')

			fetch('/admin/api/adminmenu/edit.php', {
				method: 'POST',
				body: formData
			}).then(res => {
				if (res.status === 200) {
					thongBao.classList.add('alert-success')
					thongBao.noiDung.textContent = 'Chỉnh sửa thành công👍'
				} else {
					thongBao.classList.add('alert-danger')
					thongBao.noiDung.textContent = 'Chỉnh sửa thất bại🙅'
				}
				thongBao.classList.toggle('d-none')
				thongBao.classList.toggle('fade')
				tuTat(thongBao)
			})
		}


		function tuTat(dom) {
			setTimeout(() => {
				dom.classList.add('fade')
				dom.classList.add('d-none')
			}, 3456)
		}

		function cap_nhat_danh_sach_menu_admin() {
			let selectCat = document.getElementById('edit-ParentLevel')
			fetch('/admin/api/adminmenu/getAll.php')
				.then(res => {
					if (res.status === 200) {
						res.json().then(obj => {
							obj.forEach(item => {
								let option = document.createElement('option')
								option.value = item.adminMenuID
								option.text = item.adminMenuName
								selectCat.add(option)
							})
						})
					}
				})
		}

		cap_nhat_danh_sach_menu_admin()
		sua(<?php echo $_GET['adminMenuID'] ?>)
	</script>
</div>
<!-- / Content -->


<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../../layout/template.php';
?>