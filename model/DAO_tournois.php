<?php
class DAO_tournois {
    private $bdd;

    public function __construct() {

        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1;dbname=tennis;charset=UTF8', 'root');
            //$this->bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=tennis;charset=UTF8', 'p1914655', '460454');
        } catch(Exception $e) {
            die('ERROR : '.$e->getMessage());
        }
   
    }
    
  
   public function getAllTournaments(){
  
    $tournois = $this->bdd->query("SELECT * FROM tournois ORDER BY id DESC")->fetchAll();
    foreach ($tournois as $i => $row) {
        $tournois[$i] = new tournois($row['id'],$row['tournoisName'],$row['nbJoueur'],$row['etat'],$row['listMatch']);
    }
    return $tournois;
    }

    
    public function getTournamentById($idTournament){

            $tournois = $this->bdd->query("SELECT * FROM tournois WHERE id=".$idTournament."")->fetch();
            $tournois = new tournois($tournois['id'],$tournois['tournoisName'],$tournois['nbJoueur'],$tournois['etat'],$tournois['listMatch']);
            return $tournois;
        }

    public function insertTournament($name,$nbjoueur,$list){

        $sql = "INSERT INTO tournois (tournoisName, nbJoueur, etat,listMatch) VALUES (?, ?,?,?);";
        $req = $this->bdd->prepare($sql);
            $rep = $req->execute([$name ,$nbjoueur, 0,$list]);
            $id = $this->bdd->lastInsertId();
            return $id;
    
       }
    
    public function removeFromList($idJoueur,$idTournament){

        $list = $this->bdd->query("SELECT listMatch FROM tournois WHERE id=".$idTournament."")->fetch();
        $string = $list['listMatch'];
       
        $array = json_decode($string);
        
        if (($key = array_search($idJoueur, $array)) !== false) {
            unset($array[$key]);
        }
       
      
        
        $array = json_encode(array_values($array));
        
        $sql = "UPDATE tournois SET listMatch ='".$array."' WHERE id=".$idTournament."";
  
        $req = $this->bdd->prepare($sql);
        $rep = $req->execute();
        return $rep;


    }

    public function deleteTournament($id){
        $sql = "DELETE FROM tournois WHERE id=?";
        $req = $this->bdd->prepare($sql);
        $req = $req->execute([$id]);
        $sql = "DELETE FROM matchs WHERE tournoisId=?";
        $query = $this->bdd->prepare($sql);
        $query = $query->execute([$id]);
    }


}
?>