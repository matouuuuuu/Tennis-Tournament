<?php
include("model/DTO_tournois.php");
include("model/DAO_tournois.php");
$pageName = "LISTE DES TOURNOIS";

session_start();


$daoTournaments = new DAO_tournois();

include("model/DTO_matchs.php");
include("model/DAO_matchs.php");
$daoMatchs = new DAO_matchs();

include("vue/head.php");
include("vue/bodyStart.html");

include("vue/allTournaments.php");

include("vue/bodyEnd.html");
include("vue/end.html");