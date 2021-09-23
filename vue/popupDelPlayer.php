<div id="delPlayer" class="popup">
    <h1>Supprimer le joueur</h1>
    <img class="ImagePlaceHolder" src="<?= $player->imageUrl; ?>">
    <p><?= $player->playerName ?></p>
    <p>Êtes vous sûr de vouloir supprimer ce joueur</p>
    <form method="POST" action="" >
        <button>Annuler</button>
        <button name="btnSupprimer">Supprimer</button>
    </form>
</div>