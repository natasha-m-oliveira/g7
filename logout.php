<?php
session_start();
session_unset();
session_write_close();
session_destroy();
$url = "/";
header("Location: $url");
?>