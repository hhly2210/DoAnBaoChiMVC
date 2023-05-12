<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditLabel">Chỉnh sửa người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form" action="edit.php" method="POST">
                    <input type="hidden" name="adminID" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tên người dùng:</label>
                        <input type="text" class="form-control" id="recipient-name" name="adminName"
                               value="">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <div class="input-group input-group-merge">
                            <input type="email" id="basic-default-email" class="form-control" name="Email"
                                   aria-describedby="Email2" placeholder=""><span class="input-group-text"
                                                        id="Email2">@gmail.com</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tên tài khoản:</label>
                        <input type="text" class="form-control" id="recipient-name" name="adminUser">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Mật khẩu:</label>
                        <input type="password" class="form-control" id="recipient-name" name="adminPass">
                    </div>
                    <div class="form-check">
                        <label class="col-md-2 col-form-check-label" for="Active"> Trạng thái </label>
                        <input class="form-check-input" type="checkbox" name="Active" id="Active" checked />
                    </div>
                    <div class="mb-3">
                        <label for="Avatar" class="form-label">Ảnh đại diện</label>
                        <input class="form-control" type="file" name="Avatar" id="Avatar" />
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
    function sua(id) {
        let form = document.getElementById('edit-form')
        form.elements.catID.value = id;
        fetch('/admin/user/get.php?adminID=' + id)
            .then(res => {
                if (res.status === 200) {
                    res.json().then(obj => {
                        form.elements.adminName.value = obj.adminName;
                        form.elements.Email.value = obj.Email;
                        $('#ModalEdit').modal('show')
                    })
                }
            })
    }

    function submit_sua() {
        let form = document.getElementById('edit-form')
        fetch('/admin/user/edit.php', {
            method: 'POST',
            body: new FormData(form)
        }).then(res => {
            if (res.status === 200) {
                $('#ModalEdit').modal('hide')
                napLaiTable()
            }
        })
    }


</script>