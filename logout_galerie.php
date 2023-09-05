<?php

require './admin/test/databaseIdent.php';

session_start();
session_unset();
session_destroy();

header('location:login-adherant');

?>