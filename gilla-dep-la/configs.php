<?php

$DB_SERVER = getenv("MVC_SERVER") ?: "127.0.0.1";
//$DB_SERVER = getenv("MVC_SERVER") ?: "192.168.10.15";
$DB_DATABASE = getenv("MVC_DB") ?: "gilla-dep-la";
$DB_USER = getenv("MVC_USER") ?: "root";
//$DB_USER = getenv("MVC_USER") ?: "valentin-validation-test-1";
$DB_PASSWORD = getenv("MVC_TOKEN") ?: "";
//$DB_PASSWORD = getenv("MVC_TOKEN") ?: "WLprpsAt";
$DEBUG = getenv("MVC_DEBUG") ?: true;

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG
);

