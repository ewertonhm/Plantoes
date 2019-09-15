<?php


namespace App\View;


class Head
{
    public function __construct($page = '')
    {
        if($page == 'login'){
            echo <<<TAG

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <title>Login</title>
    <link rel='stylesheet' href='assets/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/fonts/ionicons.min.css'>
    <link rel='stylesheet' href='assets/css/styles.min.css'>
</head>

TAG;
        }
        if($page == 'bar'){
            echo <<<TAG

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <title>Login</title>
    <link rel='stylesheet' href='assets/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/fonts/ionicons.min.css'>
    <link rel='stylesheet' href='assets/css/styles-bar.min.css'>
</head>

TAG;
        }


    }

}