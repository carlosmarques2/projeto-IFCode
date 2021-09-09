<?= $this->layout("_theme", $this->data); ?>
<div class="adminx-main-content">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="<?=url('')?>">Principal</a></li>
                <li class="breadcrumb-item active  aria-current=" page">Painel</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>Painel</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-grid">
                    <div class="card-header">
                        <div class="card-header-title">Registro de Acessos</div>
                    </div>

                    <table class="table table-hover mb-0" data-table>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <label class="custom-control custom-checkbox m-0 p-0">
                                        <input type="checkbox" class="custom-control-input table-select-all">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </th>
                                <th scope="col">Nome</th>
                                <th scope="col">Acesso</th>
                                <th scope="col">Endereço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($acessos as $acesso) : ?>
                                <tr>
                                    <th scope="row">
                                        <label class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input table-select-row">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </th>
                                    <td> <?= $acesso->usuario ?> </td>
                                    <td> <?= $acesso->acesso ?> </td>
                                    <td> <?= $acesso->endereco ?> </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Usuários Cadastrados</div>
                    </div>
                    <table class="table table-actions table-hover mb-0" data-table2>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <label class="custom-control custom-checkbox m-0 p-0">
                                        <input type="checkbox" class="custom-control-input table-select-all">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </th>
                                <th scope="col">Nome</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Data de Cadastro</th>
                                <th scope="col">Ativo</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <th scope="row">
                                        <label class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input table-select-row">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </th>
                                    <td> <?= $usuario->nome ?> </td>
                                    <td> <?= $usuario->usuario ?> </td>
                                    <td> <?= $usuario->cadastro ?> </td>
                                    <?php if ($usuario->ativo) : ?>
                                        <td> <span class="badge badge-pill badge-success"> Sim </span> </td>
                                        <td>
                                            <button class="btn btn-sm btn-dark">Desativar</button>
                                            <button class="btn btn-sm btn-danger">Excluir</button>
                                        </td>
                                    <?php else : ?>
                                        <td><span class="badge badge-pill badge-danger"> Não </span></td>
                                        <td>
                                            <button class="btn btn-sm btn-success">Ativar</button>
                                            <button class="btn btn-sm btn-danger">Excluir</button>
                                        </td>
                                    <?php endif ?>
                                    <!-- <td>
													<button class="btn btn-sm btn-success">Ativar</button>
													<button class="btn btn-sm btn-danger">Excluir</button>
												</td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('scripts');?>
<script>
    $(document).ready(function() {
        var table = $('[data-table]').DataTable({
            "columns": [
                null,
                null,
                null,
                {
                    "orderable": false
                }
            ],
            language: {
                url: '<?= url("../public/assets/plugins/Portuguese-Brasil-1.10.16.json") ?>'
            }
        });

        var table2 = $('[data-table2]').DataTable({
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
                url: '<?= url("../public/assets/plugins/Portuguese-Brasil-1.10.16.json") ?>'
            }
        });

        /* $('.form-control-search').keyup(function(){
          table.search($(this).val()).draw() ;
        }); */
    });
</script>
<?php $this->end();?>