<?php
$idscript = "n" . strval(random_int(0, 99));
?>


<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Thể loại tin tức</h4>
<div class="row">
	<!-- Thêm thể loại -->
	<div class="col-xxl">
		<div class="card mb-4 border-0 bg-transparent shadow-none">
			<div class="card-header d-flex align-items-center justify-content-between p-0">
				<button id="myButton" class="btn btn-primary">
					<h5 class="mb-0" style="color:white">Thêm thể loại</h5>
				</button>
			</div>
			<div class="card-body p-0">
				<!-- <div class="card form-wrapper"> -->
				<div class="card form-wrapper d-none">
					<div class="card-body">
						<form id="add-form" class="bg-light">
							<div class="row mb-3">
								<label class="col-sm-2 col-form-label" for="catName">Tên thể loại
									<span
											class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="catName"
										   id="catName"
										   placeholder="Nhập vào đây👉👈"
										   required/>
								</div>
							</div>
							<div class="row mb-3">
								<label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả về thể loại
									trên</label>
								<div class="col-sm-10">
                                        <textarea id="basic-default-message" class="form-control" name="catDescription"
												  placeholder="Là một thể loại mà🤔" aria-label="Là một thể loại mà🤔"
												  aria-describedby="basic-icon-default-message2"></textarea>
								</div>
							</div>
							<div class="row justify-content-end">
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
	function submit () {
		let form = document.getElementById('add-form')
		let thongBao = document.getElementById('$idscript')
		thongBao.noiDung = thongBao.querySelector('.noi-dung')
		fetch('/admin/category/add.php', {method: 'POST', body: new FormData(form)})
			.then(r => {
				if (r.status === 200) {
					thongBao.classList.add('alert-success')
					thongBao.noiDung.textContent = 'Thêm thể loại thành công👍'
				} else {
					thongBao.classList.add('alert-danger')
					thongBao.noiDung.textContent = 'Thêm thể loại thất bại🙅'
				}

				thongBao.classList.toggle('d-none')
				thongBao.classList.toggle('fade')
				tuTat(thongBao)
				napLaiTable()
			})
	}

	document.querySelector('#add-form button[type=submit]').addEventListener('click', e => {
		e.preventDefault()
		if (document.getElementById('catName').value.length !== 0)
			submit()
		else {
			let thongBao = document.getElementById('$idscript')
			thongBao.noiDung = thongBao.querySelector('.noi-dung')
			thongBao.classList.add('alert-warning')
			thongBao.noiDung.textContent = 'Tên thể loại không được để trống⛔'
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
</script>

