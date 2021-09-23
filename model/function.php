<?php

// créer match de suite
function createMatchs($scoreJ1,$scoreJ2,$daoMatchs,$daoPlayer,$listMatch,$idTournament){
    $joueurs = json_decode($listMatch);
 
    $nbJoueur = count($joueurs);
    $iteration =  $nbJoueur % 2;
    $quotient = floor($nbJoueur/2);
    
    for($i=0,$q=0; $q<$quotient; $i+=2,$q++){
    $player1 = $daoPlayer->getById($joueurs[$i]);
    $player2 = $daoPlayer->getById($joueurs[$i+1]);
      $daoMatchs->insertMatch($player1->id,$scoreJ1,$player2->id,$scoreJ2,$idTournament);
    }
}

