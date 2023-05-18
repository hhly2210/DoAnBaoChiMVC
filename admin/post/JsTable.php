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
        table.tBodies[0].innerHTML= "";
        showTable();
    }
    
    function showTable() {
        let table = document.getElementById('post-list')
        fetch('/admin/post/getAll.php')
            .then(r => r.json())
            .then(data => {
                data.forEach((item, index) => {
                    let noiDung = `
    <tr>
        <td>${index + 1}</td>
        <td>
            <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>${item.Title}</strong>
        </td>
        <td><span>${item.catName}</span></td>
        <td><span>${item.adminName}</span></td>
        <td><span>${item.CreatedDate}</span></td>
        <td><span>${item.IsActive}</span></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a href="editform.php" class="dropdown-item" onclick="sua(${item.postID})">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                    </a>
                    <a class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" onclick="xoa(${item.postID})">
                            <i class="bx bx-trash me-1"></i> Delete
                    </a>
                </div>
            </div>
        </td>
    </tr>
`
                    table.tBodies[0].innerHTML+= noiDung
                })
            })
    }
    showTable()
</script>