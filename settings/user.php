<?php
use PhpLogin\Member;
use PhpLogin\Pagination;
session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] > 1) {
    require_once __DIR__ . '/../Model/Member.php';
    require_once __DIR__ . '/../Model/Pagination.php';

    //Busca
    $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);

    //Condições SQL
    $conditions = [
        strlen($search) ? 'username LIKE "%' . str_replace(' ', '%', $search) . '%"' : null,
        strlen($search) ? 'email LIKE "%' . str_replace(' ', '%', $search) . '%"' : null
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

    //Exportar para Excel
    if(isset($_POST["export-btn"])) {
        $exportResult = $member->exportMemberDatabase();
    }
} else {
    $url = "../index.php";
    header("Location: $url");
} ?>
<?php include __DIR__ . "/../includes/header-settings.php"; ?>
<main>
    <div class="container">
        <div class="title">
            <h2>Usuários</h2>
        </div>
        <?php include __DIR__ . "/../includes/listing-user.php"; ?>
    </div>
</main>
<script src="../assets/scripts/settings.js"></script>