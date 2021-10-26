<?php

use PhpLogin\Member;

session_start();
if (!empty($_SESSION["username"])) {
    require_once __DIR__ . '/../Model/Member.php';
    $member = new Member();
    if (!empty($_POST["change-my-account-btn"])) {
        $changeMyAccountResponse = $member->changeMyPassWord();
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
    <title>Editar</title>

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
                    <form name="change-password" action="" method="post" onsubmit="return changePasswordValidation()">
                        <h1>Alterar Senha</h1>
                        <input type="text" name="username" id="username" class="sr-only" value="<?=$_SESSION["username"]?>" readonly>
                        <label for="current-password">Senha: *</label>
                        <input type="password" name="current-password" id="current-password" inputmode="verbatim" required>
                        <label for="new-password">Nova senha: *</label>
                        <input type="password" name="new-password" id="new-password" inputmode="verbatim" required>
                        <label for="confirm-new-password">Confirme a nova senha: *</label>
                        <input type="password" name="confirm-new-password" id="confirm-new-password" inputmode="verbatim" required>
                        <div class="toast">
                            <?php
                            if (!empty($changeMyAccountResponse["status"])) {
                                if ($changeMyAccountResponse["status"] == "error") { ?>
                                    <div class="server-response error-msg">
                                        <?php echo $changeMyAccountResponse["message"]; ?>
                                    </div>
                                <?php
                                } else if ($changeMyAccountResponse["status"] == "success") { ?>
                                    <div class="server-response success-msg">
                                        <?php echo $changeMyAccountResponse["message"]; ?>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                        <div class="action">
                            <a href="user.php" class="button go-back">VOLTAR</a>
                            <input type="submit" class="button" name="change-my-account-btn" id="change-my-account-btn" value="Alterar">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="../assets/scripts/validation.js"></script>
        <?php include __DIR__ . "/../includes/footer.php"; ?>