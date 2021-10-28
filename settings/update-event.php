<?php

use PhpLogin\Event;

session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] = 4) {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        $url = "./index.php?status=error";
        header("Location: $url");
    }
    require_once __DIR__ . '/../Model/Event.php';
    $event = new Event();
    $meetings = $event->getEventById($_GET['id']);
    if (!empty($_POST["update-btn"])) {
        $responseUpdate = $event->updateEvent();
        $meetings = $event->getEventById($_GET['id']);
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
                    <form name="update-user" action="" method="post" onsubmit="return changeEventValidation()">
                        <h1>Atualizar Evento</h1>
                        <?php array_filter($meetings, function ($meeting) { ?>
                            <input type="text" name="event-id" id="event-id" class="sr-only" value="<?= $meeting['id'] ?>" readonly>
                            <label for="theme">Tema:</label>
                            <input type="text" name="theme" id="theme" inputmode="verbatim" value="<?= $meeting['theme'] ?>" required placeholder="Informe o tema do evento">
                            <label for="local">Local</label>
                            <input type="text" name="local" id="local" inputmode="verbatim" value="<?= $meeting['local'] ?>" required placeholder="Informe o local do evento">
                            <label for="date">Data</label>
                            <input type="date" name="date" id="date" inputmode="date" value="<?= $meeting['date'] ?>" required placeholder="dd/mm/aaaa">
                            <label for="category">Categoria:</label>
                            <select name="category" id="category">
                                <option value="" disabled="disabled">Selecione a categoria</option>
                                <option value="public" <?=($meeting['category'] == 'public')?'selected="true"':''?>>Público</option>
                                <option value="private" <?=($meeting['category'] == 'private')?'selected="true"':''?>>Privado</option>
                            </select>
                            <div class="checkbox">
                                <label for="visible">Visível:</label>
                                <input type="checkbox" name="visible" id="visible" <?=($meeting['visible'] == 1)?'checked="true"':''?> value="1">
                            </div>
                        <?php }); ?>
                        <div class="toast">
                            <?php
                            if (!empty($responseUpdate["status"])) {
                                if ($responseUpdate["status"] == "error") { ?>
                                    <div class="server-response error-msg">
                                        <?php echo $responseUpdate["message"]; ?>
                                    </div>
                                <?php
                                } else if ($responseUpdate["status"] == "success") { ?>
                                    <div class="server-response success-msg">
                                        <?php echo $responseUpdate["message"]; ?>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                        <div class="action">
                            <a href="event.php" class="button go-back">VOLTAR</a>
                            <input type="submit" class="button" name="update-btn" id="update-btn" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="../assets/scripts/validation.js"></script>
        <?php include __DIR__ . "/../includes/footer.php"; ?>