<table id="category-list" class="table table-dark">
	<thead>
	<tr>
		<th>STT</th>
		<th>Tên thể loại</th>
		<th>Mô tả</th>
		<th>Sửa/Xoá</th>
	</tr>
	</thead>
	<tbody class="table-border-bottom-0">
	</tbody>
</table>

<script>
	function napLaiTable () {
		let table = document.getElementById('category-list')
		table.tBodies[0].innerHTML = ''
		showTable()
	}

	function showTable () {
		let table = document.getElementById('category-list')
		fetch('/admin/api/category/getAll.php')
			.then(r => r.json())
			.then(data => {
				data.forEach((item, index) => {
					let noiDung = `
    <tr>
        <td>${index + 1}</td>
        <td>
            <i class='fab fa-angular fa-lg text-danger me-3'></i><strong>${item.catName}</strong>
        </td>
        <td><span>${item.catDescription}</span></td>
        <td>
            <div class='dropdown'>
                <button type='button' class='btn p-0 dropdown-toggle hide-arrow'
                        data-bs-toggle='dropdown'>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </button>
                <div class='dropdown-menu'>
                    <button class='dropdown-item' data-bs-toggle='modal'
                            data-bs-target='#ModalEdit' onclick='sua(${item.catID})'>
                            <i class='bx bx-edit-alt me-1'></i> Edit
                    </button>
                    <button class='dropdown-item' data-bs-toggle='modal'
                            data-bs-target='#exampleModal' onclick='xoa(${item.catID})'>
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