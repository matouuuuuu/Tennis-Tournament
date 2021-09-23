<?php

include("model/DTO_player.php");
include("model/DAO_player.php");
session_start();


$dao = new DAO_player();

$id = $_GET['id'];
$info="";
$player = $dao->getById($id);
$pageName = $player->playerName;
$timestamp = strtotime($player->date);
$naiss = date("d/m/Y", $timestamp);

$age = $dao->age($player->date);



$pathnat = "images/flag-picture/{$player->nat}.svg";
if($player->participe == 1){
    $participation = "Participe";
} else {
    $participation = "Participe pas";
}

if(isset($_POST['btSupprimer'])){
    
    $dao->deleteByID($_POST['btSupprimer']);
    header('Location: playerList.php');
    //} else {
    //    $info = "Impposible de supprimer le joueur.";
    //}

}

if(isset($_POST['btModif'])){
    $name= $_POST['username'];
    $nationalite = $_POST['nationality'];
    $level = $_POST['level'];
    $image = $_POST['image'];

    $date = $_POST['datenaiss'];
    $id = $_POST['btModif'];
    if(isset($_POST['participe'])){
        $participe = 1;
    } else {
        $participe = 0;
    }
    $dao->updatePlayer($id,$name,$date,$nationalite,$level,$participe,$image);
    header('Location: player.php?id='.$id);
}


$stats = $dao->statJoueur(intVal($id));

include("vue/head.php");



include("vue/bodyStart.html");

include("vue/infoPlayer.php");

include("vue/bodyEnd.html");
include("vue/end.html");

?>