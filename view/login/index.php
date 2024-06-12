<?php
$this->view("layout/header");
?>
<style>
    body{
        background-image: url('../uploads/Screenshot (628).png');
        background-size: cover;
    }
</style>

    <main class="container mt-4">
        <!-- Existing content -->
        <div class="row justify-content-center">
            <div class="col-md-6">
            <form class="invisible-bg p-4 rounded" method="post" id="loginForm">
                <h2 class="mb-3">Đăng nhập</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control invisible-bg" name="username" id="username" placeholder="Nhập tài khoản của bạn" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control invisible-bg" name="password" id="password" placeholder="Nhập mật khẩu của bạn" >
                </div>
                <?php
                if(Session::get('customer')== NULL || Session::get('admin')==NULL){
                    if($this->isPost()){?>
                    <div id="errorMessage" class=" mb-3" style="display: block;">Tên đăng nhập hoặc mật khẩu không chính xác</div>
                <?php
                }
                }
                ?>
                <div id="errorMessage" class=" mb-3" style="display: none;">Vui lòng nhập đầy đủ thông tin.</div>
                <button type="submit" class="rounded bg-btn">Đăng nhập</button>
            </form>

            </div>
        </div>
    </main>
    <script>
        document.getElementById('loginForm').onsubmit = function(event) {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if(username=='' || password =='') {
                event.preventDefault();
                document.getElementById('errorMessage').style.display = 'block';
            }
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view("layout/footer");
?>