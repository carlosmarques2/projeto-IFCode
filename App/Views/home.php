<?= $this->layout("_theme", $this->data);?>
<!-- <div class="adminx-content"> -->

	<div class="adminx-main-content">
		<div class="container-fluid">
			<!-- BreadCrumb -->
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb adminx-page-breadcrumb">
					<li class="breadcrumb-item" aria-current="page">Principal</li>
				</ol>
			</nav>

			<div class="pb-3">
				<h1>Principal</h1>

			</div>

			<div class="row">
				<div class="col-md-6 col-lg-3 d-flex">
					<div class="card mb-grid w-100">
						<div class="card-body d-flex flex-column">
							<div class="d-flex justify-content-between mb-3">
								<h5 class="card-title mb-0">
									Novo Cadastro
								</h5>
								
							</div>
							<a href="<?= url("cadastro") ?>" class="btn btn-primary"><i data-feather="plus"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3 d-flex">
					<div class="card mb-grid w-100">
						<div class="card-body d-flex flex-column">
							<div class="d-flex justify-content-between mb-3">
								<h5 class="card-title mb-0">
									Lista de QR Codes
								</h5>
							</div>
							<a href="<?= url("lista/qrcodes") ?>" class="btn btn-primary"><i data-feather="list"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4 d-flex">
					<div class="card border-0 bg-success text-white text-center mb-grid w-100">
						<a href="<?= url("lista") ?>" class="link_users d-flex flex-row align-items-center h-100" title="Listar Proprietários">
							<div class="card-icon d-flex align-items-center h-100 justify-content-center">
								<i data-feather="users"></i>
							</div>
							<div class="card-body">
								<div class="card-info-title">Proprietários</div>
								<h3 class="card-title mb-0">
									<?= count($proprietarios) ?>
								</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- </div> -->

	

</body>

</html>