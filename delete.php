<!DOCTYPE html>
<html lang="PT_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

    <!--CSS-->
    <link rel="stylesheet" href="assets/styles/global.css">
    <link rel="stylesheet" href="assets/styles/form.css">

    <!--ICON-->
    <link rel="icon" href="assets/images/icon.svg">
</head>

<body>
    <div class="content">
        <main>
            <div class="container">
                <div class="form">
                    <form name="update" action="" method="post" class="delete" onsubmit="return updateUser()">
                        <h1>Deletar Usuário</h1>
                        <div class="toast">
                            <?php
                            if (!empty($changeMyAccountResponse["status"])) {
                                if ($changeMyAccountResponse["status"] == "error") { ?>
                            <div class="server-response error-msg">
                                <?php echo $changeMyAccountResponse["message"]; ?>
                            </div>
                            <?php
                                } else if ( $changeMyAccountResponse["status"] == "success" ) { ?>
                            <div class="server-response success-msg">
                                <?php echo $changeMyAccountResponse["message"]; ?>
                            </div>
                            <?php 
                                }
                            } else { ?>
                                    <p>Tem certeza que deseja detelar o usuário?</p>
                                    <div class="action">
                                        <a href="settings.php" class="button go-back">VOLTAR</a>
                                        <input type="submit" class="button delete" name="delete-btn" id="delete-btn" value="Deletar">
                                    </div>
                            <?php 
                            } ?>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="assets/scripts/validation.js"></script>
    <?php include __DIR__ . "/includes/footer.php";?>