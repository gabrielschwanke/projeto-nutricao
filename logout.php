<?php
session_start();
session_unset(); // remove todas as variáveis da sessão
session_destroy();
header("Location: login.php");
exit;
