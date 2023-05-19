<?php
ob_start();
$idscript = "n" . strval(random_int(0, 99));
// Đoạn mã HTML và PHP của bạn ở đây
include_once '../context/post.php';
?>
	<!-- <hr class="my-5" /> -->
	<div class="card box round first grid">

		<div class="card-header">
			<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Chỉnh sửa bài viết</h4>
		</div>
		<!--Chỉnh sửa bài viết -->

		<div class="card-body">
			<form id="edit-form" action="edit.php" method="POST" enctype="multipart/form-data">
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="edit-Title">Tiêu đề bài viết</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Title" id="edit-Title"
							   placeholder="Nhập vào đây👉👈" required/>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="edit-Abstract">Tóm tắt bài viết</label>
					<div class="col-sm-10">
						<div class="input-group input-group-merge">
							<input type="text" name="Abstract" id="edit-Abstract" class="form-control"/>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label for="edit-catID" class="col-sm-2 col-form-label">Thể loại:</label>
					<div class="col-sm-10">
						<select class="select2 form-select" name="catID" id="edit-catID"></select>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-2"></div>
					<div class="col-sm-10">
						<label class="form-check-label" for="IsActive"> Trạng thái </label>
						<input class="form-check-input" type="checkbox" name="IsActive" id="IsActive" checked/>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="Images">Ảnh tiêu đề bài viết</label>
					<div class="col-sm-10">
						<div class="input-group input-group-merge">
							<button class="btn btn-outline-primary" type="button" id="button-addon1"
									onclick="elfinderDialog2('#Images')">Thêm ảnh
							</button>
							<input class="form-control" type="text" name="Images" id="Images"/>
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
						<button type="button" class="btn btn-primary" onclick="submit_sua()">Cập nhập</button>
					</div>
				</div>
			</form>
		</div>


		<div id='$idscript' class='alert alert-dismissible d-none fade'>
			<button type='button' class='btn-close' data-bs-dismiss='alert'></button>
			<span class="noi-dung"></span>
		</div>

		<script>
			function submit () {
				let form = document.getElementById('edit-form')
				let thongBao = document.getElementById('$idscript')
				thongBao.noiDung = thongBao.querySelector('.noi-dung')
				fetch('/admin/post/api/edit.php', {
					method: 'POST',
					body: new FormData(form)
				})
					.then(r => {
						if (r.status === 200) {
							thongBao.classList.add('alert-success')
							thongBao.noiDung.textContent = 'Chỉnh sửa bài viết thành công👍'
						} else {
							thongBao.classList.add('alert-danger')
							thongBao.noiDung.textContent = 'Chỉnh sửa bài viết thất bại🙅'
						}

						thongBao.classList.toggle('d-none')
						thongBao.classList.toggle('fade')
						tuTat(thongBao)
					})
			}

			document.querySelector('#edit-form button[type=submit]').addEventListener('click', e => {
				e.preventDefault()
				if (document.getElementById('edit-Title').value.length !== 0 && document.getElementById('edit-Abstract').value.length !== 0 &&
					document.getElementById('summernote').value.length !== 0 && document.getElementById('edit-catID').value.length !== 0)
					submit()
				else {
					let thongBao = document.getElementById('$idscript')
					thongBao.noiDung = thongBao.querySelector('.noi-dung')
					thongBao.classList.add('alert-warning')
					thongBao.noiDung.textContent = 'Các ô quan trọng không được để trống⛔'
					thongBao.classList.toggle('d-none')
					thongBao.classList.toggle('fade')
					tuTat(thongBao)
				}
			})

			function tuTat (dom) {
				setTimeout(() => {
					dom.classList.add('fade')
					dom.classList.add('d-none')
				}, 3456)
			}

			function cap_nhat_danh_sach_theloai () {
				let selectCat = document.getElementById('edit-form').elements.catID
				fetch('/admin/category/getAll.php')
					.then(res => {
						if (res.status === 200) {
							res.json().then(obj => {
								obj.forEach(item => {
									let option = document.createElement('option')
									option.value = item.catID
									option.text = item.catName
									selectCat.add(option)
								})
							})
						}
					})
			}

			cap_nhat_danh_sach_theloai()
		</script>
	</div>
	<!-- / Content -->


	<!-- Kết thúc đoạn mã HTML -->
<?php
$content = ob_get_clean();
ob_start();
?>
	<script src="/admin/Summernote/elfinderext.js"></script>

	<script>
		$('#summernote').summernote({
			minHeight: 300,
			toolbar: [
				['insert', ['link', 'picture', 'elfinder', 'hr']],
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']],
				['table', ['table']],
				['view', ['codeview']]
			]
		})

		function elfinderDialog (context) {
			var fm = $('<div/>')
				.dialogelfinder({
					url: '/admin/Summernote/elFinder/php/connector.minimal.php',
					lang: 'en',
					width: 840,
					height: 450,
					destroyOnClose: true,
					getFileCallback: function (file, fm) {
						context.invoke('editor.insertImage', fm.convAbsUrl(file.url))
					},
					commandsOptions: {
						getfile: {
							oncomplete: 'close',
							folders: false
						}
					}
				})
				.dialogelfinder('instance')
		}

		function elfinderDialog2 (id) {
			let context = document.querySelector(id)
			var fm = $('<div/>')
				.dialogelfinder({
					url: '/admin/Summernote/elFinder/php/connector.minimal.php',
					lang: 'en',
					width: 840,
					height: 450,
					destroyOnClose: true,
					getFileCallback: function (file, fm) {
						context.value = file.url
					},
					commandsOptions: {
						getfile: {
							oncomplete: 'close',
							folders: false
						}
					}
				})
				.dialogelfinder('instance')
		}
	</script>

<?php
$scripts = ob_get_clean();
include_once '../layout/template.php';
?>