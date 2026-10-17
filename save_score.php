<?php
include 'users.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game = trim($_POST['game'] ?? '');
    $score = (int)($_POST['score'] ?? 0);
    if ($game && $score >= 0) {
        saveGameScore($_SESSION['user_id'], $game, $score);
    }
}
