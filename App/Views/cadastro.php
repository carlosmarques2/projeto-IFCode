<?= $this->layout("_theme", $this->data); ?>

<div class="adminx-main-content">
    <div class="container-fluid">

        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= url("") ?>">Principal</a></li>
                <li class="breadcrumb-item active  aria-current=" page">Cadastro</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>Cadastro</h1>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-grid">

                    <div class="card mb-grid">
                        <div class="card-header">
                            <div class="card-header-title">Novo</div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= $router->route('cadastro.novo'); ?>" id="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label" for="validationCustom02">Sobrenome</label>
                                        <input type="text" name="sobrenome" class="form-control" id="validationCustom02" placeholder="Sobrenome" value="" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom03">Matrícula</label>
                                        <input type="text" name="matricula" class="form-control" id="validationCustom03" placeholder="Matrícula" required>
                                        <div class="matriculaExiste">
                                            Número de matrícula informado já existe
                                        </div>
                                        <div class="invalid-feedback ">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom04">Setor</label>
                                        <input type="text" name="setor" class="form-control" id="validationCustom04" placeholder="Setor" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom05">Telefone</label>
                                        <input class="form-control input-phone mb-2" name="telefone" type="text" id="validationCustom05" placeholder="Telefone" required>
                                        <div class="invalid-feedback">
                                            Campo Obrigatório
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="validationCustom06">Ocupação</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="ocupacao" id="gridRadios1" value="Aluno" checked>
                                                Aluno
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="ocupacao" id="gridRadios2" value="Servidor">
                                                Servidor
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <fieldset>
                                    <legend>Dados do Veículo</legend>
                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <label class="form-label" for="validationCustom06">Placa</label>
                                            <input type="text" name="placa" class="form-control input-placa" id="validationCustom06" placeholder="Placa" required>
                                            <div class="placaExiste">
                                                Número da placa informado já existe
                                            </div>
                                            <div class="invalid-feedback">
                                                Campo Obrigatório
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom07">Modelo</label>
                                            <input type="text" name="modelo" class="form-control" id="validationCustom07" placeholder="Modelo" required>
                                            <div class="invalid-feedback">
                                                Campo Obrigatório
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="validationCustom08">Cor</label>
                                            <input type="text" name="cor" class="form-control" id="validationCustom08" placeholder="Cor" required>
                                            <div class="invalid-feedback">
                                                Campo Obrigatório
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>


                                <button class="btn btn-primary mr-2" type="submit">Cadastrar</button>
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
    $('.matriculaExiste').hide();
    $('.placaExiste').hide();
    var dados = <?= json_encode($this->data['cadastro_invalido']) ?>;

    if (dados.erro) {

        document.getElementsByName('nome').item(0).setAttribute("value", dados.proprietario.nome);
        document.getElementsByName('sobrenome').item(0).setAttribute("value", dados.proprietario.sobrenome);
        document.getElementsByName('matricula').item(0).setAttribute("placeholder", dados.proprietario.matricula);
        document.getElementsByName('setor').item(0).setAttribute("value", dados.proprietario.setor);
        document.getElementsByName('telefone').item(0).setAttribute("value", dados.proprietario.telefone);

        if (dados.proprietario.funcao == "Servidor") document.getElementById('gridRadios2').checked = true;

        document.getElementsByName('placa').item(0).setAttribute("value", dados.veiculo.placa);
        document.getElementsByName('modelo').item(0).setAttribute("value", dados.veiculo.modelo);
        document.getElementsByName('cor').item(0).setAttribute("value", dados.veiculo.cor);

        if (dados.erro === 10) {
            
            $('#validationCustom03').select();
            $('#validationCustom03').addClass("matriculaEhIgual");
            $('.matriculaExiste').show();

            $("#validationCustom03").on('input', function() {
                if ($(this).val() !== "") {
                    $(this).removeClass("matriculaEhIgual");
                    $('.matriculaExiste').hide();
                } else {
                    $(this).addClass("matriculaEhIgual");
                    $('.matriculaExiste').show();
                }
            });
        } else {
            document.getElementsByName('placa').item(0).setAttribute("placeholder", dados.veiculo.placa);
            $('#validationCustom06').select();
            $('#validationCustom06').addClass("matriculaEhIgual");
            $('.placaExiste').show();

            $("#validationCustom06").on('input', function() {
                if ($(this).val() !== "") {
                    $(this).removeClass("matriculaEhIgual");
                    $('.placaExiste').hide();
                } else {
                    $(this).addClass("matriculaEhIgual");
                    $('.placaExiste').show();
                }
            });
        }

    }

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