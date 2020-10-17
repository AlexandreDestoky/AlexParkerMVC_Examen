<?php
/*
  ../app/modeles/postsModele.php
  MODELE DES POSTS
*/
namespace App\Modeles\PostsModele;

/**
 * [findAll: Renvoi la liste des 10 derniers posts]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
function findAll(\PDO $connexion) :array {
  $sql = "SELECT *,
            p.id as postId,
            c.id as categorieId,
            c.name as categorieName,
            p.created_at as postDate
          FROM posts p
          JOIN categories c on p.category_id = c.id
          ORDER BY p.created_at DESC
          LIMIT 10;";
  $rs = $connexion->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * [findOneById: Renvoi le post correspondant à l'id donné]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @return array            [description]
 */
function findOneById(\PDO $connexion,int $id) :array {
  $sql = "SELECT *
          FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id',$id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}

/**
 * [insert : insert les éléments mit dans le formulaire sous forme d'un post]
 * @param  PDO    $connexion [description]
 * @return [type]            [description]
 */
function insert(\PDO $connexion) {
  $sql = "INSERT INTO posts
          SET title = :title,
              text = :text,
              quote = :quote,
              category_id = :category_id,
              created_at = NOW();";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':title', $_POST['title'], \PDO::PARAM_STR );
  $rs->bindValue(':text', $_POST['text'], \PDO::PARAM_STR );
  $rs->bindValue(':quote', $_POST['quote'], \PDO::PARAM_STR );
  $rs->bindValue(':category_id', $_POST['category_id'], \PDO::PARAM_INT );
  $rs->execute();
  return $connexion -> lastInsertId();
}
/**
 * [delete: supprime le post avec l'id donné]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function delete(\PDO $connexion, int $id) {
  $sql = "DELETE
          FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT );
  return intval($rs->execute());
}

/**
 * [update: met a jour les infos du post avec l'id donné]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function update(\PDO $connexion, int $id) {
  $sql = "UPDATE posts
          SET title = :title,
              text = :text,
              quote = :quote,
              category_id = :category_id
          WHERE id = :id";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':title', $_POST['title'], \PDO::PARAM_STR );
  $rs->bindValue(':text', $_POST['text'], \PDO::PARAM_STR );
  $rs->bindValue(':quote', $_POST['quote'], \PDO::PARAM_STR );
  $rs->bindValue(':category_id', $_POST['category_id'], \PDO::PARAM_INT );
  $rs->bindValue(':id', $id, \PDO::PARAM_INT );
  return intval($rs->execute());
}
