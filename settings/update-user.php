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
    $users = $member->getMemberById($_GET['id']);
    if(!empty($_POST["update-btn"])){
        $responseUpdate = $member->changeProfile();
        $users = $member->getMemberById($_GET['id']);
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
                <div class="form delete">
                    <form name="update" action="" method="post" onsubmit="return updateUser()">
                        <h1>Atualizar Usuário</h1>
                        <?php array_filter ($users, function ($user) { ?>
                            <input type="text" name="user-id" id="user-id" class="sr-only" value="<?php echo $user['id']; ?>" readonly>
                            <label for="username">Usuário:</label>
                            <input type="text" name="username" id="username" inputmode="verbatim" value="<?php echo $user['username'];?>" readonly>
                            <label for="email">E-mail:</label>
                            <input type="text" name="email" id="email" inputmode="verbatim" value="<?php echo $user['email'];?>" required>
                            <label for="update-password">Senha:</label>
                            <input type="password" name="update-password" id="update-password" inputmode="verbatim" value="******" required>
                            <label for="acess-profile">Perfil:</label>
                            <select name="acess-profile" id="acess-profile">
                                <option value="0" disabled="disabled">Selecione o perfil</option>
                                <option value="1" <?=($user['id_access_profile'] == '1')?'selected="true"':''?>>Básico</option>
                                <option value="2" <?=($user['id_access_profile'] == '2')?'selected="true"':''?>>Visualizador</option>
                                <option value="3" <?=($user['id_access_profile'] == '3')?'selected="true"':''?>>Explorador</option>
                                <option value="4" <?=($user['id_access_profile'] == '4')?'selected="true"':''?>>Administrador</option>
                            </select>
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
                            <a href="user.php" class="button go-back">VOLTAR</a>
                            <input type="submit" class="button" name="update-btn" id="update-btn" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="../assets/scripts/validation.js"></script>
    <?php include __DIR__ . "/../includes/footer.php";?>