<?php
$_SESSION['login'] = false;
session_unset();
session_destroy();
echo "<script>document.location.replace('http://localhost:8888/geipan/geipan');</script>";   