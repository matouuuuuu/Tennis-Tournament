<?php
class DAO_player {
    private $bdd;

    public function __construct() {

        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1;dbname=tennis;charset=UTF8', 'root');
            //$this->bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=tennis;charset=UTF8', 'p1914655', '460454');
        } catch(Exception $e) {
            die('ERROR : '.$e->getMessage());
        }
   
    }
    
  
   public function getAllPlayers(){
  
        $players = $this->bdd->query("SELECT * FROM players ORDER BY id")->fetchAll();
        foreach ($players as $i => $row) {
            $players[$i] = new player($row['id'],$row['playerName'],$row['date'],$row['nat'],$row['level'],$row['participe'],$row['image']);
        }
        return $players;
    }

    public function getAllParticipant(){
        $players = $this->bdd->query("SELECT * FROM players WHERE participe=1 ORDER BY id ")->fetchAll();
        foreach ($players as $i => $row) {
            $players[$i] = new player($row['id'],$row['playerName'],$row['date'],$row['nat'],$row['level'],$row['participe'],$row['image']);
        }
        return $players;
    }

    public function getAllParticipantNb(){
        $players = $this->bdd->query("SELECT * FROM players WHERE participe=1 ORDER BY id ")->fetchAll();

        return count($players);
    }

    public function getById($id){
        try {
            $query = $this->bdd->prepare('SELECT * FROM players WHERE id = :id');
            $query->execute(['id' => $id]);
            $result = $query->fetch();
            $player = new player($result['id'],$result['playerName'],$result['date'], $result['nat'], $result['level'], $result['participe'],$result['image']);
            return $player;
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    public function insertPlayer($name,$date,$national,$level,$participe,$pathImg){
        try {
            $pathImg = "images/profil-picture/".$pathImg;
            $sql = "INSERT INTO players (playerName, date, nat, level,participe, image) VALUES(?,?,?,?,?,?)";
            $query = $this->bdd->prepare($sql);
            return $query->execute([$name,$date,$national,$level,$participe,$pathImg]);
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    public function deleteByID($id){
        try {
            //$query = $this->bdd->prepare('SELECT id FROM matchs WHERE id = :id');
            //$query->execute(['id'=>$id]);
            //$data = $query->fetch();
            //if (!$data) {
            //    return false;
            //} else {
                $sql = 'DELETE FROM players WHERE id = :id';
                $query = $this->bdd->prepare($sql);
                $query->execute(['id' => $id]);
                //return true;
            //}
            
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }

    }

    public function updatePlayer($id,$name,$date,$nat,$level,$participe,$pathImg){
        try {
            $pathImg = "images/profil-picture/".$pathImg;
            echo $pathImg;
            if($pathImg=='images/profil-picture/'){
                $sql = 'UPDATE players SET playerName= :n, date= :d, nat= :na, level= :l, participe= :p WHERE id= :id';
                $query = $this->bdd->prepare($sql);
                $query->execute(['n' => $name,'d' => $date,'na' => $nat,'l' => $level,'p' => $participe, 'id' => $id]);
            } else {
                $sql = 'UPDATE players SET playerName= :n, date= :d, nat= :na, level= :l, participe= :p, image= :i WHERE id= :id';
                $query = $this->bdd->prepare($sql);
                $query->execute(['n' => $name,'d' => $date,'na' => $nat,'l' => $level,'p' => $participe,'i' => $pathImg, 'id' => $id]);
           
            }
             } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    function age($date) { 
    
        $age = date('Y') - date('Y',strtotime($date)); 
       if (date('md') < date('md', strtotime($date))) { 
           return $age - 1; 
       } 
       return $age; 
   } 

   function statJoueur($id) {
       /*
    $sql = "SELECT count(*) as matchjouer from matchs where joueur1id=? OR joueur2id=?";
    $req = $this->bdd->prepare($sql);
    $req->execute([$id,$id]);
    $result = $req->fetch();
    */
    
    $matchjouer = $this->bdd->query("SELECT id FROM matchs WHERE (joueur1id=".$id." OR joueur2id=".$id.") AND vainqueurid!=-1 ;" )->fetchAll();
    $matchjouer = count($matchjouer);
    
    $matchgagne = $this->bdd->query("SELECT id FROM matchs WHERE (joueur1id=".$id." OR joueur2id=".$id.") AND vainqueurid=".$id.";" )->fetchAll();
    $matchgagne = count($matchgagne);

    $matchperdu = $matchjouer - $matchgagne;

    $idjoueurstring = '["'.$id.'"]';
 
    $tournoisgagne = $this->bdd->query("SELECT id FROM tournois WHERE listMatch='".$idjoueurstring."' ;" )->fetchAll();
    $tournoisgagne = count($tournoisgagne);

    $stats = ['matchjouer' => $matchjouer, 'matchgagne' => $matchgagne, 'matchperdu' => $matchperdu, 'tournoisgagne' => $tournoisgagne];
    return $stats;
   }

}
?>