<?php
/*
  ../app/controleurs/postsControleur.php
  CONTROLEUR DES POSTS
*/

namespace App\Controleurs\PostsControleur;
use App\Modeles\PostsModele;

/**
 * [indexAction description]
 * @param  PDO    $connexion [description]
 * @return [type]            [description]
 */
function indexAction(\PDO $connexion){
  //Je met dans $posts la liste des 10 derniers posts que je demande au modèle
  include_once '../app/modeles/postsModele.php';
  $posts = PostsModele\findAll($connexion);

  //Je charge la vue index dans $content
  GLOBAL $content,$title;
  $title = TITRE_POSTS_LIST;
  ob_start();
    include '../app/vues/posts/index.php';
  $content = ob_get_clean();
}


/**
 * [showAction description]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function showAction(\PDO $connexion, int $id) {
  // Je met dans $post les infos du post avec l'id donné que je demande au modèle des posts
  include_once '../app/modeles/postsModele.php';
  $post = PostsModele\findOneById($connexion, $id);

  //Je met dans $categorie les infos de la catégorie lié au post avec l'id donné que je demande au modèle des catégories
  include_once '../app/modeles/categoriesModele.php';
  $categorie = \App\Modeles\CategoriesModele\findOneById($connexion,$id);

  // je charge la vue show dans $content
  GLOBAL $content,$title;
  $title = $post['title'];
  ob_start();
    include '../app/vues/posts/show.php';
  $content = ob_get_clean();
}


/**
 * [addFormAction description]
 * @param PDO $connexion [description]
 */
function addFormAction(\PDO $connexion) {
  // Je met dans $categories la liste des catégories que je demande au modèle des catégories
  include_once '../app/modeles/categoriesModele.php';
  $categories = \App\Modeles\CategoriesModele\findAll($connexion);

  // je charge la vue addForm dans $content
  GLOBAL $content,$title;
  $title = TITRE_POSTS_ADDFORM;
  ob_start();
    include '../app/vues/posts/addForm.php';
  $content = ob_get_clean();
}


/**
 * [addAction description]
 * @param PDO $connexion [description]
 */
function addAction(\PDO $connexion) {
  //je demande au modèle d'ajouter le poste
  include_once '../app/modeles/postsModele.php';
  $id = \App\Modeles\PostsModele\insert($connexion);

  //je redirige vers la liste des posts
  header('location:'. BASE_URL);
}


/**
 * [editFormAction description]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function editFormAction(\PDO $connexion, int $id) {
  // Je met dans $post les infos du post avec l'id donné que je demande au modèle des posts
  include_once '../app/modeles/postsModele.php';
  $post = \App\Modeles\postsModele\findOneById($connexion, $id);

  // Je met dans $categories la liste des catégories que je demande au modèle des catégories
  include_once '../app/modeles/categoriesModele.php';
  $categories = \App\Modeles\CategoriesModele\findAll($connexion);

  //je charge la vue editForm dans $content
  GLOBAL $content,$title;
  $title = TITRE_POSTS_EDITFORM;
  ob_start();
    include '../app/vues/posts/editForm.php';
  $content = ob_get_clean();
}


/**
 * [editAction description]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function editAction(\PDO $connexion, int $id) {
 //je demande au modèle d'updater le post
 include_once '../app/modeles/postsModele.php';
 $return = \App\Modeles\postsModele\update($connexion, $id);

 //je redirige vers le détail du post qui vient d'être modifier
 header('location:'. BASE_URL . 'posts/'. $id . '/' .\Noyau\Fonctions\slugify($_POST['title']) . '.html');
}


/**
 * [deleteAction description]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function deleteAction(\PDO $connexion, int $id) {
  //je demande au modèle de supprimer le post
  include_once '../app/modeles/postsModele.php';
  $return = \App\Modeles\postsModele\delete($connexion, $id);

  //je redirige vers la liste des posts
  header('location:'. BASE_URL);
}
