<div class="table-header">
    <div class="first-line">
        <h2><a href="../settings">Configurações</a> / Usuários</h2>
    </div>
    <div class="second-line">
        <form action="" method="get" class="search">
            <button type="submit" id="search-btn" name="search-btn"><i class="fas fa-search"></i></button>
            <input type="text" name="search" placeholder="Pesquisar..." value="<?= $search ?>">
        </form>
        <a class="button" href="../signup.php"><i class="fas fa-user-plus"></i></a>
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
            <th>E-mail</th>
            <th>Perfil de Acesso</th>
            <th>Último Aceesso</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($users)) {
            array_filter($users, function ($user) { ?>
                <tr>
                    <td><?=$user['id']?></td>
                    <td><?=$user['username']?></td>
                    <td><?=$user['email']?></td>
                    <td><?=$user['access_profile']?></td>
                    <td><?=$user['last_access'] == null ? '' : date('d/m/Y H:i:s', strtotime($user['last_access']))?></td>
                    <td><?=date('d/m/Y H:i:s', strtotime($user['create_at']))?></td>
                    <td><a href="update-user.php?id=<?=$user['id']?>"><i class="far fa-edit"></i></a><a href="delete-user.php?id=<?=$user['id']?>"><i class="far fa-trash-alt"></i></a></td>
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