<?php
use PhpLogin\Member;

if ( ! empty( $_POST["login-btn"] ) ) {
	require_once __DIR__ . '/Model/Member.php';	
	$member = new Member();
	$loginResult = $member->loginMember();
}
?>
<!DOCTYPE html>
<html lang="PT_br">

<head>
    <title>Galeria | G7</title>

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
    <link rel="stylesheet" href="assets/styles/login.css">

    <!--JS-->
    <script src="assets/js/jquery.min.js"></script>

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
                <div class="login-form">
                    <form name="login" action="" method="post" onsubmit="return loginValidation()">
                        <h1>Entrar</h1>
                        <label for="username">Usuário: <span class="required error" id="username-info"> *</span></label>
                        <input type="text" name="username" id="username" inputmode="verbatim" required data-type="user">
                        <label for="login-password">Senha: <span class="required error" id="login-password-info"> *</span></label>
                        <input type="password" name="login-password" id="login-password" inputmode="verbatim" required data-type="password">
                        <?php if ( !empty( $loginResult ) ) { ?>
                            <div class="error-msg"><?php echo $loginResult; ?></div>
                        <?php } ?>
                        <p>Você é aluno? <a href="#">Clique aqui</a></p>
                        <input type="submit" class="button" name="login-btn" id="login-btn" value="Entrar">
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div class="first-line">
                <div class="address">
                    <img src="assets/images/light-logo.svg" alt="G7 Logo">
                </div>
                <div class="social-media">
                    <a href="https://www.instagram.com/cegru.lab/" target="_blank" class="social-item"
                        id="instagram"></a>
                    <a href="https://www.linkedin.com/company/g7-rede-de-coopera%C3%A7%C3%A3o/" target="_blank"
                        class="social-item" id="linkedin"></a>
                    <a href="https://wa.me/5511945956773" target="_blank" class="social-item" id="whatsapp"></a>
                </div>
            </div>
            <div class="second-line">
                <p>Copyright © 2021 Design by <a>Luisa Camerini</a> Development by <a
                        href="https://github.com/natasha-m-oliveira">Natasha M Oliveira</a></p>
            </div>
        </footer>
    </div>
    <script>
        function loginValidation() {		
            var valid = true;
            $("#user").removeClass("error-field");
            $("#password").removeClass("error-field");
            var UserName = $("#user").val();
            var Password = $('#login-password').val();
            $("#username-info").html("").hide();
            if (UserName.trim() == "") {
                $("#username-info").html(" *").css("color", "#ee0000").show();
                $("#username").addClass("error-field");
                valid = false;
            }
            if (Password.trim() == "") {
                $("#login-password-info").html(" *").css("color", "#ee0000").show();
                $("#login-password").addClass("error-field");
                valid = false;
            }
            if (valid == false) {
                $('.error-field').first().focus();
                valid = false;
            }
            return valid;
        }
    </script>
</body>

</html>