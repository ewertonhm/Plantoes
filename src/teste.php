<?php

require_once 'config.php';

$u = UsuariosQuery::create()->findByLogin('admin');
var_dump($u);