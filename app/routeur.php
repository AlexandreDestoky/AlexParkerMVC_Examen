<?php
/*
  ../app/routeur.php
  ROUTEUR PRINCIPAL
*/

// AJOUT D'UN POST : FORMULAIRE
// PATTERN: index.php?posts=addForm
// CTRL: postsControleur
// ACTION: addForm
  if(isset($_GET['posts']) and $_GET['posts'] == 'addForm'):
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\postsControleur\addFormAction($connexion);

// AJOUT D'UN POST : INSERT
// PATTERN: index.php?posts=add
// CTRL: postsControleur
// ACTION: add
  elseif(isset($_GET['posts']) and $_GET['posts'] == 'add'):
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\postsControleur\addAction($connexion);
// DETAILS D'UN POST
// PATTERN : ?postID=x
// CTRL : postsControleur
// ACTION : show
  elseif(isset($_GET['postID'])):
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\showAction($connexion, $_GET['postID'] );

//ROUTE PAR DEFAUT
// PATTERN: /
// CTRL : postsControleur
// ACTION : index
  else:
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\IndexAction($connexion);
  endif;
