<?php
/*
  ../app/vues/controleurs/index.php
  Variables disponibles:
   $tags :ARRAY(ARRAY(id,name,created_at))
*/
?>

<ul class="menu-link">
  <?php foreach ($categories as $categorie):?>
    <li><a href="#"><?php echo $categorie['name']; ?> [<?php echo $categorie['nbrPost']; ?>]</a></li>
  <?php endforeach; ?>
</ul>
