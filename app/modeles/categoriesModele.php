<?php
/*
  ../app/modeles/CategoriesModele.php
*/
namespace App\Modeles\CategoriesModele;


function findPostOfCategory(\PDO $connexion) :array {
  $sql = "SELECT *, COUNT(p.id) AS nbrPost
          FROM categories c
          LEFT JOIN posts p ON c.id= p.category_id
          GROUP BY c.id
          ORDER BY name ASC;";
  $rs = $connexion -> query($sql);
  return $rs-> fetchAll(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion) :array {
  $sql = "SELECT *
          FROM categories c
          ORDER BY name ASC";
  $rs = $connexion -> query($sql);
  return $rs-> fetchAll(\PDO::FETCH_ASSOC);
}

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
