<?php
/*
  ./noyau/fonctions.php
  Fonctions de l'application
*/

namespace Noyau\Fonctions;
  //FONCTION DE SLUGIFICATION
  function slugify(string $str) {
    return trim(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), strtolower($str)), '-');
  }

  //FONCTION DE FORMATAGE DE DATE
  function datify(string $date, string $format) {
    return date_format(date_create($date), $format);
  }

  //FONCTION DE TRONQUAGE
  function tronquer(string $chaine, int $nbreCaracteres = 200) :string {
    if (strlen($chaine) > $nbreCaracteres):
      $positionEspace = strpos($chaine, ' ', $nbreCaracteres);
      return substr($chaine, 0, $positionEspace);
    else:
      return $chaine;
    endif;
  }
