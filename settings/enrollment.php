<?php
use PhpLogin\Enrollment;
use PhpLogin\Pagination;
session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] > 1) {
    require_once __DIR__ . '/../Model/Enrollment.php';
    require_once __DIR__ . '/../Model/Pagination.php';

    //Busca
    $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);

    //Condições SQL
    $conditions = [
        strlen($search) ? 'first_name LIKE "%' . str_replace(' ', '%', $search) . '%"' : null,
        strlen($search) ? 'last_name LIKE "%' . str_replace(' ', '%', $search) . '%"' : null,
        strlen($search) ? 'email LIKE "%' . str_replace(' ', '%', $search) . '%"' : null
    ];

    //Remove posições vazias
    $conditions = array_filter($conditions);
    $where = implode(' OR ', $conditions);

    $enrollment = new Enrollment();

    //Quantidade total de usuários
    $qdtEnrollment = $enrollment->getNumberOfEnrollments($where);

    //Paginação
    $obPagination = new Pagination($qdtEnrollment[0]['qdt'], $_GET['currentPage'] ?? 1, 5);

    $enrollments = $enrollment->listEnrollment($where, null, $obPagination->getLimit());
} else {
    $url = "../index.php";
    header("Location: $url");
} ?>
<?php include __DIR__ . "/../includes/header-settings.php"; ?>
<main>
    <div class="container">
        <div class="title">
            <h2>Inscrições</h2>
        </div>
        <?php include __DIR__ . "/../includes/listing-enrollment.php"; ?>
    </div>
</main>
<script src="../assets/scripts/settings.js"></script>