<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?= url("../public/assets/css/adminx.css") ?>" media="screen" />
    <link rel="stylesheet" href="<?= url("../public/assets/css/style2.css") ?>">
    <link rel="stylesheet" href="<?= url("../public/assets/css/styleCadastro.css")?>">
</head>

<body>
    <div class="adminx-container">
        <div class="main_nav">
            <?php if ($this->section("sidebar")) :
                echo $this->section("sidebar");
            else :
            ?>
                <nav class="navbar navbar-expand justify-content-between fixed-top">
                    <a class="navbar-brand mb-0 h1 d-none d-md-block" href="<?= url("") ?>">
                        <img src="<?= ROOT . "/assets/img/logo-qrcode.png" ?>" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
                        IFCode
                    </a>

                    <div class="d-flex flex-1 d-block d-md-none">
                        <a href="#" class="sidebar-toggle ml-3">
                            <i data-feather="menu"></i>
                        </a>
                    </div>

                    <ul class="navbar-nav d-flex justify-content-end mr-2">
                        <div class="d-flex align-items-center">
                            <span class="h6 mb-1"> <?= $_SESSION['nome']; ?></span>
                        </div>
                        <li class="nav-item dropdown">
                            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
                                <img src="<?= ROOT . "/assets/img/logo-admin.png" ?>" class="border border-dark d-inline-block align-top" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <!-- <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="#">Configurações</a>
                            <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item text-danger" href="logout.php">Sair</a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar -->
                <div class="adminx-sidebar expand-hover push">
                    <ul class="sidebar-nav">
                        <li class="sidebar-nav-item">
                            <a id="nav-item-home" href="<?= url("") ?>" class="sidebar-nav-link">
                                <span class="sidebar-nav-icon">
                                    <i data-feather="home"></i>
                                </span>
                                <span class="sidebar-nav-name">
                                    Principal
                                </span>
                                <span class="sidebar-nav-end">

                                </span>
                            </a>
                        </li>

                        <li class="sidebar-nav-item">
                            <a id="nav-item-cadastro" href="<?= url("cadastro") ?>" class="sidebar-nav-link">
                                <span class="sidebar-nav-icon">
                                    <i data-feather="plus-circle"></i>
                                </span>
                                <span class="sidebar-nav-name">
                                    Cadastrar
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-nav-item">
                            <a id="nav-item-qrcodes" class="sidebar-nav-link" href="<?= url("lista/qrcodes") ?>">
                                <span class="sidebar-nav-icon">
                                    <i data-feather="grid"></i>
                                </span>
                                <span class="sidebar-nav-name">
                                    Qr Codes
                                </span>
                            </a>

                        <li class="sidebar-nav-item">
                            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false" aria-controls="navTables">
                                <span class="sidebar-nav-icon">
                                    <i data-feather="align-justify"></i>
                                </span>
                                <span class="sidebar-nav-name">
                                    Tabelas
                                </span>
                                <span class="sidebar-nav-end">
                                    <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                                </span>
                            </a>

                            <ul class="sidebar-sub-nav collapse" id="navTables">
                                <li class="sidebar-nav-item">
                                    <a id="nav-item-lista" href="<?= url("lista") ?>" class="sidebar-nav-link">
                                        <span class="sidebar-nav-abbr">
                                            P
                                        </span>
                                        <span class="sidebar-nav-name">
                                            Proprietários
                                        </span>
                                    </a>
                                </li>

                                <li class="sidebar-nav-item">
                                    <a id="nav-item-lista-veiculo" href="<?= url("lista/veiculos") ?>" class="sidebar-nav-link">
                                        <span class="sidebar-nav-abbr">
                                            V
                                        </span>
                                        <span class="sidebar-nav-name">
                                            Veículos
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-nav-item">
                            <a id="nav-item-painel" class="sidebar-nav-link" href="<?= url("painel") ?>">
                                <span class="sidebar-nav-icon">
                                    <i data-feather="activity"></i>
                                </span>
                                <span class="sidebar-nav-name">
                                    Painel Admin
                                </span>
                            </a>
                        </li>
                    </ul>
                </div><!-- Sidebar End -->

            <?php endif; ?>



            <!-- Conteudo -->
            <div class="main_content adminx-content">

                <?= $this->section('content'); ?>
            </div>
        </div>
    </div>
    <script src="<?= url("../public/assets/js/jquery-3.6.0.min.js") ?>"></script>
    <script src="<?= url("../public/assets/js/popper-1.12.3.min.js") ?>"></script>
    <script src="<?= url("../public/assets/js/bootstrap-4.0.0-beta.2.min.js") ?>"></script>
    <script src="<?= url("../public/assets/js/vendor.js") ?>"></script>
    <script src="<?= url("../public/assets/js/adminx.js") ?>"></script>

    <script src="<?= url("../public/assets/js/jquery.dataTables-1.10.16.min.js") ?>"></script>
    <script src="<?= url("../public/assets/js/dataTable.bootstrap4-1.10.16.min.js") ?>"></script>
    <script src="<?= url("../public/assets/plugins/Portuguese-Brasil-1.10.16.json") ?>"></script>

    <?= $this->section("scripts");?>

    <script>
        $(document).ready(function() {
            var navActive = document.getElementById("nav-item-<?= $this->data['pagina'] ?>");
            if (navActive.id == "nav-item-lista" || navActive.id == "nav-item-lista-veiculo")
                $(document.getElementById("navTables")).addClass("show");
            $(navActive).addClass("active");
        });
        
    </script>
</body>

</html>