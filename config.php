<?php
session_start();
define('DATA_DIR', __DIR__ . '/data');

// Create data folder if missing
if (!file_exists(DATA_DIR)) {
    mkdir(DATA_DIR, 0755, true);
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function getGameName() {
    return $_SESSION['game_name'] ?? 'Explorer';
}
?>
