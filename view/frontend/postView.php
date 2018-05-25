<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<p id="topOfThePage"><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <hr />
    <h3>
        <?= htmlspecialchars($post['title']) ?><br />
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>



<div class="comments">

    <hr />
    <h2>Commentaires</h2>
    <div class="commentsList">
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p class="author"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> <a href="index.php?action=edit&amp;id=<?= $comment['id']?>&amp;postId=<?= $post['id'] ?>"><button class="buttonEdit">Modifier</button></a></p>
            <p class="comment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

        <?php
        }
        ?>

    </div>


    <form id="add" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <hr />
        <h3 class="addCom">Ajouter un Commentaire</h3>
        <div class="form">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" id="submit" />
            </div>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

