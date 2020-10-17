<?php
/*
 ./app/routeurs/posts.php
*/

include '../app/controleurs/postsControleur.php';


  switch ($_GET['posts']):
    // DETAILS D'UN POST
    // PATTERN : ?posts=show&id=x
    // CTRL : postsControleur
    // ACTION : show
    case 'show':
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\showAction($connexion, $_GET['id'] );
    break;
  // AJOUT D'UN POST : FORMULAIRE
  // PATTERN: index.php?posts=addForm
  // CTRL: postsControleur
  // ACTION: addForm
  case 'addForm':
      include_once '../app/controleurs/postsControleur.php';
      \App\Controleurs\postsControleur\addFormAction($connexion);
  break;
  // AJOUT D'UN POST : INSERT
  // PATTERN: index.php?posts=add
  // CTRL: postsControleur
  // ACTION: add
  case 'add':
      include_once '../app/controleurs/postsControleur.php';
      \App\Controleurs\postsControleur\addAction($connexion);
  break;
  // SUPPRESSION D'UN POST
  // PATTERN : ?posts=delete&id=x
  // CTRL : postsControleur
  // ACTION : delete
  case 'delete':
      include_once '../app/controleurs/postsControleur.php';
      \App\Controleurs\PostsControleur\deleteAction($connexion, $_GET['id'] );
  break;

endswitch;
