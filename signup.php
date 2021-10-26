<?php
use PhpLogin\Member;
if (!empty( $_POST["signup-btn"])) {
	require_once __DIR__ . '/Model/Member.php';	
	$member = new Member();
	$registrationResponse = $member->registerMember();
}
?>
<!DOCTYPE html>
<html lang="PT_br">

<head>
    <title>Cadastre-se | G7</title>

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
    <link rel="stylesheet" href="assets/styles/form.css">

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!--ICON-->
    <link rel="icon" href="assets/images/icon.svg">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" />

</head>

<body>
    <div class="content">
        <main>
            <div class="container">
                <div class="form">
                    <form name="sign-up" action="" method="post" onsubmit="return signupValidation()">
                        <h1>Cadastre-se</h1>
                        <label for="username">Usuário: *</label>
                        <input type="text" name="username" id="username" inputmode="verbatim" required>
                        <label for="email">E-mail: *</label>
                        <input type="text" name="email" id="email" inputmode="email" required>
                        <label for="signup-password">Senha:  *</label>
                        <input type="password" name="signup-password" id="signup-password" inputmode="verbatim" required>
                        <label for="confirm-password">Confirme a senha:  *</label>
                        <input type="password" name="confirm-password" id="confirm-password" inputmode="verbatim" required>
                        <div class="toast">
                            <?php
                            if (!empty($registrationResponse["status"])) {
                                if ($registrationResponse["status"] == "error") { ?>
                                    <div class="server-response error-msg">
                                        <?php echo $registrationResponse["message"]; ?>
                                    </div>
                                <?php
                                } else if ( $registrationResponse["status"] == "success" ) { ?>
                                    <div class="server-response success-msg">
                                        <?php echo $registrationResponse["message"]; ?>
                                    </div>
                                <?php 
                                }
                            } ?>
                        </div>
                        <p>Você já possui uma conta? <a href="login.php">Clique aqui</a></p>
                        <input type="submit" class="button" name="signup-btn" id="signup-btn" value="Cadastre-se">
                    </form>
                </div>
            </div>
        </main>
        <script src="assets/scripts/validation.js"></script>
        <?php include __DIR__ . "/includes/footer.php";?>