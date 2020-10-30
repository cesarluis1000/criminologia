<?php
class DATABASE_CONFIG {
    
    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'admin',
        'database' => 'criminologia',
        'prefix' => '',
        'encoding' => 'utf8',
        'unix_socket' => '/tmp/mysql.sock',
    );
    /*
     public $default = array(
     'datasource' => 'Database/Postgres',
     'persistent' => false,
     'host' => 'localhost',
     'login' => 'postgres',
     'password' => 'admin',
     'database' => 'seguridad',
     );
     */
}
