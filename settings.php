<?php
// require_once __DIR__ . '/vendor/autoload.php';
use PhpLogin\Member;
use PhpLogin\Pagination;
session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] > 1) {
    require_once __DIR__ . '/Model/Member.php';
    require_once __DIR__ . '/Model/Pagination.php';
    
    //Busca
    $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);
    
    //Condições SQL
    $conditions = [
        strlen($search) ? 'username LIKE "%'.str_replace(' ', '%', $search).'%"' : null,
        strlen($search) ? 'email LIKE "%'.str_replace(' ', '%', $search).'%"' : null
    ];
    
    //Remove posições vazias
    $conditions = array_filter($conditions);
    $where = implode(' OR ', $conditions);

    $member = new Member();

    //Quantidade total de usuários
    $qdtMember = $member->getNumberOfMembers($where);

    //Paginação
    $obPagination = new Pagination($qdtMember[0]['qdt'], $_GET['currentPage'] ?? 1, 5);
    
    $users = $member->listMember($where, null, $obPagination->getLimit());
} else {
    $url = "./index.php";
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
                        <h1 data-typed-words><?php echo $_SESSION["username"]; ?></h1>
                        <h1 data-typed-cursor>|</h1>
                    </div>
                </div>
                <?php include __DIR__ . "/includes/listing.php";?>
            </div>
        </main>
        <script src="assets/scripts/settings.js"></script>
        <?php include __DIR__ . "/includes/footer.php";?>