<?php
// --- Configuration ---
header('Content-Type: application/json');

// This array maps the numeric IDs from your 'hiscore' table to display names
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

// --- Database Connection ---
require_once '/etc/game_server/db_config.php';

$response = ['success' => false, 'message' => 'An unknown error occurred.'];

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $highscores_by_skill = [];

    // ===============================================
    // 1. FETCH SKILL HIGHSCORES (from the 'hiscore' table)
    // ===============================================

    // We select the top 25 rows from the 'hiscore' table, sorted by score and skill_id
    $sql_skill = "
        SELECT 
            a.username as player_name, 
            level,
            value DIV 10 as score, 
            type as skill_id,
            (SELECT COUNT(*) FROM hiscore AS t2 
            WHERE t2.type = h.type AND t2.value >= h.value) AS rank_in_skill
        FROM hiscore as h
        INNER JOIN account as a ON h.account_id = a.id;
        ORDER BY skill_id ASC, score DESC
    ";

    $stmt_skill = $pdo->query($sql_skill);
    $raw_skill_scores = $stmt_skill->fetchAll(PDO::FETCH_ASSOC);

    // The rest of the loop logic remains the same, but we need to ensure the rank calculation logic is robust.
    // The subquery above is updated to correctly rank by level first, then score.

    foreach ($raw_skill_scores as $score) {
        $skill_id = (int)$score['skill_id'];
        $skill_name = $skill_map[$skill_id] ?? "Unknown Skill ID: {$skill_id}";
        
        // Filter to only include the top 10 for each skill
        if ((int)$score['rank_in_skill'] <= 10) {
            if (!isset($highscores_by_skill[$skill_id])) {
                $highscores_by_skill[$skill_id] = [
                    'id' => $skill_id,
                    'name' => $skill_name,
                    'scores' => []
                ];
            }
            $highscores_by_skill[$skill_id]['scores'][] = [
                'rank' => (int)$score['rank_in_skill'],
                'player' => $score['player_name'],
                'score' => (int)$score['score'],
                'level' => (int)$score['level'] // <--- NEW: Include level in API response
            ];
        }
    }


    // ===============================================
    // 2. FETCH TOTAL HIGHSCORE (from the 'hiscore_large' table)
    // ===============================================
    
    // Assuming hiscore_large contains the total scores, and we only need the top 10
    $sql_total = "
        SELECT 
            a.username as player_name, 
            h.level as level
            h.value as score
        FROM hiscore_large as h
        INNER JOIN account as a ON h.account_id = a.id;
        ORDER BY total_level DESC, total_score DESC
        LIMIT 30
    ";
    
    $stmt_total = $pdo->query($sql_total);
    $raw_total_scores = $stmt_total->fetchAll(PDO::FETCH_ASSOC);
    
    $total_id = 0; // Use 0 as the key for 'Total Score'

    if (!empty($raw_total_scores)) {
        $highscores_by_skill[$total_id] = [
            'id' => $total_id,
            'name' => $skill_map[$total_id],
            'scores' => []
        ];
        
        $rank = 1;
        foreach ($raw_total_scores as $score) {
            $highscores_by_skill[$total_id]['scores'][] = [
                'rank' => $rank++,
                'player' => $score['player_name'],
                'score' => (int)$score['score'],
                'level' => (int)$score['level']
            ];
        }
    }

    // ===============================================
    // 3. FINALIZE AND RETURN
    // ===============================================
    
    // Sort the final result to put "Total Score" (ID 0) first
    ksort($highscores_by_skill);

    $response = ['success' => true, 'data' => array_values($highscores_by_skill)];

} catch (PDOException $e) {
    // SECURITY NOTE: In a production site, return a generic error.
    // echo "Error: " . $e->getMessage(); // Uncomment for debugging
    $response['message'] = 'Could not fetch data from the Vortexscape database.';
}

echo json_encode($response);
?>