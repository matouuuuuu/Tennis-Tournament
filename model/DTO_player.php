<?php


class player {
 
 private $id;
 private $playerName;
 private $date ;
private $nat;
private $level;
private $participe;
private $imageUrl;

 public function __construct(  $i, $n,$d, $na,$l,$par,$url) {

     $this->id = $i;
     $this->playerName = $n;
     $this->date = $d;
     $this->nat = $na;
     $this->level = $l;
     $this->participe = $par;
     $this->imageUrl = $url;
 }


 public function getId() {
    return $this->id;
}

public function setId($i) {
    $this->id=$i;
}
public function getPlayer() {
    return $this->player;
}

public function setPlayer($p) {
    $this->player=$p;
}
public function namePlayer() {
    return $this->namePlayer;
}

public function setNamePlayer($np) {
    $this->namePlayer=$np;
}

public function getComment() {
    return $this->comment;
}
public function setComment($c) {
    $this->comment= $c;
}

public function __get($input){
    switch ($input){
       
       case 'id':
           return $this->id;
           break;
        case 'playerName' :
            return $this->playerName;
            break;
        case 'date':
            return $this->date;
       case 'nat':
           return $this->nat;
           break;
        case 'level':
            return $this->level;
            break;
        case 'participe':
                return $this->participe;
                break;
        case 'imageUrl':
                    $imageUr = str_replace(" ","%20",$this->imageUrl);
                    return $imageUr;
                    break;
       default:
           return 22;
           break;
    }
}
}