<?php
$this->view('layout/header');
?>
    <main class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Phần hiển thị ảnh sản phẩm -->
                <img src="../uploads/<?= $this->getres()['image'] ?>" alt="Sản phẩm" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2><?= $this->getres()['name'] ?></h2>
                <h6><?= $this->getres()['description'] ?></h6>
                <h5>Giá khởi điểm: <span id="basePrice"><?= $this->addcomma($this->getres()['price']) ?>₫</span></h5>

                
                    <form method="post"  style="border-radius:10px;" onsubmit="return validateBid();">
                            <div class="mb-3">
                                <label for="bid" class="form-label text-center"><h4>Giá đấu của bạn</h4></label>
                                <input type="number" name="bid" id="bid" class="form-control" placeholder="Nhập giá đấu của bạn">
                            </div>
                            <button class="btn mt-2 " id="bidButton">Đấu giá</button>
                    </form>
                <div id="notification" class="alert" style="display:none;"></div>
            </div>
        </div>
        <div class="ml-3 text-muted"><h3>Thời gian còn lại:</h3></div>
        <div class="text-center p-4 border rounded" id="countdown"></div>
        <h3 class="mt-4">Danh sách người đã đấu giá:</h3>
        <div class="container">
            <table class="table custom-table">
                <thead>
                    <tr style="background-color:rgb(250,237,237)">
                        <th scope="col">Thứ tự</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Đấu giá</th>
                        <th scope="col">Thời gian đấu giá</th>
                    </tr>
                </thead>
                <tbody>

                        <?php  $i=1;
                        foreach($this->getanswer() as $result){ 
                            if($i==1){?>
                            <tr style="background:rgb(134,198,129)">
                            <td>    <i class="fas fa-crown" style="color: gold;"></i> <?= $i ?></td>
                            <td><?= $result['fullname'] ?></td>
                            <td><?= $this->addcomma($result['bid']) ?>₫</td>
                            <td><?= $result['time'] ?></td>
                            </tr>
                        <?php $this->save=$result['username']; }else{?>
                            <tr style="background:rgb(255,162,158)">
                            <td><?= $i ?></td>
                            <td><?= $result['fullname'] ?></td>
                            <td><?= $this->addcomma($result['bid']) ?>₫</td>
                            <td><?= $result['time'] ?></td>
                            </tr>

                        <?php } $i++;
                        }
                        ?>

                </tbody>
            </table>
        </div>
    </main>

    <script>
        function validateBid() {
            const userBid = document.getElementById('bid').value;
            const minBid = parseInt(document.getElementById('basePrice').innerText.replace(/[^0-9]/g, ''), 10);
            
            if (userBid < minBid) {
                showNotification('danger', 'Giá đấu phải lớn hơn giá khởi điểm!');
                return false; // Prevent the form from submitting
            } else {
                showNotification('success', 'Đấu giá thành công!');
                return true; // Proceed with form submission
            }
        }

        function showNotification(type, message) {
            const notification = document.getElementById('notification');
            notification.className = `alert alert-${type}`; // Switches classes based on the type of message
            notification.textContent = message;
            notification.style.display = 'block'; // Make the notification visible
        }

        // Existing countdown code here...

        // Update countdown script to disable bidding when expired
        const x = setInterval(function() {
            const countDownDate = new Date("<?= $this->getres()['time']?>").getTime();
            const now = new Date().getTime();
            const distance = countDownDate - now;

            // Calculate days, hours, minutes and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the div
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // When countdown ends, show expired message and disable bidding
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Đã hết hạn";
                document.getElementById("bidButton").disabled = true; // Disable the bid button
                showNotification('danger', 'Thời gian đấu giá đã kết thúc. Không thể đấu giá nữa.');

            }

        }, 1000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view('layout/footer');
?>