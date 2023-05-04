<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditLabel">Chỉnh sửa thể loại</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form" action="edit.php" method="POST">
                    <input type="hidden" name="catID" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tên thể loại thay thế:</label>
                        <input type="text" class="form-control" id="recipient-name" name="catName"
                               placeholder="Nhập vào đây...">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Mô tả thay thế:</label>
                        <textarea class="form-control" name="catDescription" id="message-text"></textarea>
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
    function sua(id){
        let form = document.getElementById('edit-form')
        form.elements.catID.value = id;
        fetch('/admin/user/get.php?catID=' + id)
            .then(res=>{
                if(res.status === 200) {
                    res.json().then(obj=>{
                        form.elements.catName.value = obj.catName;
                        form.elements.catDescription.value = obj.catDescription;
                        $('#ModalEdit').modal('show')
                    })
                }
            })
    }

    function submit_sua() {
        let form = document.getElementById('edit-form')
        fetch('/admin/user/edit.php', {
            method:'POST',
            body: new FormData(form)
        }).then(res=>{
            if(res.status === 200) {
                $('#ModalEdit').modal('hide')
                napLaiTable()
            }
        })
    }


</script>