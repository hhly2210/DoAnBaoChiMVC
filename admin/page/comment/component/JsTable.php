<table id="comment-list" class="table table-dark">
	<thead>
	<tr>
		<th>STT</th>
		<th>Bài viết</th>
		<th>Tên</th>
		<th>Bình luận</th>
		<th>Sửa/Xoá</th>
	</tr>
	</thead>
	<tbody class="table-border-bottom-0">
	</tbody>
</table>

<script>
	function napLaiTable () {
		let table = document.getElementById('comment-list')
		table.tBodies[0].innerHTML = ''
		showTable()
	}

	function showTable () {
		let table = document.getElementById('comment-list')
		fetch('/admin/api/comment/getAll.php')
			.then(r => r.json())
			.then(data => {
				data.forEach((item, index) => {
					let noiDung = `
    <tr>
        <td>${index + 1}</td>
        <td class='text-truncate' style='max-width:250px;'>
            <i class='fab fa-angular fa-lg text-danger me-3'></i>${item.Title}
        </td>
        <td><span>${item.userName}</span></td>
		<td><span>${item.comment}</span></td>
        <td>
            <div class='dropdown'>
                <button type='button' class='btn p-0 dropdown-toggle hide-arrow'
                        data-bs-toggle='dropdown'>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </button>
                <div class='dropdown-menu'>
                    <button class='dropdown-item' data-bs-toggle='modal'
                            data-bs-target='#exampleModal' onclick='xoa(${item.commentID})'>
                            <i class='bx bx-trash me-1'></i> Xoá
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