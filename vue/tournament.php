<h1>Tournois</h1>
<div id="navigation-view">
   <a href="tournamentList.php">Retour</a>
   <?php if (isset($_SESSION['admin'])) {
      echo "<button id='bt-supprimer' onclick='openPopup(delTournament)'>Supprimer</button>";
   }
   ?>
</div>
<h2>Match en cours : </h2>
<?php
if (isset($winner)) {
?>


   <div class="winner">
      <h3>Grand gagnant du tournois !</h3>
      <?= "<img class='head' src=" . $winner->imageUrl . ">" ?>
      <p>
         <?php

         echo $winner->playerName;
         ?>
      </p>
      <img src="images/trophy.png" alt="" srcset="">
      <p>Bravo !</p>
   </div>

<?php
}
?>
<div id="delTournament" class="popup">
   <h1>Supprimer le tournoi</h1>
   <p><?php echo $tournament->tournoisName ?></p>
   <p>Êtes vous sûr de vouloir supprimer ce tournoi?</p>
   <form method="POST">
      <span onclick='closePopup(delTournament)' class='closePopup'>&#10540;</span>
      <button value="<?php echo $tournois->id ?>" name="btSupprimer">Supprimer</button>
   </form>
</div>

<div class="match">
   <?php
   foreach ($matchRemaining as $key => $match) {


      $joueur1 = $daoPlayer->getById($match->joueur1id);
      $joueur2 = $daoPlayer->getById($match->joueur2id);



      echo "<div>";
      echo "<div>";
      echo "<img src=" . $joueur1->imageUrl . ">";
      echo "<p>" . $joueur1->playerName . "</p>";
      echo "<p>vs</p>";
      echo "<p>" . $joueur2->playerName . "</p>";
      echo "<img src=" . $joueur2->imageUrl . ">";

      echo "</div>";
      if (isset($_SESSION['admin'])) {
         echo "<button class='terminateButton'onclick='openPopup(match" . $key . ")' >Terminer match</button>";
      }
      echo "</div>";

      if (isset($_SESSION['admin'])) {
         echo "<div id='match" . $key . "' class='popup'>";
         echo "<form method='post' >";
         echo "<input name='idMatch' type='hidden' value='" . $match->id . "'>";
         echo "<span onclick='closePopup(match" . $key . ")' class='closePopup' >&#10540;</span>";
         echo "<h2>Résultat match</h2>";
         echo "<div>";
         echo "<p>" . $joueur1->playerName . "</p>";
         echo "<input class='idPerson' name='personIdForMatch' value=" . $match->joueur1id . " type'number' >";
         echo "<input min='0' value='0' name='matchScore' type='number' >";
         echo "</div>";

         echo "<div>";
         echo "<p>" . $joueur2->playerName . "</p>";
         echo "<input class='idPerson' name='personIdForMatchSecond' value=" . $match->joueur2id . " type'number' >";
         echo "<input min='0' value='0' name='matchScoreSecond' type='number' >";
         echo "</div>";

         echo "<button>Terminer match</button>";
         echo "</form>";

         echo "</div>";
      }
   }
   ?>



</div>