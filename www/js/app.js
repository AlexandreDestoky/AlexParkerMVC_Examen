
$(function(){

  $('.delete').click(function(){
    if(!confirm("Voulez vous vraiment supprimer cet enregistrement ?")){
      return false;
    }
  });
}); 
