<?php

ob_start();
error_reporting(-1);
session_start();
unset($_SESSION['userId']);
session_destroy();

?>
