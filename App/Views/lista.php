<?= $this->layout("_theme", $this->data); ?>

<div class="adminx-main-content">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= url("") ?>">Principal</a></li>
                <li class="breadcrumb-item active  aria-current=" page">Proprietários</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>Proprietários</h1>
        </div>

        <!-- <div class="row">
						<div class="col">
							<div class="alert alert-warning" role="alert">
								<strong>DataTables are a jQuery-only plugin</strong><br />
								If you know a similar vanilla JS library that you want to see supported, feel free to open an issue on GitHub.
							</div>
						</div>
					</div> -->
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="table-responsive-md">
                        <table id="tabela" class="table table-actions table-striped table-hover mb-0" data-table-proprietarios>
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <label class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input table-select-all">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Sobrenome</th>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">Ocupação</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($proprietarios as $proprietario) : ?>
                                    <tr>
                                        <th scope="row">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-row">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <td> <?= $proprietario->nome; ?> </td>
                                        <td> <?= $proprietario->sobrenome ?> </td>
                                        <td> <?= $proprietario->matricula ?> </td>
                                        <?php if ($proprietario->funcao == "Aluno") : ?>
                                            <td>
                                                <span class="badge badge-pill badge-success"><?= $proprietario->funcao ?></span>
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <span class="badge badge-pill badge-danger"><?= $proprietario->funcao ?></span>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="prop_info.php?id=<?= $proprietario->id ?>"><button class="btn btn-sm btn-primary">Info</button></a>
                                            <a href="qr-code.php?id=<?= $proprietario->id ?>"><button class="btn btn-sm btn-dark">QR Code</button></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('scripts');?>
<script>
    $(document).ready(function() {
        var table = $('[data-table-proprietarios]').DataTable({
            retrieve: true,
            "columns": [
                null,
                null,
                null,
                null,
                null,
                {
                    "orderable": false
                }
            ],
            language: {
                url: "../public/assets/plugins/Portuguese-Brasil-1.10.16.json"
            }
        });

        /* $('.form-control-search').keyup(function(){
          table.search($(this).val()).draw() ;
        }); */
    });
</script>
<?php $this->end();?>