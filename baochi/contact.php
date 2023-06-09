<?php
include_once __DIR__ . '/inc/header.php';
include_once __DIR__ . '/inc/slider.php';
include_once __DIR__ . "/modules/contact/addcontact.php";
if (isset($_GET['action'])) {
    if ($_GET['action'] == 1)
        echo "<p>Thành công</p>";
    else
        echo "<p>Thất bại</p>";
}


?>
<section class="contact-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Contact Form Area -->
            <div class="col-12 col-md-10 col-lg-8">
                <div class="contact-form">
                    <h5>Liên hệ</h5>
                    <!-- Contact Form -->
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="group">
                                    <input type="text" name="fullName" id="name" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Họ tên</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="group">
                                    <input type="email" name="email" id="email" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group">
                                    <textarea name="message" id="message" required></textarea>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Lời phản hồi</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn world-btn">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps: If you want to google map, just uncomment below codes -->

<?php
include_once __DIR__ . '/inc/footer.php';
?>