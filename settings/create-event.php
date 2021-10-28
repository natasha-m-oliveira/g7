<?php

use PhpLogin\Event;

session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] = 4) {
    require_once __DIR__ . '/../Model/Event.php';
    $event = new Event();
    $dateTimeZone = new \DateTime(null, new \DateTimeZone('America/Sao_Paulo'));
    $currentDate = $dateTimeZone->format('Y-m-d');
    if (!empty($_POST["register-event-btn"])) {
        $responseRegister = $event->registerEvent();
    }
} else {
    $url = "../index.php";
    header("Location: $url");
}

?>
<!DOCTYPE html>
<html lang="PT_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <!--CSS-->
    <link rel="stylesheet" href="../assets/styles/global.css">
    <link rel="stylesheet" href="../assets/styles/form.css">

    <!--ICON-->
    <link rel="icon" href="../assets/images/icon.svg">
</head>

<body>
    <div class="content">
        <main>
            <div class="container">
                <div class="form">
                    <form name="register-event" action="" method="post" onsubmit="return registerEventValidation()">
                        <h1>Cadastrar Evento</h1>
                        <label for="theme">Tema:</label>
                        <input type="text" name="theme" id="theme" inputmode="verbatim" required placeholder="Informe o tema do evento">
                        <label for="local">Local</label>
                        <input type="text" name="local" id="local" inputmode="verbatim" required placeholder="Informe o local do evento">
                        <label for="date">Data</label>
                        <input type="date" name="date" id="date" min="<?=$currentDate?>" inputmode="date" required placeholder="dd/mm/aaaa">
                        <label for="category">Categoria:</label>
                        <select name="category" id="category">
                            <option value="" disabled="disabled">Selecione a categoria</option>
                            <option value="public">Público</option>
                            <option value="private">Privado</option>
                        </select>
                        <div class="checkbox">
                            <label for="visible">Visível:</label>
                            <input type="checkbox" name="visible" id="visible" checked="true" value="1">
                        </div>
                        <div class="toast">
                            <?php
                            if (!empty($responseRegister["status"])) {
                                if ($responseRegister["status"] == "error") { ?>
                                    <div class="server-response error-msg">
                                        <?php echo $responseRegister["message"]; ?>
                                    </div>
                                <?php
                                } else if ($responseRegister["status"] == "success") { ?>
                                    <div class="server-response success-msg">
                                        <?php echo $responseRegister["message"]; ?>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                        <div class="action">
                            <a href="event.php" class="button go-back">VOLTAR</a>
                            <input type="submit" class="button" name="register-event-btn" id="register-event-btn" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="../assets/scripts/validation.js"></script>
        <?php include __DIR__ . "/../includes/footer.php"; ?>