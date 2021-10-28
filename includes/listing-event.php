<div class="table-header">
    <div class="first-line">
        <h2><a href="../settings">Configurações</a> / Eventos</h2>
    </div>
    <div class="second-line">
        <form action="" action="get">
            <button type="submit"><i class="fas fa-search"></i></button>
            <input type="text" name="search" placeholder="Pesquisar..." value="<?= $search ?>">
        </form>
        <a class="button" href="create-event.php"><i class="fas fa-calendar-plus"></i></a>
    </div>
</div>
<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tema</th>
            <th>Local</th>
            <th>Visível</th>
            <th>Categoria</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($meetings)) {
            array_filter($meetings, function ($meeting) { ?>
                <tr>
                    <td><?=$meeting['id']?></td>
                    <td><?=$meeting['theme']?></td>
                    <td><?=$meeting['local']?></td>
                    <td><?=$meeting['visible'] == 1 ? 'Sim' : 'Não'?></td>
                    <td><?=$meeting['category'] == 'private' ? 'Privado' : 'Público'?></td>
                    <td><?=date('d/m/Y', strtotime($meeting['date']))?></td>
                    <td><a href="update-event.php?id=<?=$meeting['id']?>"><i class="far fa-edit"></i></a><a href="delete-event.php?id=<?=$meeting['id']?>"><i class="far fa-trash-alt"></i></a></td>
                </tr>

            <?php
            });
        } else {
            ?>
            <tr>
                <td colspan="7">
                    <p class="no-records-found">Nenhum registro encontrado.</p>
                </td>
            </tr>
        <?php
        } ?>
    </tbody>
</table>
<?php

//Pagination
$pages = $obPagination->getPages();
?>
<div class="pagination">
    <?php
    if (!empty($pages)) {
        array_filter($pages, function ($page) {
            //GETS
            unset($_GET['currentPage']);
            $gets = http_build_query($_GET);
            ?>
            <a href="?currentPage=<?= $page['page'] . '&' . $gets ?>">
                <button type="button" class="button-light<?= $page['current'] ? ' active' : '' ?>"><?= $page['page'] ?></button>
            </a>
    <?php
        });
    } else {
    ?>
        <a href="?currentPage=1">
            <button type="button" class="button-light active">1</button>
        </a>
    <?php
    }
    ?>
</div>