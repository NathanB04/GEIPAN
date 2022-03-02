<?php

function inclusionInc(string $value) : void
{
    $files = glob('./includes/*.inc.php');
    $page = $_GET['page'] ?? $value;

    $pageTest = './includes/' . $page . '.inc.php';
    if (!in_array($pageTest, $files)) {
        require './includes/'. $value .'.inc.php';
    }
    
    else {
        require $pageTest;
    }
}
