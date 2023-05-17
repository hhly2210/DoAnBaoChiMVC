<?php
ob_start();
$idscript = "n" . strval(random_int(0, 99));
// Đoạn mã HTML và PHP của bạn ở đây
include_once '../classes/post.php';
?>
<!-- <hr class="my-5" /> -->
<div class="card box round first grid">

    <div class="card-header">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Thêm bài viết</h4>
    </div>
    <!-- Thêm người dùng -->
    <div class="card-body">
        <form id="add-form" class="bg-light" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="add-Title">Tiêu đề bài viết</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Title" id="add-Title" placeholder="Nhập vào đây👉👈" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="add-Abstract">Tóm tắt bài viết</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <input type="text" name="Abstract" id="add-Abstract" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="add-catName" class="col-sm-2 col-form-label">Thể loại:</label>
                <div class="col-sm-10">
                    <select class="select2 form-select" name="catName" id="add-catName">
                        <!-- <option value="" disabled selected hidden>Chọn chức vụ</option> -->
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"></div>
                <div class="col-sm-10">
                    <label class="form-check-label" for="IsActive"> Trạng thái </label>
                    <input class="form-check-input" type="checkbox" name="IsActive" id="IsActive" checked />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Images">Ảnh tiêu đề bài viết</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="file" name="Images" id="Images" onclick="" />
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Contents">Nội dung</label>
                <div class="col-sm-10">
                    <textarea id="summernote" name="Contents"></textarea>
                    <!-- JavaScript -->

                    <!-- <textarea id="Contents" class="form-control" name="Contents" aria-describedby="basic-icon-default-message2"></textarea> -->
                </div>
            </div>
            <div class="row justify-content-end mb-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
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
            fetch('/admin/post/add.php', {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(r => {
                    if (r.status === 200) {
                        thongBao.classList.add('alert-success')
                        thongBao.noiDung.textContent = 'Thêm bài viết thành công👍'
                    } else {
                        thongBao.classList.add('alert-danger')
                        thongBao.noiDung.textContent = 'Thêm bài viết thất bại🙅'
                    }

                    thongBao.classList.toggle('d-none')
                    thongBao.classList.toggle('fade')
                    tuTat(thongBao)
                })
        }

        document.querySelector('#add-form button[type=submit]').addEventListener('click', e => {
            e.preventDefault()
            if (document.getElementById('adminName').value.length !== 0 && document.getElementById('adminUser').value.length !== 0 &&
                document.getElementById('adminPass').value.length !== 0 && document.getElementById('Active').value.length !== 0)
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
</div>
<!--/ Bootstrap Dark Table -->
<?php include_once 'editform.php' ?>
<!-- / Content -->


<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
ob_start();
?>

<script>
    $('#summernote').summernote({
        minHeight: 300,
        toolbar: [
            ['insert', ['elfinder', 'picture', 'link', 'video']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['view', ['codeview']],
        ],
        popover: {
            image: [
                ['custom', ['elfinder']],
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
            ],
        },
        callbacks: {
            onInit: function() {
                $('button.note-btn.btn.btn-light.btn-sm.note-elfinder-btn').find('i').addClass('note-icon-picture');
            },
        },
        elfinder: {
            url: '/admin/Summernote/elFinder/php/connector.minimal.php',
            height: 500,
        },
    });
</script>

<?php
$scripts = ob_get_clean();
include_once '../layout/template.php';
?>
<?php
$idscript = "n" . strval(random_int(0, 99));
?>