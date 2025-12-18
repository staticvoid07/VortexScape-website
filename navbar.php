<?php
// Get the current filename (e.g., 'index.php')
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="navbar">
    <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active-link' : ''; ?>">Download Client</a>
    <a href="highscores.php" class="<?php echo ($current_page == 'highscores.php') ? 'active-link' : ''; ?>">Highscores</a>
</div>