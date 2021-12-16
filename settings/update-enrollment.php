<?php

use PhpLogin\Enrollment;

session_start();
if (!empty($_SESSION["username"]) && $_SESSION["access"] = 4) {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        $url = "./index.php?status=error";
        header("Location: $url");
    }
    require_once __DIR__ . '/../Model/Enrollment.php';
    $enrollment = new Enrollment();
    $registrations = $enrollment->getEnrollmentById($_GET['id']);
    if (!empty($_POST["update-btn"])) {
        $responseUpdate = $enrollment->updateEnrollment();
        $registrations = $enrollment->getEnrollmentById($_GET['id']);
    }
} else {
    $url = "../index.php";
    header("Location: $url");
}

?>
<!DOCTYPE html>
<html lang="PT_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <!--CSS-->
    <link rel="stylesheet" href="../assets/styles/global.css">
    <link rel="stylesheet" href="../assets/styles/form.css">

    <!--ICON-->
    <link rel="icon" href="../assets/images/icon.svg">
</head>

<body>
    <div class="content">
        <main>
            <div class="container">
                <div class="form column-model">
                    <form class="column-model" name="update-enrollment" action="" method="post" onsubmit="return changeEnrollmentValidation()">
                        <div class="row">
                            <div class="col">
                                <h1>Atualizar Inscrição</h1>
                            </div>
                        </div>
                        <?php array_filter($registrations, function ($registration) { ?>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="enrollment-id" id="enrollment-id" class="sr-only" value="<?= $registration['id'] ?>" readonly>
                                    <label for="first-name">Primeiro nome:</label>
                                    <input type="text" name="first-name" id="first-name" inputmode="verbatim" value="<?= $registration['first_name'] ?>" required>
                                </div>
                                <div class="col">
                                    <label for="last-name">Sobrenome:</label>
                                    <input type="text" name="last-name" id="last-name" inputmode="verbatim" value="<?= $registration['last_name'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="email">E-mail:</label>
                                    <input type="text" name="email" id="email" inputmode="email" value="<?= $registration['email'] ?>" required>
                                </div>
                                <div class="col">
                                    <label for="phone">Celular:</label>
                                    <input type="text" name="phone" id="phone" inputmode="tel" value="<?= $registration['phone'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="course">Curso:</label>
                                    <input type="text" name="course" id="course" inputmode="verbatim" value="<?= $registration['course'] ?>" required>
                                </div>
                                <div class="col">
                                    <label for="semester">Período:</label>
                                    <input type="number" name="semester" id="semester" min="1" max="10" inputmode="numeric" value="<?= $registration['semester'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="home-institution">IES de Origem:</label>
                                    <select name="home-institution" id="home-institution" required>
                                        <option value="" disabled="disabled">Selecione a Instituição de Origem</option>
                                        <option value="1" <?= ($registration['id_home_institution'] == '1') ? 'selected="true"' : '' ?>>Eniac | Centro Universitário</option>
                                        <option value="2" <?= ($registration['id_home_institution'] == '2') ? 'selected="true"' : '' ?>>Faculdade FATEB</option>
                                        <option value="3" <?= ($registration['id_home_institution'] == '3') ? 'selected="true"' : '' ?>>Faculdade FECAF</option>
                                        <option value="4" <?= ($registration['id_home_institution'] == '4') ? 'selected="true"' : '' ?>>FAESA | Centro Universitário</option>
                                        <option value="5" <?= ($registration['id_home_institution'] == '5') ? 'selected="true"' : '' ?>>Grupo Unis | Cidade Universitária</option>
                                        <option value="6" <?= ($registration['id_home_institution'] == '6') ? 'selected="true"' : '' ?>>Toledo Prudente | Centro Universitário</option>
                                        <option value="7" <?= ($registration['id_home_institution'] == '7') ? 'selected="true"' : '' ?>>UNDB | Centro Universitário</option>
                                        <option value="8" <?= ($registration['id_home_institution'] == '8') ? 'selected="true"' : '' ?>>UniOpet | Centro Universitário</option>
                                        <option value="9" <?= ($registration['id_home_institution'] == '9') ? 'selected="true"' : '' ?>>UNISUAM | Centro Universitário</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="destination-institution">IES de Destino:</label>
                                    <select name="destination-institution" id="destination-institution" required>
                                        <option value="" disabled="disabled">Selecione a Instituição de Destino</option>
                                        <option value="1" <?= ($registration['id_destination_institution'] == '1') ? 'selected="true"' : '' ?>>Eniac | Centro Universitário</option>
                                        <option value="2" <?= ($registration['id_destination_institution'] == '2') ? 'selected="true"' : '' ?>>Faculdade FATEB</option>
                                        <option value="3" <?= ($registration['id_destination_institution'] == '3') ? 'selected="true"' : '' ?>>Faculdade FECAF</option>
                                        <option value="4" <?= ($registration['id_destination_institution'] == '4') ? 'selected="true"' : '' ?>>FAESA | Centro Universitário</option>
                                        <option value="5" <?= ($registration['id_destination_institution'] == '5') ? 'selected="true"' : '' ?>>Grupo Unis | Cidade Universitária</option>
                                        <option value="6" <?= ($registration['id_destination_institution'] == '6') ? 'selected="true"' : '' ?>>Toledo Prudente | Centro Universitário</option>
                                        <option value="7" <?= ($registration['id_destination_institution'] == '7') ? 'selected="true"' : '' ?>>UNDB | Centro Universitário</option>
                                        <option value="8" <?= ($registration['id_destination_institution'] == '8') ? 'selected="true"' : '' ?>>UniOpet | Centro Universitário</option>
                                        <option value="9" <?= ($registration['id_destination_institution'] == '9') ? 'selected="true"' : '' ?>>UNISUAM | Centro Universitário</option>
                                    </select>
                                </div>
                            </div>
                        <?php }); ?>
                        <div class="toast">
                            <?php
                            if (!empty($responseUpdate["status"])) {
                                if ($responseUpdate["status"] == "error") { ?>
                                    <div class="server-response error-msg">
                                        <?php echo $responseUpdate["message"]; ?>
                                    </div>
                                <?php
                                } else if ($responseUpdate["status"] == "success") { ?>
                                    <div class="server-response success-msg">
                                        <?php echo $responseUpdate["message"]; ?>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                        <div class="row">
                            <div class="col action">
                                <a href="enrollment.php" class="button go-back">VOLTAR</a>
                                <input type="submit" class="button" name="update-btn" id="update-btn" value="Salvar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="../assets/scripts/validation.js"></script>
        <?php include __DIR__ . "/../includes/footer.php"; ?>