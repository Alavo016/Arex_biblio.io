<?php
session_start();
session_destroy();
header('Location: recon.php');
exit();
?>
