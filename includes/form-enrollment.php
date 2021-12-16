<div class="space"></div>
<div class="form column-model" id="national-mobility">
    <form name="national-mobility" action="#national-mobility" method="post" onsubmit="return enrollmentValidation()">
        <h2>Mobilidade Nacional</h2>
        <div class="col">
            <label for="home-institution">IES de Origem:</label>
            <select name="home-institution" id="home-institution" required>
                <option value="" disabled="disabled">Selecione a Instituição de Origem</option>
                <option value="1">Eniac | Centro Universitário</option>
                <option value="2">Faculdade FATEB</option>
                <option value="3">Faculdade FECAF</option>
                <option value="4">FAESA | Centro Universitário</option>
                <option value="5">Grupo Unis | Cidade Universitária</option>
                <option value="6">Toledo Prudente | Centro Universitário</option>
                <option value="7">UNDB | Centro Universitário</option>
                <option value="8">UniOpet | Centro Universitário</option>
                <option value="9">UNISUAM | Centro Universitário</option>
            </select>
        </div>
        <div class="row">
            <div class="col">
                <label for="first-name">Primeiro nome: *</label>
                <input type="text" name="first-name" id="first-name" inputmode="verbatim" required placeholder="Informe o seu primeiro nome">
            </div>
            <div class="col">
                <label for="last-name">Sobrenome: *</label>
                <input type="text" name="last-name" id="last-name" inputmode="verbatim" required placeholder="Informe o seu sobrenome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email">E-mail: *</label>
                <input type="text" name="email" id="email" inputmode="email" required placeholder="Informe o seu e-mail">
            </div>
            <div class="col">
                <label for="phone">Celular: *</label>
                <input type="text" name="phone" id="phone" inputmode="tel" required placeholder="Informe o seu celular">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="course">Curso: *</label>
                <input type="text" name="course" id="course" inputmode="verbatim" required placeholder="Informe o seu curso atual">
            </div>
            <div class="col">
                <label for="semester">Período: *</label>
                <input type="number" name="semester" id="semester" min="1" max="10" inputmode="numeric" required placeholder="Informe o seu semestre atual">
            </div>
        </div>
        <div class="col">
            <label for="destination-institution">IES de Destino:</label>
            <select name="destination-institution" id="destination-institution" required>
                <option value="" disabled="disabled">Selecione a Instituição de Destino</option>
                <option value="1">Eniac | Centro Universitário</option>
                <option value="2">Faculdade FATEB</option>
                <option value="3">Faculdade FECAF</option>
                <option value="4">FAESA | Centro Universitário</option>
                <option value="5">Grupo Unis | Cidade Universitária</option>
                <option value="6">Toledo Prudente | Centro Universitário</option>
                <option value="7">UNDB | Centro Universitário</option>
                <option value="8">UniOpet | Centro Universitário</option>
                <option value="9">UNISUAM | Centro Universitário</option>
            </select>
        </div>
        <div class="toast">
            <?php
            if (!empty($registrationResponse["status"])) {
                if ($registrationResponse["status"] == "error") { ?>
                    <div class="server-response error-msg">
                        <?php echo $registrationResponse["message"]; ?>
                    </div>
                <?php
                } else if ($registrationResponse["status"] == "success") { ?>
                    <div class="server-response success-msg">
                        <?php echo $registrationResponse["message"]; ?>
                    </div>
            <?php
                }
            } ?>
        </div>
        <div class="col">
            <input type="submit" class="button" name="national-mobility-btn" id="national-mobility-btn" value="Enviar">
        </div>
    </form>
</div>