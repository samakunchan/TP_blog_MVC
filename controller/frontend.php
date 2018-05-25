<?php


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require('view/frontend/listPostView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function edit($newComment, $commentId, $postId)
{
    $commentManager = new CommentManager();

    $affectedComment = $commentManager->editComment($newComment, $commentId);

    if ($affectedComment == false){
        throw new Exception('Impossible d\'editer le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId); // ça marche
    }
}

