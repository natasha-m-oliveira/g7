<?php
use PhpLogin\Member;
session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] = 4) {
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        $url = "./index.php?status=error";
        header("Location: $url");
    }
    require_once __DIR__ . '/../Model/Member.php';
    $member = new Member();
    if(!empty($_POST["delete-btn"])){
        $responseDelete = $member->deleteMember();
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
                    <form name="update" action="" method="post" class="delete" onsubmit="return updateUser()">
                        <h1>Deletar Usuário</h1>
                        <input type="text" name="user-id" id="user-id" class="sr-only" value="<?php echo $_GET['id']; ?>" readonly>
                        <div class="toast">
                            <?php
                            if (!empty($responseDelete["status"])) {
                                if ($responseDelete["status"] == "error") { ?>
                            <div class="server-response error-msg">
                                <p id="error"><?php echo $responseDelete["message"]; ?></p>
                            </div>
                            <?php
                                } else if ( $responseDelete["status"] == "success" ) { ?>
                            <div class="server-response success-msg">
                                <p id="success"><?php echo $responseDelete["message"]; ?></p>
                            </div>
                            <?php 
                                }
                            }
                            ?>
                        </div>
                        <?php
                            if (empty($responseDelete["status"])) { ?>
                                <p>Tem certeza que deseja detelar o usuário?</p>
                                <div class="action">
                                    <a href="user.php" class="button go-back">VOLTAR</a>
                                    <input type="submit" class="button delete" name="delete-btn" id="delete-btn" value="Deletar">
                                </div>
                            <?php 
                            } else{
                                ?>
                                <div class="action">
                                    <a href="user.php" class="button go-back">VOLTAR</a>
                                </div>
                            <?php
                            } ?>
                    </form>
                </div>
            </div>
        </main>
        <script src="../assets/scripts/validation.js"></script>
    <?php include __DIR__ . "/../includes/footer.php";?>