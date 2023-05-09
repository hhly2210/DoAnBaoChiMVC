<?php
ob_start();
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php
        include __DIR__ . '/layout/content_tam.php';
        ?>
    </div>

    <!-- / Content -->


<?php
$content = ob_get_clean();
include __DIR__ . '/layout/template.php';
?>