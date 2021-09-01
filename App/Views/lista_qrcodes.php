<?= $this->layout("_theme", $this->data); ?>
<?php $id_check = 1; ?>
<div class="adminx-main-content">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= url("") ?>">Principal</a></li>
                <li class="breadcrumb-item active  aria-current=" page">Lista de QR Codes</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>QR Codes</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <strong>Impressão de QR Codes</strong><br>
                    Selecione um ou mais QR Codes para Impressão.
                </div>
            </div>
        </div>
        <form action="qrcodes.php" method="post">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <div class="form-check form-check-inline">
                        <input class="seleciona-todos form-check-input" type="checkbox" value="" id="defaultCheck1" onClick="toggle(this)">
                        <label class="form-check-label" for="defaultCheck1">
                            Selecionar Todos
                        </label>
                    </div>
                    <!-- <input type="checkbox" onClick="toggle(this)"> -->
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="submit" id="botao" class="btn btn-primary">Imprimir</button>
                </div>
            </div>

            <div class="row">
                <?php foreach ($qrcodes as $qrcode) : ?>
                    <div class="col-4 col-sm-1 p-0">
                        <div class="card md-grid m-2">
                            <label class="m-0" for="<?= $id_check ?>">
                                <div class="cardQr card-body d-flex flex-column justify-content-center">
                                    <div style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">
                                        <img src="<?= ROOT . "/assets/img/qr-code.png" ?>" alt="" class="img-thumbnail">
                                        <h6 class="text-center"><strong><?= $qrcode->nome_do_arquivo ?></strong></h6>
                                        <input id="<?= $id_check++ ?>" name="items[]" class="items-qr form-check-input" type="checkbox" value="<?= $qrcode->id_prop ?>">
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="d-flex justify-content-end">
                <button id="botao" class="btn btn-primary">Imprimir</button>
            </div>
        </form>
    </div>
</div>

<?php $this->start('scripts');?>
<script>
    $(document).ready(function() {
        // Card Multi Select
        $('.items-qr').click(function() {
            if ($(this).parent().parent().hasClass('active')) {
                $(this).parent().parent().removeClass('active');
            } else {
                $(this).parent().parent().addClass('active');
            }
        });
        checkboxes = document.getElementsByName('items[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            if (checkboxes[i].checked == true) {
                $(checkboxes[i]).parent().parent().addClass('active');
            }
        }

    });

    function toggle(source) {
        checkboxes = document.getElementsByName('items[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            if (checkboxes[i].checked == source.checked) {
                if ($(checkboxes[i]).parent().parent().hasClass('active')) {
                    $(checkboxes[i]).parent().parent().addClass('active');
                } else {
                    $(checkboxes[i]).parent().parent().removeClass('active');
                }
            } else {
                checkboxes[i].checked = source.checked;
                if ($(checkboxes[i]).parent().parent().hasClass('active')) {
                    $(checkboxes[i]).parent().parent().removeClass('active');
                } else {
                    $(checkboxes[i]).parent().parent().addClass('active');
                }
            }
        }
    }
</script>
<?php $this->end();?>