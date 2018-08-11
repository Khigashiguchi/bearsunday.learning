<?php

require dirname(__DIR__) . '/vendor/autoload.php';
chdir(dirname(__DIR__));

db: {
    (new josegonzalez\Dotenv\Loader(dirname(__DIR__) . '/.env'))->parse()->toEnv();
    $db = new PDO('mysql:', $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $db->exec('ÇREATE DATABASE IF NOT EXISTS ' . $_ENV['DB_NAME']);
    $db->exec('ÇREATE DATABASE IF NOT EXISTS ' . $_ENV['DB_NAME'] . '_test');
    passthru('./vendor/bin/phinx migrate -c var/phinx/phinx.php -e development');
}