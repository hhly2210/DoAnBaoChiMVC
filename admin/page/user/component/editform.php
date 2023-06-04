<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby id="ModalEditLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalEditLabel">Chỉnh sửa người dùng</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="edit-form" action="api/edit.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="adminID" value="">
					<img id="edit-preview-avatar" class="d-block mx-auto my-1 rounded-circle"
						style="width: 7.5em; height: 7.5em;">
					<div class="mb-3">
						<label for="edit-adminName" class="col-form-label">Tên người dùng:</label>
						<input type="text" class="form-control" id="edit-adminName" name="adminName">
					</div>
					<div class="mb-3">
						<label for="edit-Email" class="col-form-label">Email:</label>
						<div class="input-group input-group-merge">
							<input type="email" id="edit-Email" class="form-control" name="Email"
								   aria-describedby="Email2" placeholder=""><span class="input-group-text"
																				  id="edit-Email2">@gmail.com</span>
						</div>
					</div>
					<div class="mb-3">
						<label for="edit-adminUser" class="col-form-label">Tên tài khoản:</label>
						<input type="text" class="form-control" id="edit-adminUser" name="adminUser">
					</div>
					<div class="mb-3">
						<label for="edit-adminPass" class="col-form-label">Mật khẩu:</label>
						<input type="text" class="form-control" id="edit-adminPass" value='' placeholder="**********"
							   name="adminPass" style="-webkit-text-security: disc;">
					</div>
					<div class="mb-3">
						<label for="edit-roleID" class="col-form-label">Chức vụ:</label>
						<select class="select2 form-select" name="roleID" id="edit-roleID">
							<!-- <option value="" disabled selected hidden>Chọn chức vụ</option> -->
						</select>
					</div>
					<div class="form-check">
						<label class="col-md-2 col-form-check-label" for="edit-Active"> Trạng thái </label>
						<input class="form-check-input" type="checkbox" name="Active" id="edit-Active" checked/>
					</div>
					<div class="mb-3">
						<label for="edit-Avatar" class="form-label">Ảnh đại diện</label>
						<input accept="image/*" class="form-control" type="file" name="Avatar" id="edit-Avatar"/>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
				<button type="button" class="btn btn-primary" onclick="submit_sua()">Cập nhập</button>
			</div>
		</div>
	</div>
</div>

<script>
	function sua (id) {
		let form = document.getElementById('edit-form')
		form.elements.adminPass.value = ''
		form.elements.adminID.value = id
		fetch('/admin/api/user/get.php?adminID=' + id)
			.then(res => {
				if (res.status === 200) {
					res.json().then(obj => {
						document.getElementById('edit-preview-avatar').src = '/admin/resource/assets/img/avatars/' + obj.Avatar
						form.elements.adminName.value = obj.adminName
						form.elements.Email.value = obj.Email
						form.elements.adminUser.value = obj.adminUser
						form.elements.roleID.value = obj.roleID
						form.elements.Active.value = obj.Active
						$('#ModalEdit').modal('show')
					})
				}
			})
	}

	function submit_sua () {
		let form = document.getElementById('edit-form')
		let formData = new FormData(form)

		if (formData.has('Active'))
			formData.set('Active', '1')
		else
			formData.append('Active', '0')

		fetch('/admin/api/user/edit.php', {
			method: 'POST',
			body: formData
		}).then(res => {
			if (res.status === 200) {
				$('#ModalEdit').modal('hide')
				napLaiTable()
			}
		})
	}

	function cap_nhat_danh_sach_role () {
		let selectRole = document.getElementById('edit-form').elements.roleID
		fetch('/admin/api/role/getAll.php')
			.then(res => {
				if (res.status === 200) {
					res.json().then(obj => {
						obj.forEach(item => {
							let option = document.createElement('option')
							option.value = item.roleID
							option.text = item.roleName
							selectRole.add(option)
						})
					})
				}
			})

	}

	function gan_chuc_nang_preview_avatar () {
		let avatar = document.getElementById('edit-Avatar')
		let preview = document.getElementById('edit-preview-avatar')
		avatar.onchange = () => {
			if (avatar.files.length != 0) {
				preview.src = URL.createObjectURL(avatar.files[0])
			}
		}
	}

	gan_chuc_nang_preview_avatar()

	cap_nhat_danh_sach_role()
</script>