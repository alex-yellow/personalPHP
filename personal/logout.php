<?php
	session_start();
	$_SESSION['auth'] = null;
    echo '<script>location.href="index.php";</script>';
?>