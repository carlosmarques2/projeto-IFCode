<?php $_SESSION['nome'] = 'IFRR'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?= asset("css/adminx.css") ?>" media="screen" />
    <link rel="stylesheet" href="<?= asset("css/style2.css") ?>">
</head>

<body>
	<div class="adminx-container">
		<nav class="navbar navbar-expand justify-content-between fixed-top">
			<a class="navbar-brand mb-0 h1 d-none d-md-block" href="<?=url('')?>">
				<img src="<?=url('/assets/img/logo-qrcode.png')?>" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
				IFCode
			</a>

			<ul class="navbar-nav d-flex justify-content-end mr-2">
				<!-- Notificatoins -->
				<div class="d-flex align-items-center">
					<span class="h6 m-0"><?= $_SESSION['nome']; ?></span>
				</div>
				<!-- Notifications -->
				<li class="nav-item dropdown">
					
					<a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
						<img src="<?=url('/assets/img/logo-admin.png')?>" class="border border-dark d-inline-block align-top" alt="">
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-danger" href="#">Sair</a>
					</div>
				</li>
			</ul>
		</nav>

        <div class="main_content adminx-content">
			<?= $this->section('content'); ?>
        </div>
	</div>

    <script src="<?= asset("js/popper-1.12.3.min.js") ?>"></script>
	<script src="<?= asset("js/jquery-3.6.0.min.js") ?>"></script>
    <script src="<?= asset("js/bootstrap-4.0.0-beta.2.min.js") ?>"></script>
    <script src="<?= asset("js/vendor.js") ?>"></script>
    <script src="<?= asset("js/adminx.js") ?>"></script>

</body>

</html>