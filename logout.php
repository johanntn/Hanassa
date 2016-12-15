

<?php
require_once('config.php');
session_start();
session_destroy();

redirect(SITE_ROOT); //siirry kotisivulle
?>


