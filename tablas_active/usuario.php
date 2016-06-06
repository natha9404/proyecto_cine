<?php
require_once 'php-activerecord/ActiveRecord.php';

// assumes a table named "books" with a pk named "id"
// see simple.sql
class Usuario extends ActiveRecord\Model { }

// initialize ActiveRecord
// change the connection settings to whatever is appropriate for your mysql server 
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('.');
    $cfg->set_connections(array('development' => 'mysql://mamian:@127.0.0.1/c9'));
});

?>