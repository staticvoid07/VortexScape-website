<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VortexScape Highscores</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1 id="player-name">Loading...</h1>
        <div id="stats-content"></div>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);
        const username = params.get('user');

        if (!username) {
            document.getElementById('player-name').innerText = "Player not found";
        } else {
            fetch(`/api/get_player.php?user=${encodeURIComponent(username)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('player-name').innerText = data.player;
                        let html = '';
                        data.stats.forEach(s => {
                        html += `
                            <div class="stat-row">
                                <span class="stat-name">${s.name}</span>
                                <span class="stat-lvl">Lvl ${s.level}</span>
                                <span class="stat-val">${s.score.toLocaleString()}</span>
                            </div>`;
                    });
                        document.getElementById('stats-content').innerHTML = html;
                    } else {
                        document.getElementById('player-name').innerText = "Player not found";
                    }
                });
        }
    </script>
</body>
</html>