<div class='form_con'>
<h1>INSCRIPTION</h1>
<form method="post" action="inscription.php" class="form_con">
<div class="input-form">
<input type="text" name="username" placeholder="Nom d'utilisateur">
<input type="password" name="userpassword" placeholder="Mot de passe">
</div>
<div class="input-form">
<button name="btnconnexion" class="bt-connexion">Connexion</button>
<button type="reset" class="bt-reset">Effacer</button>
</div>
<a href="index.php">Vous avez déja un compte admin? Connectez vous ici.</a>
<p><?php print_r($message)?></p>
</form>
</div>
