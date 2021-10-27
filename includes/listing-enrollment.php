<div class="table-header">
<div class="first-line">
        <h2><a href="../settings">Configurações</a> / Inscrições</h2>
    </div>
    <div class="second-line">
        <form action="" action="get">
            <button type="submit"><i class="fas fa-search"></i></button>
            <input type="text" name="search" placeholder="Pesquisar..." value="<?= $search ?>">
        </form>
        <a class="button" href="../signup.php"><i class="fas fa-user-plus"></i></a>
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
                    <td><?php echo $enrollment['id']; ?></td>
                    <td><?php echo $enrollment['name']; ?></td>
                    <td><?php echo $enrollment['course']; ?></td>
                    <td><?php echo $enrollment['semester']; ?></td>
                    <td><?php echo $enrollment['home']; ?></td>
                    <td><?php echo $enrollment['destination']; ?></td>
                    <td><a href="update-enrollment.php?id=<?php echo $enrollment['id']; ?>"><i class="far fa-edit"></i></a><a href="delete-enrollment.php?id=<?php echo $enrollment['id']; ?>"><i class="far fa-trash-alt"></i></a></td>
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