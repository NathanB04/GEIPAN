<?php
session_start();
date_default_timezone_set('Europe/Paris');

require './functions/autoLoadFunction.php';

spl_autoload_register(function ($className) {
    include './classes/' . $className . '.php';
});

require './includes/head.php';
require './includes/main.php';
require './includes/footer.php';
