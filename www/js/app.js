/*
  .www/js/app.js
  FICHIER DE SURCHARGE AFIN DE VALIDER SI L'UTILISATEUR DÉSIRE VRAIMENT MODIFIER/SUPPRIMER UN POST
 */
$(function(){

  $('.delete').click(function(){
    if(!confirm("Voulez vous vraiment modifier cet enregistrement ?")){
      return false;
    }
  });
  $('.edit').click(function(){
    if(!confirm("Voulez vous vraiment modifier cet enregistrement ?")){
      return false;
    }
  });
});
