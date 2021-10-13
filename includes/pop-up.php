<?php
use PhpLogin\Member;
if (!empty( $_POST["change-my-account-btn"])) {
    require_once __DIR__ . '/../Model/Member.php';	
    $member = new Member();
    $changeMyAccountResponse = $member->changeMyPassWord();
}
if (!empty($changeMyAccountResponse["status"])) {?>
    <div class="pop-up" data-my-account>
<?php }else{ ?>
    <div class="pop-up sr-only" data-my-account>
<?php } ?>
    <form name="change-password" action="" id="change-password" method="post" onsubmit="return changePasswordValidation()">
        <div class="action">
            <h1>Alterar Senha</h1>
            <i class="fas fa-times" data-close-pop-my-account></i>
        </div>
        <input type="text" name="username" id="username" class="sr-only" value="<?php echo $username; ?>" readonly>
        <label for="current-password">Senha: *</label>
        <input type="password" name="current-password" id="current-password" inputmode="verbatim" required>
        <label for="new-password">Nova senha: *</label>
        <input type="password" name="new-password" id="new-password" inputmode="verbatim" required>
        <label for="confirm-new-password">Confirme a nova senha: *</label>
        <input type="password" name="confirm-new-password" id="confirm-new-password" inputmode="verbatim" required>
        <div class="toast">
            <?php
            if (!empty($changeMyAccountResponse["status"])) {
                if ($changeMyAccountResponse["status"] == "error") { ?>
            <div class="server-response error-msg">
                <?php echo $changeMyAccountResponse["message"]; ?>
            </div>
            <?php
                } else if ( $changeMyAccountResponse["status"] == "success" ) { ?>
            <div class="server-response success-msg">
                <?php echo $changeMyAccountResponse["message"]; ?>
            </div>
            <?php 
                }
            } ?>
        </div>
        <input type="submit" class="button" name="change-my-account-btn" id="change-my-account-btn" value="Alterar">
    </form>
</div>
</div>
<script src="assets/scripts/validation.js"></script>