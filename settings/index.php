<?php
session_start();
if (!empty($_SESSION["username"])) {

} else {
    $url = "../login.php";
    header("Location: $url");
}
include __DIR__ . "/../includes/header-settings.php"; ?>
        <main>
            <div class="container">
                <div class="welcome">
                    <div class="title">
                        <h1 data-typed-words><?php echo $_SESSION["username"]; ?></h1>
                        <h1 data-typed-cursor>|</h1>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../assets/scripts/settings.js"></script>
</body>

</html>