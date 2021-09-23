<h1>TENNIS TOURNAMENT</h1>
<div id="navigation-view">
            <?php
            if(isset($_SESSION['admin'])){
                echo "<a href='index.php?deco'>Deconnexion</a>";
            } else {
                echo "<a href='index.php'>Connexion</a>";
            }
            ?>
        </div>
<div class="fullPage">

    <section id="dashBoardButton">
        
        <a class="buttonDash" href="tournamentList.php">
            <img src="images/tennis.png" alt="" srcset="">
            <p>Tournois</p>
        </a>
        <a class="buttonDash" href="playerList.php">
            <img src="images/contacts-google.png" alt="" srcset="">
            <p>Liste des joueurs</p>
        </a>

    </section>
</div>