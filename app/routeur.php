<?php
/*
  ../app/routeur.php
  ROUTEUR PRINCIPAL
*/

// ROUTE DES POSTS
// PATTERN: index?posts=x
// ROUTEUR: postsRouteur
if (isset($_GET['posts'])):
   include_once '../app/routeurs/posts.php';


//ROUTE PAR DEFAUT
// PATTERN: /
// CTRL : postsControleur
// ACTION : index
  else:
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\IndexAction($connexion);
  endif;
