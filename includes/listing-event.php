<div class="table-header">
    <div class="first-line">
        <h2><a href="../settings">Configurações</a> / Eventos</h2>
    </div>
    <div class="second-line">
        <form action="" method="get" class="search">
            <button type="submit"><i class="fas fa-search"></i></button>
            <input type="text" name="search" placeholder="Pesquisar..." value="<?= $search ?>">
        </form>
        <a class="button" href="create-event.php"><i class="fas fa-calendar-plus"></i></a>
        <form action="" method="post" class="export">
            <button type="submit" id="export-btn" name="export-btn"><i class="fas fa-download"></i></button>
        </form>
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
                    <td><?=$meeting['visible']?></td>
                    <td><?=$meeting['category']?></td>
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
<div class="pagination">
    <?php
    //GETS
    unset($_GET['currentPage']);
    $gets = http_build_query($_GET);
    //Pagination
    $pages = $obPagination->getPages($gets);
    ?>
</div>