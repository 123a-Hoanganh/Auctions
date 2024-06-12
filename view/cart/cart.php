<?php
$this->view('layout/header');
?>

    <div class="container">
        <header class="text-center my-4">
            <h1>Giỏ Hàng</h1>
        </header>
        <table class="table custom-table">
                <thead>
                    <tr style="background-color:rgb(250,237,237)">
                        <th scope="col">Thứ tự</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Chọn</th>
                    </tr>
                </thead>
                <tbody>
                <?php  $i=1;
                foreach($this->getResult() as $result){ ?>
                        <tr style="background-color:rgb(255,243,237)">
                            <th class="text-center"><?= $i ?></th>
                            <td class="image-column"><img src="../uploads/<?= $result['image'] ?>" alt="Hình ảnh sản phẩm" style="max-width:30%;"></td>
                            <td class="text-center"><?= $result['name'] ?></td>
                            <td class="text-center"><?= $this->addcomma($result['price']) ?>₫</td>
                            <td class="text-center"><a href="cart?cart=<?=$result['products_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                <?php  $i++;
                };
                ?>
                </tbody>
        </table>
    </div>
    <div class="order-section text-center my-4">
        <button type="submit" class="btn btn-primary">Đặt Hàng</button>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view('layout/footer');
?>