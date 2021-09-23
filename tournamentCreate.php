<?php
include("model/DTO_player.php");
include("model/DAO_player.php");

$daoPlayer = new DAO_player();

include("model/DTO_matchs.php");
include("model/DAO_matchs.php");
$daoMatchs = new DAO_matchs();

include("model/DTO_tournois.php");
include("model/DAO_tournois.php");
$daoTournaments = new DAO_tournois();

$pageName = "Tournois en cours";
$info = "";
include('vue/head.php');

include('vue/bodyStart.html');

if(isset($_POST["nbJoueur"])){
    
   
    $title = $_POST["tournoisName"];
    $nbJoueur = $_POST["nbJoueur"];
    $players = $daoPlayer->getAllParticipant();
    if($nbJoueur <= count($players)){
    shuffle($players);
    $players = array_slice($players, 0, $nbJoueur);
    
    $list = array();

    foreach ($players as $key => $player) {
        array_push($list,$player->id);
    }

    $idTournament = $daoTournaments->insertTournament($title,$nbJoueur,json_encode($list));
    
    $iteration =  $nbJoueur % 2;
    $quotient = floor($nbJoueur/2);
    
    for($i=0,$q=0; $q<$quotient; $i+=2,$q++){
        
    $daoMatchs->insertMatch($players[$i]->id,0,$players[$i+1]->id,0,$idTournament);
    }
    header("Location: tournament.php?tournoisId=".$idTournament."&nbJoueur=".$nbJoueur."");
    } else {
        $info = "Impossible de créeer un tournois le nombre de joueur souhaité est supérieur au nombre de joueur pouvant participer";
        include('vue/createTournament.php');
    }

} else {
    include('vue/createTournament.php');
}




include('vue/bodyEnd.html');

include('vue/end.html');
?>