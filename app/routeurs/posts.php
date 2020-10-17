<?php
/*
 ./app/routeurs/posts.php
 ROUTEUR DES POSTS
*/

// CTRL : postsControleur
include '../app/controleurs/postsControleur.php';


  switch ($_GET['posts']):

  // DETAILS D'UN POST
  // PATTERN : index.php?posts=show&id=x
  // CTRL : postsControleur
  // ACTION : show
  case 'show':
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\showAction($connexion, $_GET['id'] );
  break;

  // AJOUT D'UN POST: affichage du formulaire
  // PATTERN: index.php?posts=addForm
  // CTRL: postsControleur
  // ACTION: addForm
  case 'addForm':
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\postsControleur\addFormAction($connexion);
  break;

  // AJOUT D'UN POST: INSERT
  // PATTERN: index.php?posts=add
  // CTRL: postsControleur
  // ACTION: add
  case 'add':
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\postsControleur\addAction($connexion);
  break;

  // MODIFICATION D'UN POST: Affichage du formulaire
  // PATTERN: index.php?posts=editForm&id=x
  // CTRL: postsControleur
  // ACTION: editForm
  case 'editForm':
    \App\Controleurs\postsControleur\editFormAction($connexion, $_GET['id']);
  break;

  // MODIFICATION D'UN POST: UPDATE
  // PATTERN: index.php?posts=edit&id=x
  // CTRL: postsControleur
  // ACTION: edit
  case 'edit':
    \App\Controleurs\postsControleur\editAction($connexion, $_GET['id']);
  break;

  // SUPPRESSION D'UN POST
  // PATTERN : index.php?posts=delete&id=x
  // CTRL : postsControleur
  // ACTION : delete
  case 'delete':
  include_once '../app/controleurs/postsControleur.php';
  \App\Controleurs\PostsControleur\deleteAction($connexion, $_GET['id'] );
  break;

endswitch;
