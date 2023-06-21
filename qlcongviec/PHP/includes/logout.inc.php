<?php
session_start();
session_unset();
session_destroy();
header("location: ../../HTML/index.php");
exit();
