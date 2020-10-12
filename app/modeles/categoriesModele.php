<?php
/*
  ../app/modeles/CategoriesModele.php
*/
namespace App\Modeles\CategoriesModele;


function findAll(\PDO $connexion) :array {
  $sql = "SELECT *, COUNT(p.id) AS nbrPost
          FROM categories c
          LEFT JOIN posts p ON c.id= p.category_id
          GROUP BY c.id
          ORDER BY nbrPost DESC
          LIMIT 3;";
  $rs = $connexion -> query($sql);
  return $rs-> fetchAll(\PDO::FETCH_ASSOC);
}
