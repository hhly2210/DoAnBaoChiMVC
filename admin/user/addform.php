<?php
$idscript = "n" . strval(random_int(0, 99));
?>


<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Người dùng</h4>
<div class="row">
    <!-- Thêm người dùng -->
    <div class="col-xxl">
        <div class="card mb-4 border-0 bg-transparent shadow-none">
            <div class="card-header d-flex align-items-center justify-content-between p-0">
                <button id="myButton" class="btn btn-primary">
                    <h5 class="mb-0" style="color:white">Thêm người dùng</h5>
                </button>
            </div>
            <div class="card-body p-0">
                <div class="card form-wrapper d-none">
                    <div class="card-body">
                        <form id="add-form" class="bg-light">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="adminName">Tên người dùng
                                    <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="adminName"
                                           id="adminName"
                                           placeholder="Nhập vào đây👉👈"
                                           required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Email">Email</label>
                                <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input
                                        type="text"
                                        id="basic-default-email"
                                        class="form-control"
                                        placeholder="lyhai"
                                        aria-label="lyhai"
                                        aria-describedby="Email2"
                                    /><span class="input-group-text" id="Email2">@gmail.com</span>
                                </div></div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="adminUser">Tên tài khoản
                                    <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="adminUser"
                                           id="adminUser"
                                           placeholder="admin😐"
                                           required/>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label" for="adminPass">Mật khẩu<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" name="adminPass" id="adminPass" />
                                </div>
                            </div>
                            <div class="row gy-3">
                                <div class="col-md">
                                    <label class="col-md-2 col-form-label" for="roleID">Chức vụ<span
                                            class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline mt-3">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="roleID"
                                            id="roleID"
                                        />
                                        <label class="form-check-label" for="roleID">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="roleID"
                                            id="inlineRadio2"
                                        />
                                        <label class="form-check-label" for="inlineRadio2">2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <label class="col-md-2 col-form-check-label" for="Active"> Trạng thái </label>
                                <input class="form-check-input" type="checkbox" name="Active" id="Active" checked />
                            </div>
                            <div class="mb-3">
                                <label for="Avatar" class="form-label">Chọn ảnh đại diện</label>
                                <input class="form-control" type="file" name="Avatar" id="Avatar" />
                            </div>
                            <div class="row justify-content-end mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id='$idscript' class='alert alert-dismissible d-none fade'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    <span class="noi-dung"></span>
</div>

<script>
    function submit() {
        let form = document.getElementById('add-form')
        let thongBao = document.getElementById('$idscript');
        thongBao.noiDung = thongBao.querySelector('.noi-dung')
        fetch('/admin/user/add.php', {method: 'POST', body: new FormData(form)})
            .then(r => {
                if (r.status === 200) {
                    thongBao.classList.add('alert-success')
                    thongBao.noiDung.textContent = 'Thêm người dùng thành công👍'
                } else {
                    thongBao.classList.add('alert-danger')
                    thongBao.noiDung.textContent = 'Thêm người dùng thất bại🙅'
                }

                thongBao.classList.toggle('d-none')
                thongBao.classList.toggle('fade')
                tuTat(thongBao)
                napLaiTable();
            })
    }

    document.querySelector('#add-form button[type=submit]').addEventListener('click', e => {
        e.preventDefault()
        if (document.getElementById('adminName').value.length !== 0 && document.getElementById('adminUser').value.length !== 0
            && document.getElementById('adminPass').value.length !== 0 && document.getElementById('Active').value.length !== 0)
            submit()
        else {
            let thongBao = document.getElementById('$idscript');
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
        }, 3456);
    }
</script>

