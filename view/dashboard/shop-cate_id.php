<?php
$this->view('layout/header');
?>
<style>
    body{
        background-image: url('../uploads/Screenshot (622).png');
        background-size: cover;
    }
</style>

</head>

        <main class="container mt-4">
        <div class="row">
            <?php foreach($this->getResult() as $res) { ?>
            <div class="col-md-3 mb-2">
                <div class="card">
                    <img src="../uploads/<?= $res['image'] ?>" class="card-img-top" alt="<?= $res['name'] ?>">
                    <div class="card-body rounded">
                        <h5 class="card-title"><?= $res['name'] ?></h5>
                        <h4 class="card-text"><small class="text-muted"><?= $this->addcomma($res['price']) ?>₫</small></h4>
                        <a href="products?products=<?= $res['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view('layout/footer');
?>