<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VortexScape</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <h1 class="welcome-title">Welcome to VortexScape!</h1>

    <div class="info-box">
        <p>A modified version of 2004scape that functions as an idle game.</p>
        <details class="learn-more">
            <summary>Learn More about VortexScape Mechanics</summary>
            <div class="details-content">
                <p>Everyone is an ironman, every item is stackable, and most skilling actions infinitely repeat.</p>
                <p>Resources never deplete, you don't lose items on death, and Hans will complete quests for you for 100k each (you still get the quest reward), heroes and legends quest cost 500k.</p>
                <p>Every skill has an idle way of being trained; agility courses auto-complete, fishing spots never move, and pickpocketing/stealing from stalls repeats automatically.</p>
                <p>Some NPCs are always aggressive, all loot drops into your inventory and your prayer points never drain.</p>
                <p>Please read the patch notes if you'd like to learn more.</p>
            </div>
        </details>
        
        <a href="https://github.com/staticvoid07/Server" target="_blank" class="badge">
            This project is open source.
        </a>
    </div>

    <hr class="section-divider">

    <div class="info-box" style="background: rgba(0,0,0,0.2); padding: 20px; border-radius: 8px;">

        <h2>Download the Java Client</h2>
        
        <a href="vortexscape-java-cliet.zip" download class="download-button">
            Download VortexScape Client (Version 2)
        </a>
        <p>or</p>
        <a href="vortexscape.exe" download class="badge">
            Download executable
        </a>
        <p>You need Java installed to run the client.</p>
        <p>
            <a class="link" href="https://adoptium.net/temurin/releases">
                Download Java
            </a>
        </p>
    </div>
    
    <hr class="section-divider">

    <div class="info-box" style="background: rgba(0,0,0,0.2); padding: 20px; border-radius: 8px;">
        <h2 style="margin-top: 0;">How to Play</h2>
        <p>Open the client and click "Existing User". Type a username and password; if it doesn't exist, you will be registered automatically.</p>
        <p style="color: #ff4444; font-weight: bold;">DO NOT FORGET YOUR PASSWORD. There is currently no way to reset them.</p>
    </div>

    <hr class="section-divider">
    
    <div class="patch-notes-section">
        <h2>Patch notes</h2>
        <div class="patch-version">Dec. 11th 2025</div>
        <ul class="patch-list">
            <li>removed prayer drain</li>
            <li>removed the waiting period to sell items to vendors after you steal from their stall</li>
            <li>changes to aggro npc list (scroll down for full list)</li>
            <li>completing rune mysteries with Hans now gives an air talisman</li>
            <li>increased thieving by 25 on pickpocket success checks</li>
            <li>you can now enter the waterfall dungeon without glarial's amulet if you already completed the quest</li>
            <li>all npc drops will drop into the inventory</li>
            <li>father aereck will give you an incinerator ring if you have 100 quest points</li>
            <li>having the incinerator ring equipped or in the inventory will incinerate bones for 100% prayer xp</li>
        </ul>
        <div class="patch-version">Dec. 12th 2025</div>
        <ul class="patch-list">
            <li>fixed the skilling interruption bug (woodcutting, thieving stalls, smelting, and others used to get interrupted randomly)</li>
            <li>changed dark wizards' drop table to give herblore secondaries, as there is no good way of afking secondaries. THIS CHANGE IS NOW OBSOLETE, check Dec. 17th</li>
            <li>added more npcs that are infinitely aggressive and hunt range of 5, and respawn rate of 5 ticks (scroll down for npc list)</li>
        </ul>
        <div class="patch-version">Dec. 13th 2025</div>
        <ul class="patch-list">
            <li>changed buy-50 to buy-250</li>
            <li>added a sell-5000 option</li>
            <li>fixed charged jewellery deleting the entire stack instead of just one when you used a charge</li>
            <li>mage arena capes drop to the inventory (to fix a game crash)</li>
        </ul>
        <div class="patch-version">Dec. 14th 2025</div>
        <ul class="patch-list">
            <li>fixed amulet of glory deleting entire stack when using a charge</li>
            <li>drops from npcs drop to the floor when the inventory is full, instead of just getting deleted</li>
            <li>disabled buying the priest in peril quest as it's still in development</li>
            <li>pulled the latest updates from this revision into the server (just some new quest journals)</li>
            <li>some stackable item related fixes:</li>
            <li>disabled decanting potions</li>
            <li>fixed logic when applying weapon poison</li>
            <li>fixed jewellery enchanting logic</li>
            <li>fixed drinking poison chalices</li>
            <li>fixed drinking antipoisons</li>
            <li>fixed drinking antifires</li>
            <li>fixed emptying containers such as pies and potions</li>
            <li>fixed amulet of glory deleting entire stack when using a charge</li>
            <li>fixed charging glories turning the whole stack into one</li>
        </ul>
        <div class="patch-version">Dec. 15th 2025</div>
        <ul class="patch-list">
            <li>changed shop logic to allow buying any amount of anything that is in stock</li>
            <li>removed spam click alchemy spells</li>
            <li>removed spam click superheating</li>
            <li>combat boosts never tick down</li>
            <li>family crest npcs will give you their gauntlet after quest completion</li>
            <li>removed bronze bars from all shop stocks</li>
        </ul>
        <div class="patch-version">Dec. 16th 2025</div>
        <ul class="patch-list">
            <li>you now mine 3 rune essence at a time at level 85 runecraft, and 5 at a time at 99. THIS CHANGE IS NOW OBSOLETE, check Dec. 17th</li>
            <li>added highscores</li>
            <li>removed profanity filter from java client</li>
        </ul>
        <div class="patch-version">Dec. 17th 2025</div>
        <ul class="patch-list">
            <li>removed dark wizards from aggro npc list</li>
            <li>dark wizards no longer drop herblore secondaries</li>
            <li>added four chaos druids to the upper floor of the chaos druid tower</li>
            <li>added pickpocketing druids with a thieving level requirement of 38</li>
            <li>pickpocketing druids gives herblore secondaries</li>
            <li>essence mining changed to 2 essence per mine on average at 85 or higher runecraft</li>
            <li>essence mining changed to 2.5 essence per mine on average at 99 runecraft, to match daeyalt mining rates on osrs</li>
        </ul>
        <h2>Aggressive NPC list</h2>
        <ul class="patch-list">
            <li>chickens</li>
            <li>cows</li>
            <li>chaos druids</li>
            <li>chaos druid warriors</li>
            <li>giants</li>
            <li>moss giants</li>
            <li>fire giants</li>
            <li>frost giants</li>
            <li>baby dragons</li>
            <li>baby blue dragons</li>
            <li>green dragons</li>
            <li>blue dragons</li>
            <li>red dragons</li>
            <li>black dragons</li>
            <li>salarin the twisted</li>
            <li>shadow warriors</li>
        </ul>
    </div>

</body>
</html>