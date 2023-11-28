<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 24/11/23
 * Time: 06:30 PM
 */
?>

<head>

    <meta charset="utf-8" />
    <title><?= ($title) ? $title : '' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Rápido sin Riesgos" name="description" />
    <meta content="Rápido sin Riesgos" name="author" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <?php echo $css_files = $css_files ?? ''; ?>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('/'); ?>">Rapido sin Riesgos</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Rapido sin Riesgos</h2>
            </div>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="card">
                    <div class="header">
                        <h2>Generar QR</h2>
                    </div>
                    <div class="body">
                        <form id="form_generate_qr" method="POST">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" id="name" required>
                                    <label for="name" class="form-label">Nombre</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="quantity" id="quantity" required>
                                    <label for="quantity" class="form-label">Cantidad</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone" id="phone" required>
                                    <label for="phone" class="form-label">Teléfono</label>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect button-download-qr" type="submit">ENVIAR</button>
                        </form>
                        
                        <div class="img-qr" style="text-align: center"></div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>Formularios Nueva Instalación</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfixt">
                            <div class="col-sm-12">
                                <select class="form-control show-tick" id="establishment" name="establishment" required>
                                    <?php foreach($list_form_new_installation as $form_new_installation){ ?>
                                        <option value="<?php echo $form_new_installation->id; ?>"><?php echo $form_new_installation->establishment_name; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="establishment" class="form-label"></label>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect button-pdf-download" type="submit">DESCARGAR PDF</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
        </div>
    </section>

    <?php echo $js_files = $js_files ?? ''; ?>
</body>
