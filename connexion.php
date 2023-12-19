<?php

try {
    $dsn = 'mysql:host=localhost;dbname=tp_minichat';
    $username = 'root';
    $password = '';
    $database = new PDO($dsn, $username, $password);
} catch (Exception $message) {
    echo "ya un problem <br>" . $message;
}
