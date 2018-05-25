<?php ob_start(); ?>
<p id="topOfThePage"><a href="index.php">Retour à la liste des billets</a></p>
 
<form id="add" method="post">
    <hr />
    <h3 class="editCom">Editer un commentaire</h3>
    <div class="form">
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="newComment" name="newComment" ></textarea>
        </div>
        <div>
            <input type="submit" id="submit" />
        </div>
    </div>
</form>

<?php
$content = ob_get_clean(); ?>
 
<?php require('template.php'); ?>


