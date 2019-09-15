<?php


namespace App\View;


class Head
{
    public function __construct($page = '', $name = '')
    {
        echo <<<TAG

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <title>$name</title>
    <link rel='stylesheet' href='assets/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/fonts/ionicons.min.css'>
TAG;
        if($page == 'login'){
           echo"<link rel='stylesheet' href='assets/css/styles.min-login.css'>";
        }
        if($page == 'bar'){
            echo"<link rel='stylesheet' href='assets/css/styles-bar.min.css'>";
        }
        if($page == 'cadjuiz'){
            echo"<link rel='stylesheet' href='assets/css/styles.min-juiz.css'>";
        }
        if($page == NULL){
            echo"<link rel='stylesheet' href='assets/css/styles.min-juiz.css'>";
            echo"<link rel='stylesheet' href='assets/css/styles-bar.min.css'>";
            echo"<link rel='stylesheet' href='assets/css/styles.min-login.css'>";
        }

echo "</head>";
    }

}