<?php
session_start();
?>
<!DOCTYPE html>
<html lang="PT_br">

<head>
    <title>Início | G7</title>

    <!--Search Engines-->
    <meta name="description" content="Conheça o G7">
    <!--Qual o nome da empresa?-->
    <link rel="nomeEmpresa" href="https://www.g7edu.com.br/">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Início | G7">
    <meta property="og:description" content="Conheça o G7">
    <meta property="og:url" content="https://www.g7edu.com.br/">
    <meta property="og:site_name" content="G7">
    <!-- Incluir a data de atualização
    <meta property="og:updated_time" content="2021-09-05T16:53:40-03:00">
    -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--View Port-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="assets/styles/global.css">
    <link rel="stylesheet" href="assets/styles/home.css">
    
    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!--ICON-->
    <link rel="icon" href="assets/images/icon.svg">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" />

</head>

<body>
    <div class="content" id="outset">
        <header>
            <a href="./index.php"><img src="assets/images/light-logo.svg" alt="G7 LOGO" class="logo"></a>
            <nav role="navigation" class="nav" data-nav>
                <button aria-label="Abrir menu" class="btn-mobile" data-btn-mobile aria-haspopup="true"
                    aria-controls="menu" aria-expanded="false">Menu <span class="burger"></span></button>
                <ul role="menu" id="menu">
                    <li><a href="#outset" data-menu-item class="current">INÍCIO</a></li>
                    <li><a href="#about" data-menu-item>QUEM SOMOS</a></li>
                    <li><a href="#network" data-menu-item>REDE</a></li>
                    <li><a href="#team" data-menu-item>EQUIPE</a></li>
                    <li><a href="#actions" data-menu-item>AÇÕES</a></li>
                    <li><a href="./gallery.php" data-menu-item>GALERIA</a></li>
                    <li><a data-menu-item>CONTATO</a></li>
                    <?php if (!empty($_SESSION["username"])) { ?>
                        <li class="settings-mobile"><a href="./logout.php" data-menu-item>SAIR</a></li>
                    <?php
                    } else { ?>
                        <li class="settings-mobile"><a href="./login.php" data-menu-item>ENTRAR</a></li>
                    <?php
                    } ?>
                </ul>
            </nav>
            <div class="dropdown">
                <div class="dropbtn button" data-menu-config><i class="fas fa-cogs"></i></div>
                <div class="dropdown-content">
                    <?php if (!empty($_SESSION["username"]) && $_SESSION["access"] > 1) { ?>
                        <a href="./settings.php"><i class="fas fa-users-cog"></i></a>
                    <?php } ?>
                    <a data-open-pop-up><i class="fas fa-user-cog"></i></a>
                    <?php if (!empty($_SESSION["username"])) { ?>
                        <a href="./signup.php"><i class="fas fa-sign-out-alt"></i></a>
                        <?php
                    } else { ?>
                        <a href="./login.php"><i class="fas fa-sign-out-alt"></i></a>
                        <?php
                    } ?>
                </div>
            </div>
        </header>