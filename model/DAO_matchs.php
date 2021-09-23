<?php
class DAO_matchs {
    private $bdd;

    public function __construct() {

        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1;dbname=tennis;charset=UTF8', 'root');
            //$this->bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=tennis;charset=UTF8', 'p1914655', '460454');
        } catch(Exception $e) {
            die('ERROR : '.$e->getMessage());
        }
   
    }
    
  
   public function getAllMatchsforTournament($idTournament){
  
    $matchs = $this->bdd->query("SELECT * FROM matchs WHERE tournoisId=".$idTournament." ORDER BY id")->fetchAll();
    foreach ($matchs as $i => $row) {
        $matchs[$i] = new matchs($row['id'],$row['joueur1id'],$row['scoreJ1'],$row['joueur2id'],$row['scoreJ2'],$row['vainqueurid'],$row['tournoisId']);
    }
    
    return $matchs;
    }

    public function insertMatch($joueur1,$scoreJ1,$joueur2,$scoreJ2,$idTournament){

        $sql = "INSERT INTO matchs (joueur1id,scoreJ1, joueur2id,scoreJ2,vainqueurid, tournoisId) VALUES (?,?,?,?,?,?);";
        $req = $this->bdd->prepare($sql);
            $rep = $req->execute([$joueur1,$scoreJ1, $joueur2,$scoreJ2,-1,$idTournament]);
            return $rep;
    
       }

       public function updateMatch($idMatch,$score1,$score2,$gagnant){

        $sql = "UPDATE matchs SET vainqueurid = ".$gagnant." , scoreJ1=".$score1." , scoreJ2=".$score2." WHERE id='".$idMatch."'";
        $req = $this->bdd->prepare($sql);
            $rep = $req->execute();
            return $rep;
    
       }


}
?>