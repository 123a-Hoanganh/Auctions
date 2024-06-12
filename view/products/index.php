<?php
$this->view("layout/header");
?>
    <main class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="../uploads/<?= $this->getResult()['image'] ?>" alt="Tên sản phẩm" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2 class="color-txt"><?= $this->getResult()['name'] ?></h2>
            <p class="color-txt"><?= $this->getResult()['description']?></p>
            <p class="color-txt"><?= $this->addcomma($this->getResult()['price'] )?>₫</p>
            <div class="buttons">
                <a href="bid?products=<?= $this->getResult()['id']?>" class="btn btn-primary">Đấu giá</a>
                <a href="cart?products=<?= $this->getResult()['id'] ?>" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>
    <div class="ml-3 text-muted"><h3>Thời gian còn lại:</h3></div>
    <div class="text-center p-4 border rounded" id="countdown"></div>
    <div class="additional-categories mt-4">
        <h3>Bạn có thể xem thêm các mẫu dưới đây:</h3>
        <ul class="category-list">
            <!-- Populate categories dynamically if available -->
            <li><a href="category?cat_id=1">Danh mục 1</a></li>
            <li><a href="category?cat_id=2">Danh mục 2</a></li>
            <li><a href="category?cat_id=3">Danh mục 3</a></li>
        </ul>
    </div>
</main>
<script>
                    // Thiết lập ngày và giờ mà bạn muốn đồng hồ đếm ngược đến
        const countDownDate = new Date("<?= $this->getResult()['time'] ?>").getTime();

        // Cập nhật đồng hồ đếm ngược mỗi giây
        const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            // Tính toán ngày, giờ, phút và giây
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Hiển thị kết quả trong thẻ div
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // Khi đồng hồ đếm ngược kết thúc, hiển thị một thông báo
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Đã hết hạn";
            }
        }, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view("layout/footer");
?>
