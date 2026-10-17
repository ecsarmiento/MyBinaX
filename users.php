<?php
require 'config.php';

$usersFile = DATA_DIR . '/users.json';
$scoresFile = DATA_DIR . '/scores.json';

function loadUsers() {
    global $usersFile;
    if (!file_exists($usersFile)) return [];
    return json_decode(file_get_contents($usersFile), true) ?: [];
}

function saveUsers($users) {
    global $usersFile;
    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
}

function loadScores() {
    global $scoresFile;
    if (!file_exists($scoresFile)) return [];
    return json_decode(file_get_contents($scoresFile), true) ?: [];
}

function saveScoreData($scoreData) {
    global $scoresFile;
    file_put_contents($scoresFile, json_encode($scoreData, JSON_PRETTY_PRINT));
}

function findUserByEmail($email) {
    $users = loadUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) return $user;
    }
    return null;
}

function findUserByGameName($name) {
    $users = loadUsers();
    foreach ($users as $user) {
        if ($user['game_name'] === $name) return $user;
    }
    return null;
}

function createUser($fullName, $gameName, $email, $password) {
    if (findUserByEmail($email)) return 'email_exists';
    if (findUserByGameName($gameName)) return 'game_exists';
    
    $users = loadUsers();
    $users[] = [
        'id' => uniqid(),
        'full_name' => $fullName,
        'game_name' => $gameName,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];
    saveUsers($users);
    return true;
}

function saveGameScore($userId, $gameName, $score) {
    $scores = loadScores();
    $scores[] = [
        'user_id' => $userId,
        'game_name' => $gameName,
        'score' => $score,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    saveScoreData($scores);
}

function getUserScores($userId) {
    return array_filter(loadScores(), fn($s) => $s['user_id'] === $userId);
}
?>
