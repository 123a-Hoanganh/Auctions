<?php
$this->view('layout/header');
?>
 <style>
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-top: 50px;
    }
  </style>
 <style>
    body{
        background-image: url('../uploads/Screenshot (628).png');
        background-size: cover;
    }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
          <form id="addForm" method="post" class="invisible-bg p-4 rounded" enctype="multipart/form-data">
                    <h2 class="mb-3">Sửa Sản Phẩm</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control  invisible-bg " name="name" id="name" placeholder="Nhập tên sản phẩm" value="<?=$this->getRes()['name']?>" require>
                        <div id="usernameError" class="form-text text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label ">Giá</label>
                        <input type="number" class="form-control invisible-bg " name="price" id="price" placeholder="Nhập giá" value="<?=$this->getRes()['price']?>" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hình Ảnh Hiện Tại</label>
                        <img src="../uploads/<?= $this->getRes()['image'] ?>" alt="Hình ảnh sản phẩm" style="max-width:50%; height:auto  ;">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Cập nhật ảnh khác</label>
                        <input type="file" class="form-control  invisible-bg " name="image" id="image" placeholder="Ảnh" require >

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả </label>
                        <input type="text" class="form-control invisible-bg " name="description" id="description" value="<?= $this->getRes()['description'] ?>" placeholder="Nhập mô tả" >
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Thời Hạn Đấu Giá </label>
                        <input type="datetime-local" class="form-control invisible-bg " name="time" id="time" placeholder="Nhập thời hạn" value="<?= $this->getRes()['time'] ?>" >
                    </div>
                    <div class="mb-3">
                        <label for="cate_id" class="form-label">Thêm Vào Danh Mục</label>
                        <input type="number" class="form-control invisible-bg " name="cate_id" id="cate_id" placeholder="Nhập Danh Mục" value="<?= $this->getRes()['cate_id'] ?>" >
                        
                    </div>
                    <button type="submit" class="bg-btn">Cập nhật</button>
                </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view('layout/footer');
?>