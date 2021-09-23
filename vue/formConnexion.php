<div class='form_con'>
    <h1>CONNEXION ADMIN</h1>
<form method="post" action="index.php" class="form_con">
<div class="input-form">
<input type="text" name="username" placeholder="Nom d'utilisateur">
<input type="password" name="userpassword" placeholder="Mot de passe">
</div>
<div class="input-form">
<button name="btnconnexion" class="bt-connexion">Connexion</button>
<button type="reset" class="bt-reset">Effacer</button>
</div>
<a href="inscription.php">Vous êtes un nouvel admin? Créer votre compte ici.</a>
<a id="bt_invite" href="dashBoard.php">Invité</a>

<p><?php print_r($message)?></p>
</form>
</div>
