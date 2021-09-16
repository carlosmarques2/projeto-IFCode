<?= $this->layout("_theme", $this->data); ?>
<div class="adminx-main-content">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= url('') ?>">Principal</a></li>
                <li class="breadcrumb-item"><a href="<?= url("lista") ?>">Proprietários</a></li>
                <li class="breadcrumb-item active  aria-current=" page">Informações do Proprietário</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>Proprietário</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Informações</div>
                    </div>
                    <div class="card-body" id="card1">
                        <div class="row">
                            <div class="col-lg-auto">
                                <img src="<?= url("../public/assets/img/retrato-generico.png") ?>" alt="" width="205" height="228">
                            </div>
                            <form class="col-lg-auto">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <div class="form-group">
                                            <label class="form-label">Nome</label>
                                            <p><?= $proprietario->nome . " " . $proprietario->sobrenome ?> </p>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Matrícula</label>
                                            <p><?= $proprietario->matricula ?> </p>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Setor</label>
                                            <p>TESTE</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <div class="form-group">
                                            <label class="form-label">Telefone</label>
                                            <p><?= $proprietario->telefone ?> </p>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Ocupação</label>
                                            <p><?= $proprietario->funcao ?> </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row justify-content-end mt-3 pr-3">
                            <a id="button" class="btn btn-sm ml-1 mb-1 btn-secondary" href="#" data-action="<?= $router->route('cadastro.geraqr'); ?>" data-id="<?= $proprietario->id; ?>" data-nome_img_qr="<?= 'qrcode-' . $proprietario->id; ?>">
                                Gerar QR Code
                            </a>

                            <a href="cadastrar_veiculo.php?id=<?= $proprietario->id ?>">
                                <button class="btn btn-sm ml-1 mb-1 btn-success">Adic. Veículo</button>
                            </a>
                            <a href="<?= $proprietario->id ?>">
                                <button class="btn btn-sm ml-1 mb-1 btn-primary">Editar</button>
                            </a>
                            <a href="deletar_proc.php?id=<?= $proprietario->id ?>">
                                <button class="btn btn-sm ml-1 mb-1 btn-danger">Excluir</button>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card mb-grid">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="card-header-title">Veículo(s)</div>
                            </div>
                            <div class="card mb-grid">
                                <div class="table-responsive-md">
                                    <table class="table table-actions table-striped table-hover mb-0" data-table>
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <label class="custom-control custom-checkbox m-0 p-0">
                                                        <input type="checkbox" class="custom-control-input table-select-all">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                </th>
                                                <th scope="col">Placa</th>
                                                <th scope="col">Modelo</th>
                                                <th scope="col">Cor</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ((array)$veiculos as $veiculo) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <label class="custom-control custom-checkbox m-0 p-0">
                                                            <input type="checkbox" class="custom-control-input table-select-row">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </th>
                                                    <td><?= $veiculo->placa ?></td>
                                                    <td><?= $veiculo->modelo ?></td>
                                                    <td><?= $veiculo->cor ?></td>
                                                    <td>
                                                        <a href="editar_veiculo.php?id[]=<?= $veiculo->id . "&id[]=" . $proprietario->id ?>">
                                                            <button class="btn btn-sm btn-primary">Editar</button>
                                                        </a>
                                                        <a href="proc_deletar_veic.php?id[]=<?= $veiculo->id . "&id[]=" . $proprietario->id ?>">
                                                            <button class="btn btn-sm btn-danger">Excluir</button>
                                                        </a>
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
        </div>
    </div>
</div>
<?php $this->start('scripts'); ?>
<script>
    const notification_falha = new window.notifications({
        notificationSound: <?= json_encode(url("assets/media/notification.mp3")) ?>,
        notification: {
            autoHide: true,
            duration: 5000,
            style: 'danger',
            position: 'bottom',
        }
    });

    const notification_sucesso = new window.notifications({
        notificationSound: <?= json_encode(url("assets/media/notification.mp3")) ?>,
        notification: {
            autoHide: true,
            duration: 5000,
            style: 'success',
            position: 'bottom',
        }
    });

    (function() {
        'use strict';

        window.addEventListener('load', function() {
            var form = document.getElementById('needs-validation');
            if (form !== null) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }
        }, false);
    })();

    $("body").on("click", "[data-action]", function(e) {
        e.preventDefault();
        var data = $(this).data();
        var mensagem = new Array();

        $.post(data.action, data, function() {
            // $('#button').addClass('disabled');
        }, "json").fail(function(callback) {
            notification_falha.fire("Ocorreu um erro ao gerar o QR Code");
        }).done(function(callback) {
            if(callback.mensagem)
                notification_falha.fire(callback.mensagem);
            else 
                notification_sucesso.fire('QR Code gerado com sucesso!');
        });
    });

    <?= $router->route('lista.geraqr', ["id" => $proprietario->id, "nome_img_qr" => 'qrcode-' . $proprietario->id]); ?>
</script>
<?php $this->end(); ?>