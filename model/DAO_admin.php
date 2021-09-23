<?php

class DAO_admin{
    private $bdd;

    public function __construct() {

        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1;dbname=tennis;charset=UTF8', 'root');
            //$this->bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=tennis;charset=UTF8', 'p1914655', '460454');
        } catch(Exception $e) {
            die('ERROR : '.$e->getMessage());
        }
   
    }

    public function verifUtilisateur($name, $password)
    {
        try {
            $query = $this->bdd->prepare('SELECT name FROM admin WHERE name = :username');
            $query->execute(['username' => $name]);
            $data = $query->fetch();
            if (!$data) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    public function verifPassword($name, $password)
    {
        try {
            $requete = $this->bdd->prepare('SELECT name, password FROM admin WHERE name = :username AND password = :pass');
            $requete->execute(['username' => $name, 'pass' => $password]);
            $data = $requete->fetch();
            if (!$data) {
                return false;
            } else {
                return true;
            }
            
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    public function ajoutAdmin($name, $password){
        try {
            $sql = 'INSERT INTO admin (name, password) VALUES (?, ?);';
            $requete = $this->bdd->prepare($sql);
            $requete->execute([$name, $password]);
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }
}