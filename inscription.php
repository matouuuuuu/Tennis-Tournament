<?php

require_once("model/DAO_admin.php");

$dao = new DAO_admin();

$message = NULL;

$pageName = "INSCRIPTION";

if (isset($_POST['btnconnexion'])) {
    $username = $_POST['username'];
    $pass = $_POST['userpassword'];
    if (isset($_POST['username']) && $username != '' && isset($_POST['userpassword']) && $pass != '') {
        if($dao->verifUtilisateur($username,$pass)==false){
            $dao->ajoutAdmin($username,$pass);
            $_SESSION['admin']=$username;
            header('Location: dashBoard.php');
        } else {
            $message = "Impossible ce nom d'utilisateur est déja utiliser.";
        }
    } else {
        $message = "Erreur dans la saisi.";
    }

}        



include('vue/head.php');
include('vue/bodyStart.html');
include('vue/formInscription.php');
include('vue/bodyEnd.html');
include('vue/end.html');
