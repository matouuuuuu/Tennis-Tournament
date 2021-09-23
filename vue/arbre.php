
<div id="tableau" class="tableau">
 <div>
<?php
$i=1;
$q=1;
$p=0;
foreach ($matchs as $key => $match) {
   if($p==0){ echo "<div>";
   $p=1;}
   $part="";
   
      foreach ($quoArray as $quoA) {
         if( $quoA == $q){
            
            $part = "</div>";
            $p=0;
            $i++;
         }
      }
   
   $q++;

$joueur1=$daoPlayer->getById($match->joueur1id);
$joueur2=$daoPlayer->getById($match->joueur2id);
 echo "<div>";
 echo "<img class='bubble' src=".$joueur1->imageUrl.">";
 echo "<img  class='bubble' src=".$joueur2->imageUrl.">";
 echo "</div>";
 echo $part;
}
?>
</div>
</div>