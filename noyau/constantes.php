<?php
/*
 ./noyau/contantes.php
 Constantes du framework
*/


// BASE URL DE L'APPLICATION FRONT
 $url = explode('index.php', $_SERVER['SCRIPT_NAME']);
 define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $url[0]);
