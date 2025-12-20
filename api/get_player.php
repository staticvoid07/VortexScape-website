<?php
header('Content-Type: application/json');
require_once '/etc/game_server/db_config.php';

$skill_map = [
    // We'll manually assign 0 for the hiscore_large (Total Score)
    0 => "Total", 
    // Example Skills (Replace these with your 23 skills)
    1 => "Attack",
    2 => "Defence",
    3 => "Strength",
    4 => "Hitpoints",
    5 => "Ranged",
    6 => "Prayer",
    7 => "Magic",
    8 => "Cooking",
    9 => "Woodcutting",
    10 => "Fletching",
    11 => "Fishing",
    12 => "Firemaking",
    13 => "Crafting",
    14 => "Smithing",
    15 => "Mining",
    16 => "Herblore",
    17 => "Agility",
    18 => "Thieving",
    21 => "Runecraft"
];

$user = $_GET['user'] ?? '';

if (empty($user)) {
    echo json_encode(['success' => false, 'message' => 'No player specified']);
    exit;
}

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    
    // 1. Get Skill Data
    $stmt = $pdo->prepare("
        SELECT type as skill_id, level, value div 10 as score
        FROM hiscore as h
        INNER JOIN account as a ON h.account_id = a.id
        WHERE a.username = ?");
    $stmt->execute([$user]);
    $skills = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    // 2. Get Total Data
    $stmt2 = $pdo->prepare("
        SELECT type as skill_id, level, value div 10 as score
        FROM hiscore_large as h
        INNER JOIN account as a ON h.account_id = a.id
        WHERE a.username = ?");
    $stmt2->execute([$user]);
    $total = $stmt2->fetch(PDO::FETCH_ASSOC);
    $stmt2->closeCursor();

    $data = [];
    if ($total) {
        $data[] = ['id' => 0, 'name' => 'Total', 'level' => $total['level'], 'score' => $total['score']];
    }

    foreach ($skills as $s) {
        $data[] = [
            'id' => $s['skill_id'],
            'name' => $skill_map[$s['skill_id']] ?? "Skill " . $s['skill_id'],
            'level' => $s['level'],
            'score' => $s['score']
        ];
    }

    echo json_encode(['success' => true, 'player' => $user, 'stats' => $data]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error fetching player']);
}