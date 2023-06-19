<?php
function tao_bang($api_url)
{
	include_once __DIR__ . '/deletescript.php';
?>
	<table id="adminmenu-list" class="table table-dark">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên menu</th>
				<th>Thuộc menu</th>
				<th>Đường dẫn</th>
				<th>Trạng thái</th>
				<th>Sửa/Xoá</th>
			</tr>
		</thead>
		<tbody class="table-border-bottom-0">
		</tbody>
	</table>

	<script>
		function napLaiTable() {
			let table = document.getElementById('adminmenu-list')
			table.tBodies[0].innerHTML = ''
			showTable()
		}

		function showTable() {
			let table = document.getElementById('adminmenu-list')
			fetch('<?php echo $api_url ?>')
				.then(r => r.json())
				.then(data => {
					data.forEach((item, index) => {
						let noiDung = `
    <tr>
        <td>${index + 1}</td>
        <td class='text-truncate' style='max-width:250px;'>${item.adminMenuName}</td>
        <td><span>${data.find(c => c.adminMenuID === item.ParentLevel)?.adminMenuName ?? 'Menu riêng biệt'}</span></td>
        <td><span>${item.Link}</span></td>
        <td><span>${item.IsActive ? 'Đã duyệt' : 'Chưa duyệt'}</span></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
				<a href="editform.php?adminMenuID=${item.adminMenuID}" class="dropdown-item" onclick="sua(${item.adminMenuID})">
                            <i class="bx bx-edit-alt me-1"></i> Sửa
                    	</a>
                    <a class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" onclick="xoa(${item.adminMenuID})">
                            <i class="bx bx-trash me-1"></i> Xoá
                    </a>
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
<?php
}
