<h1>Liste des Tournois</h1>
<div id="navigation-view">
    <a href="dashBoard.php">Retour</a>
    <?php if(isset($_SESSION['admin'])){
     echo  "<a id='bt-add' href='tournamentCreate.php'>Créer tournois</a>";
    } ?>
</div>
<div class="tournois">
    <h3>Tournois en cours</h3>
    
    <?php
    $tournois = $daoTournaments->getAllTournaments();
    $tournoisFinished= array();
    $tournoisRemaining= array();
    foreach ($tournois as $tournoi) {
        $count = count(json_decode($tournoi->listMatch));
        if($count!=1){
            array_push($tournoisRemaining,$tournoi);
        } else {
            array_push($tournoisFinished,$tournoi);
        }
        
    }
    foreach ($tournoisRemaining as $tournoi) {

            $matchs = $daoMatchs->getAllMatchsforTournament($tournoi->id);
            $matchFinished=$matchs;
            
        foreach ($matchFinished as $key => $match) {
             if($match->vainqueurid == -1){
                 unset($matchFinished[$key]);
            }
        }
            $nbMatchFini = count($matchFinished);
            $nbMatch = ($tournoi->nbJoueur)-1;
    
            echo "<a href='tournament.php?tournoisId=".$tournoi->id."'>";
            echo "<img src='images/tournament.svg' class='ImagePlaceholderTournament'>";
            echo "<p>".$tournoi->tournoisName."</p>";
            echo "<p> Match : ".$nbMatchFini."/".$nbMatch."</p>";
            echo "<p> Joueurs : ".$tournoi->nbJoueur."</p>";
            echo "</a>";
    }
    ?>
    <h3>Tournois terminée :</h3>
    <?php
        foreach ($tournoisFinished as $tournoi) {
            $nbMatch = ($tournoi->nbJoueur)-1;
            echo "<a class='finished' href='tournament.php?tournoisId=".$tournoi->id."'>";
            echo "<img src='images/tournament.svg' class='ImagePlaceholderTournament'>";
            echo "<p>".$tournoi->tournoisName."</p>";
            echo "<p> Match : ".$nbMatch."/".$nbMatch."</p>";
            echo "<p> Joueurs : ".$tournoi->nbJoueur."</p>";
            echo "</a>";
    }
    ?>
</div>