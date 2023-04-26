<?php
include './inc/header.php';
include '../classes/category.php';
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
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
            <div class="card form-wrapper d-none">
              <div class="card-body">
                <form class="bg-light" id="myForm" action="add.php" method="POST">
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Tên thể loại <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="catName" id="basic-default-name" placeholder="Nhập vào đây👉👈" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả về thể loại trên</label>
                    <div class="col-sm-10">
                      <textarea id="basic-default-message" class="form-control" name="catDescription" placeholder="Là một thể loại mà🤔" aria-label="Là một thể loại mà🤔" aria-describedby="basic-icon-default-message2"></textarea>
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
    <?php
    if (isset($insertCat)) {
      echo $insertCat;
    }
    ?>

    <!-- Hiển thị danh sách thể loại -->
    <!-- <hr class="my-5" /> -->

    <!-- Bootstrap Dark Table -->
    <div class="grid_10">
      <div class="card box round first grid">
        <h5 class="card-header">Danh sách thể loại</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-dark">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên thể loại</th>
                <th>Mô tả</th>
                <th>Sửa/Xoá</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              $showCate = $cat->show_category();
              if ($showCate) {
                $i = 0;
                while ($result = $showCate->fetch_assoc()) {
                  $i++;
              ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong><?php echo $result['catName'] ?></strong></td>
                    <td><span><?php echo $result['catDescription'] ?></span></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalEdit" href="?catID=<?php echo $result['catID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                          <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="?catID=<?php echo $result['catID'] ?>"><i class="bx bx-trash me-1"></i> Delete</button>
                        </div>
                      </div>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/ Bootstrap Dark Table -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalEditLabel">Chỉnh sửa thể loại</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
              <form action="edit.php" method="POST">
                    <input type="hidden" name="catID" value="">
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Tên thể loại thay thế:</label>
                      <input type="text" class="form-control" id="recipient-name" name="catName" placeholder="Nhập vào đây...">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Mô tả thay thế:</label>
                      <textarea class="form-control" name="catDescription" id="message-text"></textarea>
                    </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
              <button type="submit" class="btn btn-primary">Cập nhập</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
    <?php
    include './inc/footer.php'
    ?>