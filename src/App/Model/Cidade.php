<?php
namespace App\Model;
use ActiveRecord\Model;
class Cidade extends Model
{
    static $table_name = 'cidade';
    static $has_many = array(
      array('feriado','class_name'=>'Feriado')
    );
}