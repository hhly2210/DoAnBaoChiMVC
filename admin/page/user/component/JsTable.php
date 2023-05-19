<table id="user-list" class="table table-dark">
	<thead>
	<tr>
		<th>STT</th>
		<th>Tên người dùng</th>
		<th>Email</th>
		<th>Chức vụ</th>
		<th>Trạng thái</th>
		<th>Avatar</th>
		<th>Sửa/Xoá</th>
	</tr>
	</thead>
	<tbody class="table-border-bottom-0">
	</tbody>
</table>

<script>
	function napLaiTable () {
		let table = document.getElementById('user-list')
		table.tBodies[0].innerHTML = ''
		showTable()
	}

	function showTable () {
		let table = document.getElementById('user-list')
		fetch('/admin/user/getAll.php')
			.then(r => r.json())
			.then(data => {
				data.forEach((item, index) => {
					let noiDung = `
    <tr>
        <td>${index + 1}</td>
        <td>
            <i class='fab fa-angular fa-lg text-danger me-3'></i><strong>${item.adminName}</strong>
        </td>
        <td><span>${item.Email}</span></td>
        <td><span>${item.roleName}</span></td>
        <td><span>${item.Active ? 'Đang hoạt động' : 'Không hoạt động'}</span></td>
        <td><span>${item.Avatar}</span></td>
        <td>
            <div class='dropdown'>
                <button type='button' class='btn p-0 dropdown-toggle hide-arrow'
                        data-bs-toggle='dropdown'>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </button>
                <div class='dropdown-menu'>
                    <button class='dropdown-item' data-bs-toggle='modal'
                            data-bs-target='#ModalEdit' onclick='sua(${item.adminID})'>
                            <i class='bx bx-edit-alt me-1'></i> Edit
                    </button>
                    <button class='dropdown-item' data-bs-toggle='modal'
                            data-bs-target='#exampleModal' onclick='xoa(${item.adminID})'>
                            <i class='bx bx-trash me-1'></i> Delete
                    </button>
                </div>
            </div>
        </td>
    </tr>
`
					table.tBodies[0].innerHTML += noiDung
				})
			})
	}

	showTable()
</script>