<?php
include("model/DTO_player.php");
include("model/DAO_player.php");

$daoPlayer = new DAO_player();

session_start();

include("model/DTO_matchs.php");
include("model/DAO_matchs.php");
$daoMatchs = new DAO_matchs();


include("model/DTO_tournois.php");
include("model/DAO_tournois.php");
$daoTournaments = new DAO_tournois();

include("model/function.php");

$pageName = "Tournois en cours";
include('vue/head.php');

include('vue/bodyStart.html');

if(isset($_POST['idMatch'])){
    $score1 = $_POST['matchScore'];
    $joueur1 = $_POST['personIdForMatch'];
    $score2 = $_POST['matchScoreSecond'];
    $joueur2 = $_POST['personIdForMatchSecond'];
    if($score1<$score2){
        $daoMatchs->updateMatch($_POST['idMatch'],$score1,$score2,$joueur2);
        $daoTournaments->removeFromList($joueur1,$_GET['tournoisId']);
    } else {
        $daoMatchs->updateMatch($_POST['idMatch'],$score1,$score2,$joueur1);
        $daoTournaments->removeFromList($joueur2,$_GET['tournoisId']);
    }
}
$matchs = $daoMatchs->getAllMatchsforTournament($_GET['tournoisId']);
$matchRemaining=$matchs ;
$matchFinished=$matchs;
foreach ($matchRemaining as $key => $match) {
      if($match->vainqueurid != -1){
          unset($matchRemaining[$key]);
      }
}
foreach ($matchFinished as $key => $match) {
    if($match->vainqueurid == -1){
        unset($matchFinished[$key]);
    }
}

$nbMatch = count($matchRemaining);

if($nbMatch==0){
   $tournois = $daoTournaments->getTournamentById($_GET['tournoisId']);
   $listJson = json_decode($tournois->listMatch);
   
   if(count($listJson) != 1){
      createMatchs(0,0,$daoMatchs,$daoPlayer,$tournois->listMatch,$_GET['tournoisId']);
      
   } else {


      $winner = $daoPlayer->getById($listJson[0]);
    


   }
}



$matchs = $daoMatchs->getAllMatchsforTournament($_GET['tournoisId']);
$matchRemaining=$matchs ;
$matchFinished=$matchs;
foreach ($matchRemaining as $key => $match) {
      if($match->vainqueurid != -1){
          unset($matchRemaining[$key]);
      }
}
foreach ($matchFinished as $key => $match) {
    if($match->vainqueurid == -1){
        unset($matchFinished[$key]);
    }
}

$tournament = $daoTournaments->getTournamentById($_GET['tournoisId']);

if(isset($_POST['btSupprimer'])){
    $id = $_GET['tournoisId'];
    $daoTournaments->deleteTournament($id);
    header('Location: tournamentList.php');
}


include('vue/tournament.php');
if(count($matchFinished)>0){
    include('vue/titre.php');
}
include('vue/matchFinished.php');
// arbre qui fonctionne mais moche pour tournois de plus de 16 joueurs  
//include('vue/arbre.php');



include('vue/bodyEnd.html');

include('vue/end.html');
?>