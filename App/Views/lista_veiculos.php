<?= $this->layout("_theme", $this->data); ?>

<div class="adminx-main-content">
    <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= url("") ?>">Principal</a></li>
                <li class="breadcrumb-item active  aria-current=" page">Veículos</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>Veículos</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-grid">
                    <div class="table-responsive-md">
                        <table class="table table-actions table-striped table-hover mb-0" data-table-veiculos>
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <label class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input table-select-all">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Cor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($veiculos as $veiculo) : ?>
                                    <tr>
                                        <th scope="row">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-row">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <td> <?= $veiculo->modelo ?> </td>
                                        <td> <?= $veiculo->placa ?> </td>
                                        <td> <?= $veiculo->cor ?> </td>
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
        var table = $('[data-table-veiculos]').DataTable({
            retrieve: true,
            "columns": [
                null,
                null,
                null,
                {
                    "orderable": false
                }
            ],
            language: {
                url: 'plugins/Portuguese-Brasil-1.10.16.json'
            }
        });

        /* $('.form-control-search').keyup(function(){
          table.search($(this).val()).draw() ;
        }); */
    });
</script>
<?php $this->end();?>