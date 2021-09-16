<?= $this->layout("_theme_alt", $this->data); ?>
<div class="adminx-main-content">
    <div class="container-fluid">

        <div class="pb-3">
            <h2>Consulta de Dados</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-lg-6 d-flex">
                <div class="card mb-grid w-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-center mb-4">
                            <img class="foto" src="<?=url('/assets/img/retrato-generico.png')?>" alt="">

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <h3><strong><?= $proprietario->nome ?></strong></h3>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <h4><?= $proprietario->setor ?></h4>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <h4><?= $proprietario->funcao ?></h4>
                        </div>
                        <div class="d-flex justify-content-center mb-4">
                            <h4><?= "(95) " . $proprietario->telefone ?></h4>
                        </div>
                        <div class="d-flex justify-content-center mb-1">
                            <a href="<?= "https://wa.me/5595" . $proprietario->telefone ?>" class="btn btn-success botao-msg"><i data-feather="message-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>