<?php

use db\Connect as db;

include 'autoload.php';

define('DB_NAME', 'test');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'maurizio');

db::Connect(DB_NAME, DB_HOST, DB_USER, DB_PASS);
