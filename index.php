<?php

require_once("model/DAO_admin.php");

$dao = new DAO_admin();

$message = NULL;

$pageName = "CONNEXION";

session_start();
if (isset($_POST['btnconnexion'])) {
    $username = $_POST['username'];
    $pass = $_POST['userpassword'];
    if (isset($_POST['username']) && $username != '' && isset($_POST['userpassword']) && $pass != '') {
        if($dao->verifUtilisateur($username,$pass)==true){
            if($dao->verifPassword($username,$pass)==true){
                $_SESSION['admin']=$username;
                header('Location: dashBoard.php');
            } else {
                $message = "Mot de passe incorrect.";
            }
        } else {
            $message = "Nom d'utilisateur inconnu.";
        }
    } else {
        $message = "Erreur dans la saisi.";
    }

}

if (isset($_GET['deco'])) {
    session_destroy();
}

include('vue/head.php');
include('vue/bodyStart.html');
include('vue/formConnexion.php');
include('vue/bodyEnd.html');
include('vue/end.html');

