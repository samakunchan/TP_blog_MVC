<?php
require('controller/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'edit'){
            /**
             * Si il y a un $_POST on fait le taf
             */
            if ($_POST){
                if(isset($_POST['newComment']) && !empty($_POST['newComment'])
                && isset($_GET['id']) && !empty($_GET['id'])
                && isset($_GET['postId']) && !empty($_GET['postId'])){

                    edit($_POST['newComment'], $_GET['id'], $_GET['postId']);

                } else{
                    throw new exception('probleme');
                }
            } else{
                /**
                 *  Sinon on génère la vue normal
                 */
                require('view/frontend/commentView.php');
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
