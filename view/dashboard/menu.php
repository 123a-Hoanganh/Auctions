<?php
$this->view('layout/header');
?>
<style>
    body{
        background-image: url('../uploads/Screenshot (622).png');
        background-size: cover;
    }
</style>

    <section class="jumbotron text-center">
        <h1>Chào mừng đến với HavSite <br> 
        <?php 
            if(Session::get('customer') != NULL){
                echo 'Hello, User ' .Session::get('customer')['fullname'];
            }
        ?>
        </h1>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
$this->view('layout/footer');
?>