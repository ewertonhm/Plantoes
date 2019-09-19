<?php

//TO-DO

require_once 'vendor/autoload.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_connections(array('development' =>
    'pgsql://postgres:A1cdl33$2@10.84.200.3/plantoes'));
});
