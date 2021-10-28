<?php
use PhpLogin\Event;
use PhpLogin\Pagination;
session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] > 1) {
    require_once __DIR__ . '/../Model/Event.php';
    require_once __DIR__ . '/../Model/Pagination.php';

    //Busca
    $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);

    //Condições SQL
    $conditions = [
        strlen($search) ? 'theme LIKE "%' . str_replace(' ', '%', $search) . '%"' : null,
        strlen($search) ? 'local LIKE "%' . str_replace(' ', '%', $search) . '%"' : null,
        strlen($search) ? 'category LIKE "%' . str_replace(' ', '%', $search) . '%"' : null
    ];

    //Remove posições vazias
    $conditions = array_filter($conditions);
    $where = implode(' OR ', $conditions);

    $event = new Event();

    //Quantidade total de usuários
    $qdtEvent = $event->getNumberOfEvents($where);

    //Paginação
    $obPagination = new Pagination($qdtEvent[0]['qdt'], $_GET['currentPage'] ?? 1, 5);

    $meetings = $event->listEvent($where, null, $obPagination->getLimit());
} else {
    $url = "../index.php";
    header("Location: $url");
} ?>
<?php include __DIR__ . "/../includes/header-settings.php"; ?>
<main>
    <div class="container">
        <div class="title">
            <h2>Eventos</h2>
        </div>
        <?php include __DIR__ . "/../includes/listing-event.php"; ?>
    </div>
</main>
<script src="../assets/scripts/settings.js"></script>