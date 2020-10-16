<?php
/*
  ../app/modeles/postsModele.php
*/
namespace App\Modeles\PostsModele;
/**
 * [findAll description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
// FindAll
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
 * [findOneById description]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @return array            [description]
 */
// findOneById
function findOneById(\PDO $connexion,int $id) :array {
  $sql = "SELECT *
          FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id',$id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}


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
