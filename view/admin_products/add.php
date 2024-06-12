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
                    <h2 class="mb-3">Thêm Sản Phẩm</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control  invisible-bg " name="name" id="name" placeholder="Nhập tên sản phẩm" require>
                        <div id="usernameError" class="form-text text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label ">Giá</label>
                        <input type="number" class="form-control invisible-bg " name="price" id="price" placeholder="Nhập giá" require>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Thêm Ảnh</label>
                        <input type="file" class="form-control  invisible-bg " name="image" id="image" placeholder="Ảnh" require >

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Thêm Mô Tả </label>
                        <input type="text" class="form-control invisible-bg " name="description" id="description" placeholder="Nhập mô tả" >
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Thời Hạn Đấu Giá </label>
                        <input type="datetime-local" class="form-control invisible-bg " name="time" id="time" placeholder="Nhập mô tả" >
                    </div>
                    <div class="mb-3">
                        <label for="cate_id" class="form-label">Thêm Vào Danh Mục</label>
                        <?php  
                        if(isset($this->input()['get'])){
                            $cate_id=$this->input()['get']['cate_id'];
                        }
                        ?>
                        <input type="number" class="form-control invisible-bg " name="cate_id" id="cate_id" placeholder="Nhập Danh Mục" value="<?= $cate_id?>" >
                        <?php
                        if($this->getres()==1){?>
                        <div id="successMessage" class=" mb-3" style="display: block;">Thêm sản phẩm thành công!</div>
                        <?php }else if($this->getres()==0 && !empty($this->input()['post']) ) {?>
                            <div id="errorMessage" class=" mb-3" style="display: block;">Thêm sản phẩm thất bại!</div>
                        <?php ; }
                        ?>
                        
                    </div>
                    <button type="submit" class="bg-btn">Thêm Sản Phẩm</button>
                </form>
    </div>
  </div>
</div>
<script>
        document.getElementById('addForm').onsubmit = function(event) {
            var name = document.getElementById('name').value;
            var price = document.getElementById('price').value;
            var image = document.getElementById('image').value;
            var time = document.getElementById('time').value;
            var description = document.getElementById('description').value;

            if(name=='' || price ==''|| image=='' || time==''||description=='') {
                event.preventDefault();
            }
        };
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view('layout/footer');
?>