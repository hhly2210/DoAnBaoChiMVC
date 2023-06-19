<?php
ob_start();
$idscript = "n" . strval(random_int(0, 99));
?>
<!-- <hr class="my-5" /> -->
<div class="card box round first grid">

	<div class="card-header">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Thêm admin menu</h4>
	</div>
	<!-- Thêm người dùng -->
	<div class="card-body">
		<form id="add-form" class="bg-light" enctype="multipart/form-data">
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="add-adminMenuName">Tên menu<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="adminMenuName" id="add-adminMenuName" placeholder="Nhập vào đây👉👈" required />
				</div>
			</div>
			<div class="row mb-3">
				<label for="add-adminMenuID" class="col-sm-2 col-form-label">Thuộc menu<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select class="select2 form-select" name="adminMenuID" id="add-adminMenuID">
						<option value="">Menu riêng biệt(mới)</option>
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="add-MenuOrder">Thứ tự menu<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="MenuOrder" id="add-MenuOrder" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="add-Icon">Icon</label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="Icon" id="add-Icon" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="add-Link">Đường dẫn</label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="Link" id="add-Link" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label" for="add-ClassName">Tên Class<span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group input-group-merge">
						<input type="text" name="ClassName" id="add-ClassName" class="form-control" />
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
					<button type="submit" class="btn btn-primary">Xác nhận</button>
				</div>
			</div>
		</form>
	</div>

	<div id='$idscript' class='alert alert-dismissible d-none fade'>
		<button type='button' class='btn-close' data-bs-dismiss='alert'></button>
		<span class="noi-dung"></span>
	</div>

	<script>
		function submit() {
			let form = document.getElementById('add-form')
			let thongBao = document.getElementById('$idscript')
			let data = new FormData(form)
			if (data.has('IsActive'))
				data.set('IsActive', '1')
			else
				data.append('IsActive', '0')

			thongBao.noiDung = thongBao.querySelector('.noi-dung')
			fetch('/admin/api/adminmenu/add.php', {
					method: 'POST',
					body: data
				})
				.then(r => {
					if (r.status === 200) {
						thongBao.classList.add('alert-success')
						thongBao.noiDung.textContent = 'Thêm menu thành công👍'
					} else {
						thongBao.classList.add('alert-danger')
						thongBao.noiDung.textContent = 'Thêm menu thất bại🙅'
					}

					thongBao.classList.toggle('d-none')
					thongBao.classList.toggle('fade')
					tuTat(thongBao)
				})
		}

		document.querySelector('#add-form button[type=submit]').addEventListener('click', e => {
			e.preventDefault()
			if (document.getElementById('add-adminMenuName').value.length !== 0 && document.getElementById('add-ParentLevel').value.length !== 0 &&
				document.getElementById('add-ClassName').value.length !== 0)
				submit()
			else {
				let thongBao = document.getElementById('$idscript')
				thongBao.noiDung = thongBao.querySelector('.noi-dung')
				thongBao.classList.add('alert-warning')
				thongBao.noiDung.textContent = 'Các ô quan trọng không được để trống⛔'
				thongBao.classList.toggle('d-none')
				thongBao.classList.toggle('fade')
				tuTat(thongBao)
			}
		})

		function tuTat(dom) {
			setTimeout(() => {
				dom.classList.add('fade')
				dom.classList.add('d-none')
			}, 3456)
		}

		function cap_nhat_danh_sach_menu_admin() {
			let selectCat = document.getElementById('add-form').elements.adminMenuID
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
	</script>
</div>
<!--/ Bootstrap Dark Table -->
<!-- / Content -->


<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../../layout/template.php';
?>