<?php
include_once __DIR__ . '/checkAllowUrl.php';
checkAllowUrl();
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
	  data-template="vertical-menu-template-free">
<?php
include __DIR__ . '/header.php';
include __DIR__ . '/head.php';
?>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
        <?php include __DIR__ . '/sidebar.php' ?>
		<!-- Layout container -->
		<div class="layout-page">
            <?php
            include __DIR__ . '/nav.php';
            ?>

			<!-- Content wrapper -->
			<div class="content-wrapper">
				<!-- Content -->
				<div class="container-xxl flex-grow-1 container-p-y">
                    <?php
                    global $content;
                    echo $content;
                    ?>
				</div>
				<!-- / Content -->
				<div class="content-backdrop fade"></div>
			</div>
			<!-- Content wrapper -->

            <?php
            include __DIR__ . '/footer.php';
            ?>
		</div>
		<!-- / Layout page -->
	</div>
	<!-- Overlay -->
	<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<?php
include __DIR__ . '/scripts.php';
?>

</body>
</html>
