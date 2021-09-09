<?= $this->layout("_theme", $this->data); ?>
<div class="adminx-main-content">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('') ?>">Principal</a></li>
                <li class="breadcrumb-item"><a href="<?= url('lista') ?>">Proprietários</a></li>
                <li class="breadcrumb-item"><a href="<?= url("lista/$proprietario->id") ?>">Informações do Proprietário</a></li>
                <li class="breadcrumb-item active  aria-current=" page">Editar</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>Editando Dados do Proprietário</h1>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-grid">

                    <div class="card mb-grid">
                        <div class="card-header">
                            <div class="card-header-title">Editar</div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= $proprietario->id ?>" id="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="validationCustom01" placeholder="Nome" value="<?= $proprietario->nome ?>" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom02">Sobrenome</label>
                                        <input type="text" name="sobrenome" class="form-control" id="validationCustom02" placeholder="Sobrenome" value="<?= $proprietario->sobrenome ?>" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom03">Matrícula</label>
                                        <input type="text" name="matricula" class="form-control" id="validationCustom03" placeholder="Matrícula" value="<?= $proprietario->matricula ?>" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom04">Telefone</label>
                                        <input class="form-control input-phone mb-2" name="telefone" type="text" id="validationCustom04" placeholder="Telefone" value="<?= $proprietario->telefone ?>" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="validationCustom04">Ocupação</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <?php if ($proprietario->funcao == 'Aluno') : ?>
                                                    <input class="form-check-input" type="radio" name="ocupacao" id="gridRadios1" value="Aluno" checked>
                                                <?php else : ?>
                                                    <input class="form-check-input" type="radio" name="ocupacao" id="gridRadios1" value="Aluno">
                                                <?php endif; ?>
                                                Aluno
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <?php if ($proprietario->funcao == 'Servidor') : ?>
                                                    <input class="form-check-input" type="radio" name="ocupacao" id="gridRadios2" value="Servidor" checked>
                                                <?php else : ?>
                                                    <input class="form-check-input" type="radio" name="ocupacao" id="gridRadios2" value="Servidor">
                                                <?php endif; ?>
                                                Servidor
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary mr-2" type="submit">Confirmar</button>
                                <small class="text-muted">
                                </small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('scripts'); ?>
<script>
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

    var cleave = new Cleave('.input-phone', {
        delimiter: ' - ',
        blocks: [5, 4],
        uppercase: true
    });

    var cleave2 = new Cleave('.input-placa', {
        delimiter: '-',
        blocks: [3, 4],
        uppercase: true
    });
</script>
<?php $this->end(); ?>