 <div class="matchFinished">

<?php 
   $tournoi = $daoTournaments->getTournamentById($_GET['tournoisId']);
   $i = 1;
   $q = 1;



   /////////////////////////////////////////
   // Permet de savoir le nbr de match par tours
   $n = log($tournoi->nbJoueur,2);

   $quoArray = array();
   $quotient = floor(($tournoi->nbJoueur)/2);
   array_push($quoArray,$quotient);

   
  for($b=1;$b<$n;$b++){
     $lastValue = end($quoArray);
     $calcul = $quotient/(2*$b);
     $tmp = floor($lastValue + $calcul);
     array_push($quoArray,$tmp);
  }
//////////////////////////////////////


foreach ($matchFinished as $key => $match) {
      $joueur1=$daoPlayer->getById($match->joueur1id);
      $joueur2=$daoPlayer->getById($match->joueur2id);
    echo "<div>";
    echo "<div>";
    if($match->vainqueurid == $match->joueur1id){
       echo "<img class='medal' src='images/medal.png'>";
    }
    echo "<img src=".$joueur1->imageUrl.">";
    echo "<p>".$joueur1->playerName."</p>";
    echo "</div>";
    echo "<p>".$match->scoreJ1." - ".$match->scoreJ2."</p>";
    echo "<div>";
   
    echo "<p>".$joueur2->playerName."</p>";
    echo "<img src=".$joueur2->imageUrl.">";
    if($match->vainqueurid == $match->joueur2id){
      echo "<img class='right medal' src='images/medal.png'>";
   }
    echo "</div>";
    echo "</div>";
    if($q==$tournoi->nbJoueur-1){
      echo "<h3>Final</h3>";
   } else {
      foreach ($quoArray as $quoA) {
         if( $quoA == $q){
            echo "<h3>Tour ".$i."</h3>";
            $i++;
         }
      }
   }

    

    
   $q++;
    
   }



?>
</div>
