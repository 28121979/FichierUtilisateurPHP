<?php

$dsn = 'mysql:host=localhost:3306;dbname=exoPdo';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
    echo "🎊 Connexion réussie";
} catch (PDOException $e) {
    echo "🥹 Échec de la connexion : " . $e->getMessage();
}

?>