<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<p id="topOfThePage">Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <hr />
        <h3>
            <?= htmlspecialchars($data['title']) ?><br />
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p class="post">
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br /><br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>