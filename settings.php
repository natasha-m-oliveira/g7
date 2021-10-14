<?php
use PhpLogin\Member;
session_start();

if (isset($_SESSION["id_access_profile"]) && $_SESSION["id_access_profile"] = 4) {
    $username = $_SESSION["username"];
    session_write_close();
    if (!empty( $_POST["change-my-account-btn"])) {
        require_once __DIR__ . '/Model/Member.php';	
        $member = new Member();
        $changeMyAccountResponse = $member->changeMyPassWord();
    }
    
} else {
    session_unset();
    session_write_close();
    $url = "./login.php";
    header("Location: $url");
}
?>
<!DOCTYPE html>
<html lang="PT_br">

<head>
    <title>Configurações | G7</title>

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
    <link rel="stylesheet" href="assets/styles/settings.css">

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
        </header>
        <main>
            <div class="container">
                <div class="welcome">
                    <div class="title">
                        <h1 data-typed-words><?php echo $username; ?></h1>
                        <h1 data-typed-cursor>|</h1>
                    </div>
                </div>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Perfil de Acesso</th>
                            <th>Último Aceesso</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Admin</td>
                            <td>admin@eniac.edu.br</td>
                            <td>Administrador</td>
                            <td>13-10-2021 22:15:45</td>
                            <td>13-10-2021 22:02:35</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Natasha M Oliveira</td>
                            <td>natasha.oliveira@eniac.edu.br</td>
                            <td>Visualizador</td>
                            <td>11-10-2021 02:28:13</td>
                            <td>11-10-2021 02:30:57</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Admin</td>
                            <td>admin@eniac.edu.br</td>
                            <td>Administrador</td>
                            <td>13-10-2021 22:15:45</td>
                            <td>13-10-2021 22:02:35</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Natasha M Oliveira</td>
                            <td>natasha.oliveira@eniac.edu.br</td>
                            <td>Visualizador</td>
                            <td>11-10-2021 02:28:13</td>
                            <td>11-10-2021 02:30:57</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Admin</td>
                            <td>admin@eniac.edu.br</td>
                            <td>Administrador</td>
                            <td>13-10-2021 22:15:45</td>
                            <td>13-10-2021 22:02:35</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Natasha M Oliveira</td>
                            <td>natasha.oliveira@eniac.edu.br</td>
                            <td>Visualizador</td>
                            <td>11-10-2021 02:28:13</td>
                            <td>11-10-2021 02:30:57</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Admin</td>
                            <td>admin@eniac.edu.br</td>
                            <td>Administrador</td>
                            <td>13-10-2021 22:15:45</td>
                            <td>13-10-2021 22:02:35</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Natasha M Oliveira</td>
                            <td>natasha.oliveira@eniac.edu.br</td>
                            <td>Visualizador</td>
                            <td>11-10-2021 02:28:13</td>
                            <td>11-10-2021 02:30:57</td>
                            <td><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <script src="assets/scripts/settings.js"></script>
        <?php include("includes/footer.php");?>