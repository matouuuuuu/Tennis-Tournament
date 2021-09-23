<h1>Création de tournois</h1>
<div id="navigation-view">
  <a id="bt-retour" href="tournamentList.php">Retour</a>
   
</div>
<div class="fullPage">
<form method="post" id="tournamentCreation">
    <div>
        <label for="tournoisName">Nom du tournois</label>
        <input type="text" name="tournoisName">
    </div>
    <div>
        <label for="nbJoueur">Nombre de joueurs</label>
        <input oninput="getValue()" id="input"  type="range" min="2" max="6" value="2">
        <input name="nbJoueur" type="number" id="output" value="4" />
    </div>
    <button class="rond vert"> Lancer tournois !</button>
    <p class=alerte><?php echo $info?></p>
</form>
</div>