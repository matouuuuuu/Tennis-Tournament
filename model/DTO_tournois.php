<?php


class tournois {
 
 private $id;
 private $tournoisName;
 private $nbJoueur;
 private $etat;
 private $listMatch;


 public function __construct(  $i,$t,$nb,$e,$list) {

     $this->id = $i;
     $this->tournoisName = $t;
     $this->nbJoueur = $nb;
     $this->etat = $e;
     $this->listMatch = $list;
     
 }

public function __get($input){
    switch ($input){
       case 'id':
           return $this->id;
           break;
        case 'tournoisName' :
            return $this->tournoisName;
            break;
        case 'nbJoueur' :
                return $this->nbJoueur;
                break;
        case 'etat':
            return $this->etat;
            break;
        case 'listMatch':
                return $this->listMatch;
                break;
       default:
           return 22;
           break;
    }
}
}