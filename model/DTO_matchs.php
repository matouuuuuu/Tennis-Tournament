<?php


class matchs {
 
 private $id;
 private $joueur1id;
 private $scoreJ1;
 private $joueur2id;
 private $scoreJ2;
 private $vainqueurid;
 private $tournoisid;

 public function __construct(  $i,$j1id,$sj1,$j2id,$sj2,$e,$ti) {

     $this->id = $i;
     $this->joueur1id = $j1id;
     $this->scoreJ1 = $sj1;
     $this->joueur2id = $j2id;
     $this->scoreJ2 = $sj2;
     $this->vainqueurid = $e;
     $this->tournoisid = $ti;
     
     
 }

public function __get($input){
    switch ($input){
       case 'id':
           return $this->id;
           break;
        case 'joueur1id' :
            return $this->joueur1id;
            break;
        case 'scoreJ1' :
                return $this->scoreJ1;
                break;
        case 'joueur2id':
            return $this->joueur2id;
            break;
        case 'scoreJ2' :
                return $this->scoreJ2;
                break;
        case 'vainqueurid':
                return $this->vainqueurid;
                break;
       case 'tournoisid':
           return $this->tournoisid;
           break;
       default:
           return 22;
           break;
    }
}
}