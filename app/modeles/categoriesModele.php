<?php
/*
  ../app/modeles/CategoriesModele.php
  MODELE DES CATEGORIES
*/
namespace App\Modeles\CategoriesModele;

/**
 * [findPostOfCategory:Renvoi la liste des catégories trié par nom et compte le nombre de post pour chaque catégorie ]
 * fonction utilisé pour le _leftSideBar.php
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
function findPostOfCategory(\PDO $connexion) :array {
  $sql = "SELECT *, COUNT(p.id) AS nbrPost
          FROM categories c
          LEFT JOIN posts p ON c.id= p.category_id
          GROUP BY c.id
          ORDER BY name ASC;";
  $rs = $connexion -> query($sql);
  return $rs-> fetchAll(\PDO::FETCH_ASSOC);
}


/**
 * [findAll: Revoie les infos des catégories trié par nom]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
function findAll(\PDO $connexion) :array {
  $sql = "SELECT *
          FROM categories c
          ORDER BY name ASC";
  $rs = $connexion -> query($sql);
  return $rs-> fetchAll(\PDO::FETCH_ASSOC);
}


/**
 * [findOneById: Renvoie les infos de la catégorie où l'id donné est égale a celle du post]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function findOneById(\PDO $connexion, int $id) {
  $sql = "SELECT *
          FROM categories c
          JOIN posts p ON c.id = p.category_id
          WHERE p.id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}
