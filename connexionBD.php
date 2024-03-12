<?php
function createConnection() : PDO {
    $pdo = null;
    try {
        $pdo = new PDO('mysql:host=mysql-xouxou.alwaysdata.net;dbname=xouxou_chat;charset=utf8', 'xouxou', '$iutinfo');
    } catch (Exception $e) {
        echo ("Failed to load database");
        exit(1);
    }
    return $pdo;
}