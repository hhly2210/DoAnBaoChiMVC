<?php
function tao_bang($api_url)
{
	include_once './component/deletescript.php';
?>
	<table id="post-list" class="table table-dark">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tiêu đề</th>
				<th>Thể loại</th>
				<th>Tác giả</th>
				<th>Ngày viết bài</th>
				<th>Trạng thái</th>
				<th>Sửa/Xoá</th>
			</tr>
		</thead>
		<tbody class="table-border-bottom-0">
		</tbody>
	</table>

	<script>
		function napLaiTable() {
			let table = document.getElementById('post-list')
			table.tBodies[0].innerHTML = ''
			showTable()
		}

		function showTable() {
			let table = document.getElementById('post-list')
			fetch('<?php echo $api_url ?>')
				.then(r => r.json())
				.then(data => {
					data.forEach((item, index) => {
						let htmlSua = `
						<a href="editform.php?postID=${item.postID}" class="dropdown-item" onclick="sua(${item.postID})">
                            <i class="bx bx-edit-alt me-1"></i> Sửa
                    	</a>
						`
						if(item.IsActive == 1) htmlSua = ''
						let noiDung = `
    <tr>
        <td>${index + 1}</td>
        <td class='text-truncate' style='max-width:250px;'>${item.Title}</td>
        <td><span>${item.catName}</span></td>
        <td><span>${item.adminName}</span></td>
        <td><span>${item.CreatedDate}</span></td>
        <td><span>${item.IsActive === null ? 'Chờ' : (item.IsActive?'Đã':'Không')} duyệt</span></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    ${htmlSua}
                    <a class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" onclick="xoa(${item.postID})">
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
