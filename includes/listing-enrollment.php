<div class="table-header">
<div class="first-line">
        <h2><a href="../settings">Configurações</a> / Inscrições</h2>
    </div>
    <div class="second-line">
        <form action="" method="get" class="search">
            <button type="submit"><i class="fas fa-search"></i></button>
            <input type="text" name="search" placeholder="Pesquisar..." value="<?= $search ?>">
        </form>
        <a class="button" href="../index.php#national-mobility"><i class="fas fa-user-plus"></i></a>
        <form action="" method="post" class="export">
            <button type="submit" id="export-btn" name="export-btn"><i class="fas fa-download"></i></button>
        </form>
    </div>
</div>
<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Semestre</th>
            <th>IES Origem</th>
            <th>IES Destino</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($enrollments)) {
            array_filter($enrollments, function ($enrollment) { ?>
                <tr>
                    <td><?=$enrollment['id']?></td>
                    <td><?=$enrollment['name']?></td>
                    <td><?=$enrollment['course']?></td>
                    <td><?=$enrollment['semester']?></td>
                    <td><?=$enrollment['home']?></td>
                    <td><?=$enrollment['destination']?></td>
                    <td><a href="update-enrollment.php?id=<?=$enrollment['id']?>"><i class="far fa-edit"></i></a><a href="delete-enrollment.php?id=<?=$enrollment['id']?>"><i class="far fa-trash-alt"></i></a></td>
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