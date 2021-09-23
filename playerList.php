<?php
include("model/DTO_player.php");
include("model/DAO_player.php");
$pageName = "TENNIS TOURNAMENT";
$daoPlayer = new DAO_player();

session_start();


if(isset($_POST['btAdd'])){
    $name= $_POST['username'];
    $nationalite = $_POST['nationality'];
    $level = $_POST['level'];
    $image = $_POST['image'];
    $date = $_POST['datenaiss'];
    if($_POST['username'] != '' && $_POST['nationality'] != '' && $_POST['level'] != '' ){
        if(isset($_POST['participe'])){
            $participe = 1;
            $daoPlayer->insertPlayer($name,$date,$nationalite,$level,$participe,$image);
        } else {
            $participe = 0;
            $daoPlayer->insertPlayer($name,$date,$nationalite,$level,$participe,$image);
        }
    } else {

    }
}

include("vue/head.php");
include("vue/bodyStart.html");

include("vue/allPlayers.php");

include("vue/bodyEnd.html");
include("vue/end.html");


?>