<?php
$host = 'localhost';
$db   = 'test';
$user = 'root';
$pass = 'flexi140';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


$arrMonths = array(
    'JAN' => '01',
    'FEB' => '02',
    'MAR' => '03',
    'APR' => '04',
    'MAY' => '05',
    'JUN' => '06',
    'JUL' => '07',
    'AUG' => '08',
    'SEP' => '09',
    'OCT' => '10',
    'NOV' => '11',
    'DEC' => '12',
);