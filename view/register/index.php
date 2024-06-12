<?php
$this->view("layout/header");
?>
<style>
    body{
        background-image: url('../uploads/Screenshot (628).png');
        background-size: cover;
    }
</style>

</style>

    <main class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="registerForm" method="post" class="invisible-bg p-4 rounded" onsubmit="return validateForm()">
                    <h2 class="mb-3">Đăng ký</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control  invisible-bg " name="username" id="username" placeholder="Nhập tên tài khoản" >
                        <div id="usernameError" class="form-text text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label ">Mật khẩu</label>
                        <input type="password" class="form-control invisible-bg " name="password" id="password" placeholder="Nhập mật khẩu" >
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control  invisible-bg " name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu" >

                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control invisible-bg " name="fullname" id="fullname" placeholder="Nhập họ và tên" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control invisible-bg " name="email" id="email" placeholder="Nhập email" >
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control invisible-bg " name="birthday" id="birthday" >
                    </div>
                    <?php 
                        if($this->arr){?>
                            <div id="errorMessage" class=" mb-3" style="display: block;">Tên đăng nhập đã tồn tại.</div>
                        <?php
                        }
                        ?>
                    <div id="errorMessage_01" class=" mb-3" style="display: none;">Vui lòng nhập đầy đủ thông tin.</div>
                    <div id="errorMessage_02" class=" mb-3" style="display: none;">Mật khẩu không trùng khớp.</div>
                    <button type="submit" class="bg-btn">Đăng ký</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('registerForm').onsubmit = function(event) {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var confirm_password= document.getElementById('confirm_password').value;

            if(username=='' || password =='') {
                event.preventDefault();
                document.getElementById('errorMessage_01').style.display = 'block';
            }
            if(password != confirm_password ) {
                event.preventDefault();
                document.getElementById('errorMessage_02').style.display = 'block';
            }
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view("layout/footer");
?>
